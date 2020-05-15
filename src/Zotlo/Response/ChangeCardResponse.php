<?php

namespace Zotlo\Connect\Response;

use Zotlo\Connect\Entity\Sale\Transaction;

/**
 * Class ChangeCardResponse
 * @package Zotlo\Connect\Response
 */
class ChangeCardResponse
{

    /**
     * @var array
     */
    private $meta = null;
    /**
     * @var Transaction
     */
    private $response = null;
    /**
     * @var string
     */
    private $paymentStatus = null;
    /**
     * @var string
     */
    private $redirect = null;

    /**
     * @return array
     */
    public function getCard()
    {
        return $this->card;
    }

    /**
     * @param array $card
     */
    private function setCard($card)
    {
        $this->card = $card;
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
     * @return array
     */
    public function getPackage()
    {
        return $this->package;
    }

    /**
     * @param array $package
     */
    private function setPackage($package)
    {
        $this->package = $package;
    }

    /**
     * @return Transaction
     */
    public function getResponse(): Transaction
    {
        return $this->response;
    }

    /**
     * @param Transaction $response
     */
    private function setResponse(Transaction $response)
    {
        $this->response = $response;
    }

    /**
     * @return array|null
     */
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * @param array|null $profile
     */
    private function setProfile($profile)
    {
        $this->profile = $profile;
    }

    /**
     * @return string
     */
    public function getPaymentStatus()
    {
        return $this->paymentStatus;
    }

    /**
     * @param string $paymentStatus
     */
    public function setPaymentStatus($paymentStatus)
    {
        $this->paymentStatus = $paymentStatus;
    }

    /**
     * @return string
     */
    public function getRedirect()
    {
        return $this->redirect;
    }

    /**
     * @param string $redirect
     */
    public function setRedirect($redirect)
    {
        $this->redirect = $redirect;
    }


    /**
     * ChangeCardResponse constructor.
     * @param $response
     */
    public function __construct($response)
    {
        $this->setMeta($response['meta']);
        $this->setPaymentStatus($response['result']['response']['paymentStatus']);
        $this->setRedirect($response['result']['response']['redirectUrl']);
        $this->setResponse(new Transaction($response['result']['response']));
    }
}