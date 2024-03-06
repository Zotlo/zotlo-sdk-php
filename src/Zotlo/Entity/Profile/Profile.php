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
    private $realStatus = null;

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
    private $lastTransactionId = null;
    /**
     * @var string
     */
    private $cancellation = null;
    /**
     * @var string
     */
    private $startDate = null;
    /**
     * @var integer
     */
    private $quantity = 1;
    /**
     * @var integer
     */
    private $pendingQuantity = 0;
    /**
     * @var ?array
     */
    private $customParameters = null;
    /**
     * @var integer
     */
    private $renewalFetchCount = 0;

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
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }


    /**
     * @return string
     */
    public function getCancellation(): ?ProfileCancellation
    {
        return $this->cancellation;
    }

    /**
     * @return string
     */
    public function getRealStatus()
    {
        return $this->realStatus;
    }

    /**
     * @return int
     */
    public function getPendingQuantity()
    {
        return $this->pendingQuantity;
    }

    /**
     * @return array|null
     */
    public function getCustomParameters()
    {
        return $this->customParameters;
    }

    public function getLastTransactionId()
    {
        return $this->lastTransactionId;
    }

    /**
     * @return int
     */
    public function getRenewalFetchCount(): int
    {
        return $this->renewalFetchCount;
    }

    /**
     * @param int $renewalFetchCount
     */
    public function setRenewalFetchCount(int $renewalFetchCount): void
    {
        $this->renewalFetchCount = $renewalFetchCount;
    }


    /**
     * Transaction constructor.
     * @param $result
     */
    public function __construct($result)
    {
        $this->status = $result['status'] ?? null;
        $this->realStatus = $result['realStatus'] ?? null;
        $this->subscriberId = $result['subscriberId'] ?? null;
        $this->subscriptionType = $result['subscriptionType'] ?? null;
        $this->startDate = $result['startDate'] ?? null;
        $this->expireDate = $result['expireDate'] ?? null;
        $this->country = $result['country'] ?? null;
        $this->phoneNumber = $result['phoneNumber'] ?? null;
        $this->language = $result['language'] ?? null;
        $this->originalTransactionId = $result['originalTransactionId'] ?? null;
        $this->lastTransactionId = $result['lastTransactionId'] ?? null;
        $this->package = $result['package'] ?? null;
        $this->quantity = isset($result['quantity']) ? (int)$result['quantity'] : 1;
        $this->pendingQuantity = isset($result['pendingQuantity']) ? (int)$result['pendingQuantity'] : 0;
        $this->customParameters = $result['customParameters'] ?? null;
        $this->cancellation = isset($result['cancellation']) ? new ProfileCancellation($result['cancellation']) : null;
        $this->renewalFetchCount = isset($result['renewalFetchCount']) ? $result['renewalFetchCount'] : 0;
    }

}