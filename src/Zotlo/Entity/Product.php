<?php

namespace Zotlo\Connect\Entity;

/**
 * Class Product
 * @package Zotlo\Connect\Entity
 */
class Product
{
    /**
     * @var string
     */
    public $packageId;

    /**
     * @var int
     */
    public $discountPercent = 0;

    /**
     * @var string
     */
    public $newPackageId;

    /**
     * @var float
     */
    public $defaultPrice;

    /**
     * @var string
     */
    public $defaultCurrency;

    /**
     * @return string
     */
    public function getPackageId()
    {
        return $this->packageId;
    }

    /**
     * @param string $packageId
     * @return $this;
     */
    public function setPackageId($packageId)
    {
        $this->packageId = $packageId;
        return $this;
    }

    /**
     * @return string
     */
    public function getNewPackageId()
    {
        return $this->newPackageId;
    }

    /**
     * @param string $newPackageId
     * @return $this;
     */
    public function setNewPackageId($newPackageId)
    {
        $this->newPackageId = $newPackageId;
    }

    /**
     * @return int
     */
    public function getDiscountPercent()
    {
        return $this->discountPercent;
    }

    /**
     * @param int $discountPercent
     */
    public function setDiscountPercent($discountPercent)
    {
        $this->discountPercent = $discountPercent;
    }

    /**
     * @return float
     */
    public function getDefaultPrice()
    {
        return $this->defaultPrice;
    }

    /**
     * @param float $defaultPrice
     */
    public function setDefaultPrice($defaultPrice)
    {
        $this->defaultPrice = $defaultPrice;
    }

    /**
     * @return string
     */
    public function getDefaultCurrency()
    {
        return $this->defaultCurrency;
    }

    /**
     * @param string $defaultCurrency
     */
    public function setDefaultCurrency($defaultCurrency)
    {
        $this->defaultCurrency = $defaultCurrency;
    }


}