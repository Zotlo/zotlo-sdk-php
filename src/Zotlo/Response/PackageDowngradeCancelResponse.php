<?php

namespace Zotlo\Connect\Response;


use Zotlo\Connect\Entity\Meta;

/**
 * Class PackageDowngradeCancelResponse
 * @package Zotlo\Connect\Response
 */
class PackageDowngradeCancelResponse
{
    /**
     * @var Meta
     */
    private $meta;
    /**
     * @var string
     */
    private $packageId;
    /**
     * @var string
     */
    private $price;
    /**
     * @var string
     */
    private $currency;
    /**
     * @var int
     */
    private $period;

    /**
     * @return string
     */
    public function getPackageId(): string
    {
        return $this->packageId;
    }

    /**
     * @return string
     */
    public function getPrice(): string
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @return int
     */
    public function getPeriod(): int
    {
        return $this->period;
    }


    /**
     * PackageDowngradeCancelResponse constructor.
     * @param $response
     */
    public function __construct($response)
    {
        $result = $response['result']['package'];

        $this->meta = isset($response['meta']) ? new Meta($response['meta']) : null;
        $this->packageId = isset($result['packageId']) ? $result['packageId'] : null;
        $this->period = isset($result['period']) ? $result['period'] : null;
        $this->price = isset($result['price']) ? $result['price'] : null;
        $this->currency = isset($result['currency']) ? $result['currency'] : null;
    }
}