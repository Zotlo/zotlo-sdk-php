<?php

namespace Zotlo\Connect\Entity;

/**
 * SubscriberUnfreeze
 */
class SubscriberUnfreeze
{
    /**
     * @var string
     */
    private $subscriberId = null;

    /**
     * @var string
     */
    private $packageId = null;

    public function getSubscriberId(): ?string
    {
        return $this->subscriberId;
    }

    public function setSubscriberId(?string $subscriberId): SubscriberUnfreeze
    {
        $this->subscriberId = $subscriberId;
        return $this;
    }

    public function getPackageId(): ?string
    {
        return $this->packageId;
    }

    public function setPackageId(?string $packageId): SubscriberUnfreeze
    {
        $this->packageId = $packageId;
        return $this;
    }
}