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
     * @var int
     */
    private $id;

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
     * @var string
     */
    private $createDate;

    /**
     * @var string
     */
    private $tokenType;

    /**
     * @var boolean
     */
    private $deletable;

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

    /**
     * @return bool
     */
    public function isDeletable()
    {
        return $this->deletable;
    }

    /**
     * @return mixed|string|null
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }



    /**
     * @return int|mixed|null
     */
    public function getId()
    {
        return $this->id;
    }


    public function getTokenType()
    {
        return $this->tokenType;
    }


    public function __construct($result)
    {
        $this->id = isset($result['id']) ? (int)$result['id'] : 0;
        $this->token = $result['token'] ?? null;
        $this->cardNumber = $result['cardNumber'] ?? null;
        $this->cardExpire = $result['cardExpire'] ?? null;
        $this->createDate = $result['createDate'] ?? null;
        $this->tokenType = $result['tokenType'] ?? null;
        $this->deletable = $result['deletable'] ?? true;
    }

}