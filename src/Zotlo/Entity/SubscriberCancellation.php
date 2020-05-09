<?php

namespace Zotlo\Connect\Entity;

/**
 * Class SubscriberCancellation
 * @package Zotlo\Connect\Entity
 */
class SubscriberCancellation
{
    /**
     * @var string
     */
    private $subscriberId = null;
    /**
     * @var string
     */
    private $reason = null;
    /**
     * @var boolean
     */
    private $force = false;

    /**
     * @return string
     */
    public function getSubscriberId()
    {
        return $this->subscriberId;
    }

    /**
     * @param string $subscriberId
     */
    public function setSubscriberId($subscriberId)
    {
        $this->subscriberId = $subscriberId;
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

    /**
     * @return bool
     */
    public function isForce()
    {
        return $this->force;
    }

    /**
     * @param bool $force
     */
    public function setForce($force)
    {
        $this->force = $force;
    }

}