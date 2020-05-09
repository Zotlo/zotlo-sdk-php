<?php

namespace Zotlo\Connect\Entity;

/**
 * Class Card
 * @package Zotlo\Connect\Entity
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
    private $expireMonth = null;

    /**
     * @var string
     */
    private $expireYear = null;

    /**
     * @var string
     */
    private $cvv = null;

    /**
     * @var string
     */
    private $cardHolderName = null;

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
    public function setCardNumber($cardNumber)
    {
        $this->cardNumber = $cardNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getExpireMonth()
    {
        return $this->expireMonth;
    }

    /**
     * @param string $expireMonth
     */
    public function setExpireMonth($expireMonth)
    {
        $this->expireMonth = $expireMonth;
        return $this;
    }

    /**
     * @return string
     */
    public function getExpireYear()
    {
        return $this->expireYear;
    }

    /**
     * @param string $expireYear
     */
    public function setExpireYear($expireYear)
    {
        $this->expireYear = $expireYear;
        return $this;
    }

    /**
     * @return string
     */
    public function getCvv()
    {
        return $this->cvv;
    }

    /**
     * @param string $cvv
     */
    public function setCvv($cvv)
    {
        $this->cvv = $cvv;
        return $this;
    }

    /**
     * @return string
     */
    public function getcardHolderName()
    {
        return $this->cardHolderName;
    }

    /**
     * @param string $cardHolderName
     */
    public function setcardHolderName($cardHolderName)
    {
        $this->cardHolderName = $cardHolderName;
        return $this;
    }


}