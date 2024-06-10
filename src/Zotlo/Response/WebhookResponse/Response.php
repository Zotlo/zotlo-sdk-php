<?php

namespace Zotlo\Connect\Response\WebhookResponse;

class Response
{
    protected ?string $type;

    protected ?string $eventType;

    protected ?string $createDate;

    protected ?string $createDateTimeZoneType;

    protected ?string $createDateTimeZone;

    protected ?string $requestID;

    protected ?int $appId;

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     */
    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string|null
     */
    public function getEventType(): ?string
    {
        return $this->eventType;
    }

    /**
     * @param string|null $eventType
     */
    public function setEventType(?string $eventType): void
    {
        $this->eventType = $eventType;
    }

    /**
     * @return string|null
     */
    public function getCreateDate(): ?string
    {
        return $this->createDate;
    }

    /**
     * @param string|null $createDate
     */
    public function setCreateDate(?string $createDate): void
    {
        $this->createDate = $createDate;
    }

    /**
     * @return string|null
     */
    public function getCreateDateTimeZoneType(): ?string
    {
        return $this->createDateTimeZoneType;
    }

    /**
     * @param string|null $createDateTimeZoneType
     */
    public function setCreateDateTimeZoneType(?string $createDateTimeZoneType): void
    {
        $this->createDateTimeZoneType = $createDateTimeZoneType;
    }

    /**
     * @return string|null
     */
    public function getCreateDateTimeZone(): ?string
    {
        return $this->createDateTimeZone;
    }

    /**
     * @param string|null $createDateTimeZone
     */
    public function setCreateDateTimeZone(?string $createDateTimeZone): void
    {
        $this->createDateTimeZone = $createDateTimeZone;
    }

    /**
     * @return string|null
     */
    public function getRequestID(): ?string
    {
        return $this->requestID;
    }

    /**
     * @param string|null $requestID
     */
    public function setRequestID(?string $requestID): void
    {
        $this->requestID = $requestID;
    }

    /**
     * @return int|null
     */
    public function getAppId(): ?int
    {
        return $this->appId;
    }

    /**
     * @param int|null $appId
     */
    public function setAppId(?int $appId): void
    {
        $this->appId = $appId;
    }

    public function __construct($queueData)
    {
        $this->type = $queueData['type'] ?? null;
        $this->appId = $queueData['appId'] ?? null;
        $this->eventType = $queueData['eventType'] ?? null;
        $this->requestID = $queueData['requestID'] ?? null;
        $this->createDate = $queueData['createDate']['date'] ?? null;
        $this->createDateTimeZone = $queueData['createDate']['timezone'] ?? null;
        $this->createDateTimeZoneType = $queueData['createDate']['timezone_type'] ?? null;
    }

}