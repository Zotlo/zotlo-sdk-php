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


}