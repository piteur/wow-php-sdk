<?php
namespace WowApi\Client;

use GuzzleHttp\Exception\ClientException;
use WowApi\Config\Config;
use GuzzleHttp\Client as GuzzleClient;
use WowApi\Exception\NotFoundException;
use WowApi\RequestMapping\MappingEntityInterface;
use WowApi\RequestMapping\RequestMappingAbstract;
use WowApi\RequestMapping\RequestMappingInterface;
use WowApi\RequestMapping;

abstract class ResponseHandlerAbstract
{
    /** @var Config */
    protected $config;

    /** @var string */
    private $endpoint;

    /**
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->config= $config;
    }

    /**
     * Get api url to request on
     *
     * @return string
     */
    protected function getRequestUrl()
    {
        return sprintf(
            $this->config->getRequestUrl(),
            $this->endpoint
        );
    }

    /**
     * @param string $endpoint
     *
     * @return $this
     */
    protected function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;

        return $this;
    }

    /**
     * Handle api request and generate the correct class output
     *
     * @param string                $endpoint
     * @param MappingEntityInterface $generatedClass
     *
     * @return RequestMappingInterface
     */
    protected function handleRequest($endpoint, MappingEntityInterface $generatedClass)
    {
        try {
            $content = $this->getObject($endpoint);
            $generatedClass->setContent($content);
        } catch (\Exception $e) {
            $generatedClass->setError($e->getMessage());
        }

        return $generatedClass;
    }

    /**
     * @param string $endpoint
     *
     * @return \stdClass
     *
     * @throws NotFoundException
     * @throws ClientException
     */
    protected function getObject($endpoint = null)
    {
        if ($endpoint !== null) {
            $this->setEndpoint($endpoint);
        }

        return $this->request();
    }

    /**
     * Request the specified endpoint and store the response
     *
     * @return string
     *
     * @throws NotFoundException
     * @throws ClientException
     */
    private function request()
    {
        try {
            $client = new GuzzleClient();

            $response = $client->get($this->getRequestUrl());
            $content = $response->getBody()->read($response->getHeader('content-length'));
        } catch (ClientException $e) {
            if ($e->getResponse()->getStatusCode() === 404) {
                throw new NotFoundException('unknown api endpoint');
            }

            throw $e;
        }

        return json_decode($content);
    }
}
