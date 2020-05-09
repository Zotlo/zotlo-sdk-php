<?php

namespace Zotlo\Connect\Entity\Sale3D;

/**
 * Class Payment
 * @package Zotlo\Connect\Entity
 */
class Payment
{
    /**
     * @var string
     */
    private $redirectUrl = null;
    /**
     * @var string
     */
    private $platform = null;
    /**
     * @var string
     */
    private $language = null;
    /**
     * @var string
     */
    private $package = null;
    /**
     * @var string
     */
    private $provider = null;
    /**
     * @var string
     */
    private $secureHash = null;

    /**
     * @return string
     */
    public function getRedirectUrl(): string
    {
        return $this->redirectUrl;
    }

    /**
     * @param string $redirectUrl
     */
    private function setRedirectUrl(string $redirectUrl)
    {
        $this->redirectUrl = $redirectUrl;
    }

    /**
     * @return string
     */
    public function getPlatform(): string
    {
        return $this->platform;
    }

    /**
     * @param string $platform
     */
    private function setPlatform(string $platform)
    {
        $this->platform = $platform;
    }

    /**
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * @param string $language
     */
    private function setLanguage(string $language)
    {
        $this->language = $language;
    }

    /**
     * @return string
     */
    public function getPackage(): string
    {
        return $this->package;
    }

    /**
     * @param string $package
     */
    private function setPackage(string $package)
    {
        $this->package = $package;
    }

    /**
     * @return string
     */
    public function getProvider(): string
    {
        return $this->provider;
    }

    /**
     * @param string $provider
     */
    private function setProvider(string $provider)
    {
        $this->provider = $provider;
    }

    /**
     * @return string
     */
    public function getSecureHash(): string
    {
        return $this->secureHash;
    }

    /**
     * @param string $secureHash
     */
    private function setSecureHash(string $secureHash)
    {
        $this->secureHash = $secureHash;
    }

    public function __construct($payment)
    {
        $this->setRedirectUrl($payment['redirectUrl']);
        $this->setPlatform($payment['platform']);
        $this->setLanguage($payment['language']);
        $this->setPackage($payment['package']);
        $this->setProvider($payment['provider']);
        $this->setSecureHash($payment['provider']);
    }
}