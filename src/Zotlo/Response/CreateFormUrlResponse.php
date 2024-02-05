<?php

namespace Zotlo\Connect\Response;

use Zotlo\Connect\Entity\Transaction;

/**
 * Class CreateFormUrlResponse
 * @package Zotlo\Connect\Response
 */
class CreateFormUrlResponse
{
    /**
     * @var array
     */
    private $meta = null;

    /**
     * @var string
     */
    private $formUrl = null;

    /**
     * @var string
     */
    private $expireDate = null;

    /**
     * @var string
     */
    private $transactionId = null;

    /**
     * @return string
     */
    public function getFormUrl()
    {
        return $this->formUrl;
    }

    /**
     * @param string $formUrl
     */
    private function setFormUrl($formUrl)
    {
        $this->formUrl = $formUrl;
    }

    /**
     * @return string
     */
    public function getExpireDate()
    {
        return $this->expireDate;
    }

    /**
     * @param string $expireDate
     */
    private function setExpireDate($expireDate)
    {
        $this->expireDate = $expireDate;
    }

    /**
     * @return array
     */
    public function getMeta()
    {
        return $this->meta;
    }

    /**
     * @param array $meta
     */
    private function setMeta($meta)
    {
        $this->meta = $meta;
    }

    public function getTransactionId()
    {
        return $this->transactionId;
    }

    public function setTransactionId(?string $transactionId)
    {
        $this->transactionId = $transactionId;
    }


    /**
     * CreateFormUrlResponse constructor.
     * @param $response
     */
    public function __construct($response)
    {
        $this->setMeta($response['meta']);
        $this->setFormUrl($response['result']['form']['formUrl']);
        $this->setExpireDate($response['result']['form']['expireDate']);
        $this->setTransactionId($response['result']['form']['transactionId'] ?? null);
    }
}