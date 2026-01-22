<?php

namespace Zotlo\Connect\Entity;

/**
 * Class Request
 * @package Zotlo\Connect\Entity
 */
class Request
{
    /**
     * @var string
     */
    private $platform = null;
    /**
     * @var string
     */
    private $endpoint = null;

    /**
     * @var string
     */
    private $language = 'en';
    /**
     * @var bool
     */
    private $sslVerify = true;

    /**
     * @var int
     */
    private $providerId = 0;

    /**
     * @var string
     */
    private $apiVersion = Constants::API_ACTIVE_VERSION_V1;

    /**
     * @var bool
     */
    private $isSandbox = false;

    /**
     * @return string
     */
    public function getPlatform()
    {
        return $this->platform;
    }

    /**
     * @param string $platform
     * @return $this
     */
    public function setPlatform($platform)
    {
        $this->platform = $platform;
        return $this;
    }

    /**
     * @return string
     */
    public function getEndpoint()
    {
        return $this->endpoint;
    }

    /**
     * @param string $endpoint
     * @return $this
     */
    public function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;
        return $this;
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param string $language
     */
    public function setLanguage($language)
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @return bool
     */
    public function isSslVerify(): bool
    {
        return $this->sslVerify;
    }

    /**
     * @param bool $sslVerify
     */
    public function setSslVerify(bool $sslVerify)
    {
        $this->sslVerify = $sslVerify;
        return $this;
    }

    /**
     * @return string
     */
    public function getApiVersion()
    {
        return $this->apiVersion;
    }

    /**
     * @param string $apiVersion
     * @return $this
     */
    public function setApiVersion($apiVersion)
    {
        $this->apiVersion = $apiVersion;
        return $this;
    }

    /**
     * @return int
     */
    public function getProviderId()
    {
        return $this->providerId;
    }

    /**
     * @param int $providerId
     * @return $this
     */
    public function setProviderId($providerId): Request
    {
        $this->providerId = $providerId;
        return $this;
    }

    /**
     * @return bool
     */
    public function isSandbox(): bool
    {
        return $this->isSandbox;
    }

    /**
     * @param bool $isSandbox
     * @return void
     */
    public function setIsSandbox(bool $isSandbox): void
    {
        $this->isSandbox = $isSandbox;
    }

}