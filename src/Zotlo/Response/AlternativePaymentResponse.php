<?php

namespace Zotlo\Connect\Response;


/**
 * Class AlternativePaymentResponse
 * @package Zotlo\Connect\Response
 */
class AlternativePaymentResponse
{
    /**
     * @var array
     */
    private $meta = null;

    /**
     * @var string
     */
    private $redirectUrl = null;

    /**
     * @var string
     */
    private $expireDate = null;

    /**
     * @return string|null
     */
    public function getRedirectUrl()
    {
        return $this->redirectUrl;
    }

    /**
     * @param string|null $redirectUrl
     */
    public function setRedirectUrl($redirectUrl)
    {
        $this->redirectUrl = $redirectUrl;
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

    /**
     * @return string|null
     */
    public function getTransactionId()
    {
        return $this->transactionId;
    }

    /**
     * @param string|null $transactionId
     */
    public function setTransactionId($transactionId)
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
        $this->setRedirectUrl($response['result']['form']['redirectUrl']);
        $this->setExpireDate($response['result']['form']['expireDate']);
        $this->setTransactionId($response['result']['form']['transactionId']);
    }
}