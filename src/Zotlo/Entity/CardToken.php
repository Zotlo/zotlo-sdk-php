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
    public function getCvv(): ?string
    {
        return $this->cvv;
    }

    /**
     * @param string|null $cvv
     */
    public function setCvv(?string $cvv): void
    {
        $this->cvv = $cvv;
    }

    /**
     * @return bool
     */
    public function isCvvCheck(): bool
    {
        return $this->cvvCheck;
    }

    /**
     * @param bool $cvvCheck
     */
    public function setCvvCheck(bool $cvvCheck): void
    {
        $this->cvvCheck = $cvvCheck;
    }

}