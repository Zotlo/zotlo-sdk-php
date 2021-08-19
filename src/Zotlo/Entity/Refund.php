<?php

namespace Zotlo\Connect\Entity;

/**
 * Class Refund
 * @package Zotlo\Connect\Entity
 */
class Refund
{
    /**
     * @var string
     */
    public $transactionId;

    /**
     * @var string
     */
    public $reason;

    /**
     * @var string
     */
    public $user;

    /**
     * @return string
     */
    public function getTransactionId()
    {
        return $this->transactionId;
    }

    /**
     * @param string $transactionId
     * @return $this;
     */
    public function setTransactionId($transactionId)
    {
        $this->transactionId = $transactionId;
        return $this;
    }

    /**
     * @return string
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * @param string $reason
     * @return $this;
     */
    public function setReason($reason)
    {
        $this->reason = $reason;
        return $this;
    }

    /**
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param string $user
     * @return Refund
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }


}