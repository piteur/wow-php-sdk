<?php
namespace WowApi\Client\ResponseHandler;

use GuzzleHttp\Exception\ClientException;
use WowApi\Config\Config;
use GuzzleHttp\Client as GuzzleClient;
use WowApi\Entity\Entity;
use WowApi\Exception\NotFoundException;

class ResponseHandler
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
     * Handle api request and generate the correct class output
     *
     * @param string $endpoint
     * @param Entity $generatedClass
     *
     * @return Entity
     */
    protected function handleRequest($endpoint, Entity $generatedClass)
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
    private function getObject($endpoint = null)
    {
        if ($endpoint !== null) {
            $this->endpoint = $endpoint;
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

            if ($response->hasHeader('content-length')) {
                return json_decode($response->getBody()->read($response->getHeader('content-length')));
            }

            return json_decode($response->getBody()->getContents());
        } catch (ClientException $e) {
            if ($e->getResponse()->getStatusCode() === 404) {
                throw new NotFoundException('unknown api endpoint');
            }

            throw $e;
        }
    }
}
