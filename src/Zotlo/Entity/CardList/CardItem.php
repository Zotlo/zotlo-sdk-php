<?php
/**
 * It's very easy to manage your subscriptions with Zotlo! Create your account now on zotlo.com, add your subscription packages and enable users to subscribe to your apps using a credit card.dd
 *
 * Docs : https://docs.zotlo.com/
 */

namespace Zotlo\Connect\Entity\CardList;

class CardItem
{

    /**
     * @var string
     */
    private $token;
    /**
     * @var string
     */
    private $cardNumber;
    /**
     * @var string
     */
    private $cardExpire;

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @return string
     */
    public function getCardNumber()
    {
        return $this->cardNumber;
    }

    /**
     * @return string
     */
    public function getCardExpire()
    {
        return $this->cardExpire;
    }

    public function __construct($result)
    {
        $this->token = isset($result['token']) ? $result['token'] : null;
        $this->cardNumber = isset($result['cardNumber']) ? $result['cardNumber'] : null;
        $this->cardExpire = isset($result['cardExpire']) ? $result['cardExpire'] : null;
    }

}