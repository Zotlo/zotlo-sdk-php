<?php

namespace Zotlo\Connect\Response;

use Zotlo\Connect\Entity\Sale\Transaction;

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
    public function setMeta($meta)
    {
        $this->meta = $meta;
    }

    /**
     * @return string
     */
    public function getCardToken(): string
    {
        return $this->cardToken;
    }

    /**
     * @param string $cardToken
     */
    public function setCardToken(string $cardToken)
    {
        $this->cardToken = $cardToken;
    }

    /**
     * @return string
     */
    public function getCardNumber(): string
    {
        return $this->cardNumber;
    }

    /**
     * @param string $cardNumber
     */
    public function setCardNumber(string $cardNumber)
    {
        $this->cardNumber = $cardNumber;
    }

    /**
     * @return string
     */
    public function getCardExpire(): string
    {
        return $this->cardExpire;
    }

    /**
     * @param string $cardExpire
     */
    public function setCardExpire(string $cardExpire)
    {
        $this->cardExpire = $cardExpire;
    }


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