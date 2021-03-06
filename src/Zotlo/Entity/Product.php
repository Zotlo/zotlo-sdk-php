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


}