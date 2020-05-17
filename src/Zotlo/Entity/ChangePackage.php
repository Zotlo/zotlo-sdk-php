<?php
/**
 * It's very easy to manage your subscriptions with Zotlo! Create your account now on zotlo.com, add your subscription packages and enable users to subscribe to your apps using a credit card.dd
 *
 * Docs : https://docs.zotlo.com/
 */

namespace Zotlo\Connect\Entity;

/**
 * Class ChangePackage
 * @package Zotlo\Connect\Entity
 */
class ChangePackage
{
    /**
     * @var string
     */
    public $packageId;

    /**
     * @var string
     */
    public $newPackageId;
    /**
     * @var string
     */
    public $changeType;

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

    /**
     * @return string
     */
    public function getNewPackageId()
    {
        return $this->newPackageId;
    }

    /**
     * @param string $newPackageId
     */
    public function setNewPackageId($newPackageId)
    {
        $this->newPackageId = $newPackageId;
    }

    /**
     * @return string
     */
    public function getChangeType()
    {
        return $this->changeType;
    }

    /**
     * @param string $changeType
     */
    public function setChangeType($changeType)
    {
        $this->changeType = $changeType;
    }

}