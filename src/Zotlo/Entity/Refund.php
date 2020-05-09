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
     * @return string
     */
    public function getTransactionId()
    {
        return $this->transactionId;
    }

    /**
     * @param string $transactionId
     */
    public function setTransactionId($transactionId)
    {
        $this->transactionId = $transactionId;
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
     */
    public function setReason($reason)
    {
        $this->reason = $reason;
    }


}