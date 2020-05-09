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
     * @return string
     */
    public function getPlatform()
    {
        return $this->platform;
    }

    /**
     * @param string $platform
     */
    public function setPlatform($platform)
    {
        $this->platform = $platform;
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
     */
    public function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;
    }

}