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

}