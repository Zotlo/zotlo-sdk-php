<?php

namespace Zotlo\Connect\Response;

/**
 * Class RefundResponse
 * @package Zotlo\Connect\Response
 */
class RefundResponse
{

    /**
     * @var array
     */
    private $providerResponse = null;
    /**
     * @var array
     */
    private $transaction = null;
    /**
     * @var array
     */
    private $meta = null;

    /**
     * @return array
     */
    public function getProviderResponse(): array
    {
        return $this->providerResponse;
    }

    /**
     * @param array $providerResponse
     */
    private function setProviderResponse(array $providerResponse)
    {
        $this->providerResponse = $providerResponse;
    }

    /**
     * @return array
     */
    public function getTransaction(): array
    {
        return $this->transaction;
    }

    /**
     * @param array $transaction
     */
    private function setTransaction(array $transaction)
    {
        $this->transaction = $transaction;
    }

    /**
     * @return array
     */
    public function getMeta(): array
    {
        return $this->meta;
    }

    /**
     * @param array $meta
     */
    private function setMeta(array $meta)
    {
        $this->meta = $meta;
    }


    /**
     * RefundResponse constructor.
     * @param $response
     */
    public function __construct($response)
    {
        $this->setMeta($response['meta']);
        $this->setProviderResponse($response['result']['providerResponse']);
        $this->setTransaction($response['result']['transaction']);
    }
}