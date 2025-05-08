<?php

namespace Zotlo\Connect\Entity;

/**
 * Class SubscriberFreeze
 */
class SubscriberFreeze
{
    /**
     * @var string
     */
    private $subscriberId = null;

    /**
     * @var string
     */
    private $packageId = null;

    /**
     * @var string
     */
    private $endDate = null;

    public function getSubscriberId(): ?string
    {
        return $this->subscriberId;
    }

    public function setSubscriberId(?string $subscriberId): SubscriberFreeze
    {
        $this->subscriberId = $subscriberId;
        return $this;
    }

    public function getPackageId(): ?string
    {
        return $this->packageId;
    }

    public function setPackageId(?string $packageId): SubscriberFreeze
    {
        $this->packageId = $packageId;
        return $this;
    }

    public function getEndDate(): ?string
    {
        return $this->endDate;
    }

    public function setEndDate(?string $endDate): SubscriberFreeze
    {
        $this->endDate = $endDate;
        return $this;
    }

}