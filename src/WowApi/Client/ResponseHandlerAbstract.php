<?php
namespace WowApi\Client;

use GuzzleHttp\Exception\ClientException;
use WowApi\Config\Config;
use GuzzleHttp\Client as GuzzleClient;
use WowApi\Exception\NotFoundException;

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
        $this->setConfig($config);
    }

    /**
     * @param Config $config
     *
     * @return $this
     */
    protected function setConfig(Config $config)
    {
        $this->config = $config;

        return $this;
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
     * @param string $endpoint
     *
     * @return string
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

        return $content;
    }
}
