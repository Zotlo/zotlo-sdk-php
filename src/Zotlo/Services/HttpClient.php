<?php

namespace Zotlo\Connect\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Zotlo\Connect\Entity\Constants;
use Zotlo\Connect\Exception\PaymentException;

/**
 * Class HttpClient
 * @package Zotlo\Connect\Services
 */
abstract class HttpClient
{

    /**
     * @param $service
     * @return string
     */
    public function getEndpoint($service)
    {
        return trim($this->getRequest()->getEndpoint(), '/') . '/' . Constants::API_ACTIVE_VERSION . '/' . $service;
    }

    /**
     * @param $service
     * @param $parameters
     * @return mixed
     * @throws PaymentException
     */
    public function post($service, $parameters)
    {
        try {
            $client = new Client();
            $response = $client->request('POST', $this->getEndpoint($service), [
                \GuzzleHttp\RequestOptions::JSON => $parameters,
                \GuzzleHttp\RequestOptions::HEADERS => [
                    'AccessKey' => $this->getCredentials()->getAccessKey(),
                    'AccessSecret' => $this->getCredentials()->getAccessSecurity(),
                    'ApplicationId' => $this->getCredentials()->getApplicationId(),
                    'Language' => $this->getRequest()->getLanguage(),
                ],
            ]);

            return \GuzzleHttp\json_decode($response->getBody()->getContents(), true);

        } catch (RequestException $exception) {
            $response = \GuzzleHttp\json_decode($exception->getResponse()->getBody()->getContents(), true);
            throw new PaymentException($response);
        }
    }

    /**
     * @param $service
     * @param $parameters
     * @return mixed
     * @throws PaymentException
     */
    public function get($service, $parameters)
    {
        try {
            $client = new Client();
            $response = $client->request('GET', $this->getEndpoint($service), [
                \GuzzleHttp\RequestOptions::QUERY => $parameters,
                \GuzzleHttp\RequestOptions::HEADERS => [
                    'AccessKey' => $this->getCredentials()->getAccessKey(),
                    'AccessSecret' => $this->getCredentials()->getAccessSecurity(),
                    'ApplicationId' => $this->getCredentials()->getApplicationId(),
                    'Language' => $this->getRequest()->getLanguage(),
                ],
            ]);

            return \GuzzleHttp\json_decode($response->getBody()->getContents(), true);

        } catch (RequestException $exception) {
            $response = \GuzzleHttp\json_decode($exception->getResponse()->getBody()->getContents(), true);
            throw new PaymentException($response);
        }
    }
}