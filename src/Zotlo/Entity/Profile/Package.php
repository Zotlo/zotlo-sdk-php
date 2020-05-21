<?php

namespace Zotlo\Connect\Entity\Profile;

/**
 * Class PaymentResponse
 * @package Zotlo\Connect\Entity\Package
 */
class Package
{
    /**
     * @var string
     */
    private $packageId = null;

    /**
     * @var float
     */
    private $price = null;

    /**
     * @var string
     */
    private $currency = null;

    /**
     * @var string
     */
    private $packageType = null;

    /**
     * @var string
     */
    private $name = null;

    /**
     * @return string
     */
    public function getPackageId()
    {
        return $this->packageId;
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
     * @return string
     */
    public function getPackageType()
    {
        return $this->packageType;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }


    /**
     * Package constructor.
     * @param $result
     */
    public function __construct($result)
    {
        $this->packageId = isset($result['packageId']) ? $result['packageId'] : null;
        $this->price = isset($result['price']) ? (float)$result['price'] : 0.0;
        $this->currency = isset($result['currency']) ? $result['currency'] : null;
        $this->packageType = isset($result['packageType']) ? $result['packageType'] : null;
        $this->name = isset($result['name']) ? $result['name'] : null;
    }

}