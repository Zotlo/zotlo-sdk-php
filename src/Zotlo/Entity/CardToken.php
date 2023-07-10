<?php

namespace Zotlo\Connect\Entity;

/**
 * Class CardToken
 * @package Zotlo\Connect\Entity
 */
class CardToken
{
    /**
     * @var string
     */
    private $token = null;

    /**
     * @var string|null
     */
    private $cvv = null;

    /**
     * @var bool
     */
    private $cvvCheck = false;

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param string $token
     * @return $this
     */
    public function setToken($token)
    {
        $this->token = $token;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCvv()
    {
        return $this->cvv;
    }

    /**
     * @param string|null $cvv
     * @return $this
     */
    public function setCvv($cvv)
    {
        $this->cvv = $cvv;
        return $this;
    }

    /**
     * @return bool
     */
    public function isCvvCheck()
    {
        return $this->cvvCheck;
    }

    /**
     * @param bool $cvvCheck
     * @return $this
     */
    public function setCvvCheck($cvvCheck)
    {
        $this->cvvCheck = $cvvCheck;
        return $this;
    }

}