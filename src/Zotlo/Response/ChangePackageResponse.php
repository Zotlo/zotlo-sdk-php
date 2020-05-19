<?php

namespace Zotlo\Connect\Response;

/**
 * Class ChangePackageResponse
 * @package Zotlo\Connect\Response
 */
class ChangePackageResponse
{


    /**
     * @var
     */
    private $newPackage;
    /**
     * /**
     * @var array
     */
    private $meta;

    /**
     * @return array
     */
    public function getMeta()
    {
        return $this->meta;
    }

    /**
     * @param array $meta
     */
    private function setMeta($meta)
    {
        $this->meta = $meta;
    }

    /**
     * @return mixed
     */
    public function getNewPackage()
    {
        return $this->newPackage;
    }

    /**
     * @param mixed $newPackage
     */
    private function setNewPackage($newPackage)
    {
        $this->newPackage = $newPackage;
    }


    /**
     * ChangePackageResponse constructor.
     * @param $response
     */
    public function __construct($response)
    {
        $this->setMeta($response['meta']);
        $this->setNewPackage($response['result']['newPackage']);

    }
}