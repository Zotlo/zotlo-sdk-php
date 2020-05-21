<?php

namespace Zotlo\Connect\Entity\Profile;

/**
 * Class PaymentResponse
 * @package Zotlo\Connect\Entity\NewPackage
 */
class NewPackage
{
    /**
     * @var string
     */
    private $subscriberId = null;

    /**
     * @var string
     */
    private $packageId = null;

    /**
     * @var string
     */
    private $startDate = null;

    /**
     * @var string
     */
    private $createDate = null;

    /**
     * @var float
     */
    private $discountPrice = null;
    /**
     * @var float
     */
    private $price = null;
    /**
     * @var string
     */
    private $currency = null;
    /**
     * @var integer
     */
    private $period = null;

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
    public function getPackageId()
    {
        return $this->packageId;
    }

    /**
     * @return string
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @return string
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }

    /**
     * @return float
     */
    public function getDiscountPrice()
    {
        return $this->discountPrice;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @return int
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * NewPackage constructor.
     * @param $result
     */
    public function __construct($result)
    {
        $this->packageId = isset($result['packageId']) ? $result['packageId'] : null;
        $this->subscriberId = isset($result['subscriberId']) ? $result['subscriberId'] : null;
        $this->startDate = isset($result['startDate']) ? $result['startDate'] : null;
        $this->createDate = isset($result['createDate']) ? $result['createDate'] : null;
        $this->discountPrice = isset($result['discountPrice']) ? (float)$result['discountPrice'] : 0.0;
        $this->price = isset($result['price']) ? (float)$result['price'] : 0.0;
        $this->currency = isset($result['currency']) ? $result['currency'] : null;
        $this->period = isset($result['period']) ? (int)$result['packageType'] : 0;
    }

}