<?php

namespace Zotlo\Connect\Entity;

/**
 * Class PreCheckAlternativePayment
 * @package Zotlo\Connect\Entity
 */
class PreCheckAlternativePayment
{
    /**
     * @var string
     */
    private $subscriberPhoneNumber;
    /**
     * @var string
     */
    private $packageId;
    /**
     * @var int
     */
    private $providerId;

    /**
     * @return string
     */
    public function getSubscriberPhoneNumber()
    {
        return $this->subscriberPhoneNumber;
    }

    /**
     * @param string $subscriberPhoneNumber
     */
    public function setSubscriberPhoneNumber($subscriberPhoneNumber)
    {
        $this->subscriberPhoneNumber = $subscriberPhoneNumber;
    }

    /**
     * @return string
     */
    public function getPackageId()
    {
        return $this->packageId;
    }

    /**
     * @param string $packageId
     */
    public function setPackageId($packageId)
    {
        $this->packageId = $packageId;
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
     */
    public function setProviderId($providerId)
    {
        $this->providerId = $providerId;
    }


}