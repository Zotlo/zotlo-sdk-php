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
        return $this;
    }


}