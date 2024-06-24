<?php

namespace Zotlo\Connect\Response\WebhookResponse;

class Response
{
    protected $type;

    protected $eventType;

    protected $createDate;

    protected $createDateTimeZoneType;

    protected $createDateTimeZone;

    protected $requestID;

    protected $appId;

    /**
     * @return string|null
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string|null
     */
    public function getEventType()
    {
        return $this->eventType;
    }

    /**
     * @param string|null $eventType
     */
    public function setEventType($eventType)
    {
        $this->eventType = $eventType;
    }

    /**
     * @return string|null
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }

    /**
     * @param string|null $createDate
     */
    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;
    }

    /**
     * @return string|null
     */
    public function getCreateDateTimeZoneType()
    {
        return $this->createDateTimeZoneType;
    }

    /**
     * @param string|null $createDateTimeZoneType
     */
    public function setCreateDateTimeZoneType($createDateTimeZoneType)
    {
        $this->createDateTimeZoneType = $createDateTimeZoneType;
    }

    /**
     * @return string|null
     */
    public function getCreateDateTimeZone()
    {
        return $this->createDateTimeZone;
    }

    /**
     * @param string|null $createDateTimeZone
     */
    public function setCreateDateTimeZone($createDateTimeZone)
    {
        $this->createDateTimeZone = $createDateTimeZone;
    }

    /**
     * @return string|null
     */
    public function getRequestID()
    {
        return $this->requestID;
    }

    /**
     * @param string|null $requestID
     */
    public function setRequestID($requestID)
    {
        $this->requestID = $requestID;
    }

    /**
     * @return int|null
     */
    public function getAppId()
    {
        return $this->appId;
    }

    /**
     * @param int|null $appId
     */
    public function setAppId($appId)
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