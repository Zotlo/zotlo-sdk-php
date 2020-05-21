<?php

namespace Zotlo\Connect\Entity\Profile;

/**
 * Class Card
 * @package Zotlo\Connect\Entity\Profile
 */
class Card
{
    /**
     * @var string
     */
    private $cardNumber = null;

    /**
     * @var string
     */
    private $expireDate = null;

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
    public function getExpireDate()
    {
        return $this->expireDate;
    }


    /**
     * Transaction constructor.
     * @param $result
     */
    public function __construct($result)
    {
        $this->cardNumber = isset($result['cardNumber']) ? $result['cardNumber'] : null;
        $this->expireDate = isset($result['expireDate']) ? $result['expireDate'] : null;

    }

}