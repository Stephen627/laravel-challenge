<?php

namespace App\Services\Traits;

use GuzzleHttp\Client;

trait SendsRequests
{
    /** @var Client $client */
    protected $client;
    /** @var string $baseUri base URI for the client */
    protected $baseUri;

    /**
     * Proxies through to the guzzle client
     *
     * @param string $method
     * @param string $uri
     * @param array $options
     *
     * @return array|false
     */
    protected function sendRequest(string $method, string $uri, array $options = [])
    {
        if (!$this->client) {
            $this->client = new Client([
                'base_uri' => $this->baseUri,
                'http_errors' => false,
            ]);
        }

        $response = $this->client->request($method, $uri, $options);
        // Should be checking for any status code beginning with 2
        if ($response->getStatusCode() != 200) {
            return false;
        }

        return $this->handleResponse($response->getBody()->getContents());
    }

    protected function handleResponse(string $response)
    {
        return json_decode($response, true);
    }
}
