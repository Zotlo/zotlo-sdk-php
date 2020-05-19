<?php

namespace Zotlo\Connect\Response;


/**
 * Class SubscriberProfileResponse
 * @package Zotlo\Connect\Response
 */
class SubscriberProfileResponse
{

    /**
     * @var array
     */
    private $profile;
    /**
     * @var array
     */
    private $package;
    /**
     * /**
     * @var array
     */
    private $card;
    /**
     * @var array
     */
    private $meta;
    /**
     * @var array
     */
    private $customer;
    /**
     * @var array
     */
    private $newPackage;

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
     * @return array
     */
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * @param array $profile
     */
    private function setProfile($profile)
    {
        $this->profile = $profile;
    }

    /**
     * @return array
     */
    public function getPackage()
    {
        return $this->package;
    }

    /**
     * @param array $package
     */
    private function setPackage($package)
    {
        $this->package = $package;
    }

    /**
     * @return array
     */
    public function getCard()
    {
        return $this->card;
    }

    /**
     * @param array $card
     */
    private function setCard($card)
    {
        $this->card = $card;
    }

    /**
     * @return array
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param array $customer
     */
    private function setCustomer($customer)
    {
        $this->customer = $customer;
    }

    /**
     * @return array
     */
    public function getNewPackage()
    {
        return $this->newPackage;
    }

    /**
     * @param array $newPackage
     */
    private function setNewPackage($newPackage)
    {
        $this->newPackage = $newPackage;
    }


    /**
     * SubscriberProfileResponse constructor.
     * @param $response
     */
    public function __construct($response)
    {
        $this->setMeta($response['meta']);
        $this->setProfile(isset($response['result']['profile']) ? $response['result']['profile'] : null);
        $this->setCard(isset($response['result']['card']) ? $response['result']['card'] : null);
        $this->setPackage(isset($response['result']['package']) ? $response['result']['package'] : null);
        $this->setPackage(isset($response['result']['customer']) ? $response['result']['customer'] : null);
        $this->setPackage(isset($response['result']['newPackage']) ? $response['result']['newPackage'] : null);
        $this->setCustomer(isset($response['result']['customer']) ? $response['result']['customer'] : null);
        $this->setNewPackage(isset($response['result']['newPackage']) ? $response['result']['newPackage'] : null);

    }
}