<?php

namespace Zotlo\Connect\Response;


/**
 * Class SavedCardResponse
 * @package Zotlo\Connect\Response
 */
class SavedCardResponse
{

    /**
     * @return array
     */
    private $meta = null;
    /**
     * @var string
     */
    private $cardToken;

    /**
     * @var string
     */
    private $cardNumber = null;

    /**
     * @var string
     */
    private $cardExpire;

    /**
     * @return null
     */
    public function getMeta()
    {
        return $this->meta;
    }

    /**
     * @param null $meta
     */
    private function setMeta($meta)
    {
        $this->meta = $meta;
    }

    /**
     * @return string
     */
    public function getCardToken()
    {
        return $this->cardToken;
    }

    /**
     * @param string $cardToken
     */
    private function setCardToken( $cardToken)
    {
        $this->cardToken = $cardToken;
    }

    /**
     * @return string
     */
    public function getCardNumber()
    {
        return $this->cardNumber;
    }

    /**
     * @param string $cardNumber
     */
    private function setCardNumber( $cardNumber)
    {
        $this->cardNumber = $cardNumber;
    }

    /**
     * @return string
     */
    public function getCardExpire()
    {
        return $this->cardExpire;
    }

    /**
     * @param string $cardExpire
     */
    private function setCardExpire( $cardExpire)
    {
        $this->cardExpire = $cardExpire;
    }


    /**
     * SavedCardResponse constructor.
     * @param $response
     */
    public function __construct($response)
    {
        $cards = $response['result']['cardList'];

        if (count($cards) > 0) {
            $this->setCardNumber($cards[0]['cardNumber']);
            $this->setCardToken($cards[0]['token']);
            $this->setCardExpire($cards[0]['cardExpire']);
        }

        $this->setMeta($response['meta']);

    }
}