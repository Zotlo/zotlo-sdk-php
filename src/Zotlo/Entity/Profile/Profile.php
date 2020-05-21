<?php

namespace Zotlo\Connect\Entity\Profile;

/**
 * Class PaymentResponse
 * @package Zotlo\Connect\Entity\Profile
 */
class Profile
{
    /**
     * @var string
     */
    private $status = null;

    /**
     * @var string
     */
    private $subscriberId = null;
    /**
     * @var string
     */
    private $subscriptionType = null;
    /**
     * @var string
     */
    private $expireDate = null;
    /**
     * @var string
     */
    private $package = null;
    /**
     * @var string
     */
    private $country = null;
    /**
     * @var string
     */
    private $phoneNumber = null;
    /**
     * @var string
     */
    private $language = null;
    /**
     * @var string
     */
    private $originalTransactionId = null;
    /**
     * @var string
     */
    private $cancellation = null;

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getSubscriberId()
    {
        return $this->subscriberId;
    }

    /**
     * @return string
     */
    public function getSubscriptionType()
    {
        return $this->subscriptionType;
    }

    /**
     * @return string
     */
    public function getExpireDate()
    {
        return $this->expireDate;
    }

    /**
     * @return string
     */
    public function getPackage()
    {
        return $this->package;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @return string
     */
    public function getOriginalTransactionId()
    {
        return $this->originalTransactionId;
    }

    /**
     * @return string
     */
    public function getCancellation(): ?ProfileCancellation
    {
        return $this->cancellation;
    }

    /**
     * Transaction constructor.
     * @param $result
     */
    public function __construct($result)
    {
        $this->status = isset($result['status']) ? $result['status'] : null;
        $this->subscriberId = isset($result['subscriberId']) ? $result['subscriberId'] : null;
        $this->subscriptionType = isset($result['subscriptionType']) ? $result['subscriptionType'] : null;
        $this->startDate = isset($result['startDate']) ? $result['startDate'] : null;
        $this->expireDate = isset($result['expireDate']) ? $result['expireDate'] : null;
        $this->country = isset($result['country']) ? $result['country'] : null;
        $this->phoneNumber = isset($result['phoneNumber']) ? $result['phoneNumber'] : null;
        $this->language = isset($result['language']) ? $result['language'] : null;
        $this->originalTransactionId = isset($result['originalTransactionId']) ? $result['originalTransactionId'] : null;
        $this->package = isset($result['package']) ? $result['package'] : null;
        $this->cancellation = isset($result['cancellation']) ? new ProfileCancellation($result['cancellation']) : null;

    }

}