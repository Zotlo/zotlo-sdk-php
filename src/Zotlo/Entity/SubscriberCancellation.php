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
     * @var string
     */
    private $packageId = null;

    /**
     * @return string
     */
    public function getSubscriberId()
    {
        return $this->subscriberId;
    }

    /**
     * @param string $subscriberId
     * @return $this
     */
    public function setSubscriberId($subscriberId)
    {
        $this->subscriberId = $subscriberId;
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
     * @return $this
     */
    public function setReason($reason)
    {
        $this->reason = $reason;
        return $this;
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
     * @return $this
     */
    public function setForce($force)
    {
        $this->force = $force;
        return $this;
    }

    /**
     * @return string
     */
    public function getPackageId()
    {
        return $this->packageId;
    }


    /**
     * @param $packageId
     * @return $this
     */
    public function setPackageId( $packageId)
    {
        $this->packageId = $packageId;
        return $this;
    }



}