<?php

namespace Zotlo\Connect\Entity;

/**
 * Class Credentials
 * @package Zotlo\Connect\Entity
 */
class Credentials
{
    /**
     * @var string
     */
    private $accessKey = null;

    /**
     * @var string
     */
    private $accessSecurity = null;

    /**
     * @var string
     */
    private $applicationId = null;

    /**
     * @return string
     */
    public function getAccessKey()
    {
        return $this->accessKey;
    }

    /**
     * @param string $accessKey
     * @return $this;
     */
    public function setAccessKey($accessKey)
    {
        $this->accessKey = $accessKey;
        return $this;
    }

    /**
     * @return string
     */
    public function getAccessSecurity()
    {
        return $this->accessSecurity;
    }

    /**
     * @param string $accessSecurity
     * @return $this;
     */
    public function setAccessSecurity($accessSecurity)
    {
        $this->accessSecurity = $accessSecurity;
        return $this;
    }

    /**
     * @return string
     */
    public function getApplicationId()
    {
        return $this->applicationId;
    }

    /**
     * @param string $applicationId
     * @return $this;
     */
    public function setApplicationId($applicationId)
    {
        $this->applicationId = $applicationId;
        return $this;
    }


}