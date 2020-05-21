<?php

namespace Zotlo\Connect\Response;


use Zotlo\Connect\Entity\Meta;
use Zotlo\Connect\Entity\Profile\Card;
use Zotlo\Connect\Entity\Profile\Customer;
use Zotlo\Connect\Entity\Profile\NewPackage;
use Zotlo\Connect\Entity\Profile\Package;
use Zotlo\Connect\Entity\Profile\Profile;

/**
 * Class SubscriberProfileResponse
 * @package Zotlo\Connect\Response
 */
class SubscriberProfileResponse
{

    /**
     * @var Profile
     */
    private $profile;

    /**
     * @var Package
     */
    private $package;
    /**
     * /**
     * @var Card
     */
    private $card;
    /**
     * @var Meta
     */
    private $meta;
    /**
     * @var Customer
     */
    private $customer;
    /**
     * @var NewPackage
     */
    private $newPackage;

    /**
     * @return Profile
     */
    public function getProfile(): ?Profile
    {
        return $this->profile;
    }

    /**
     * @return Package
     */
    public function getPackage(): ?Package
    {
        return $this->package;
    }

    /**
     * @return Card
     */
    public function getCard(): ?Card
    {
        return $this->card;
    }

    /**
     * @return Meta
     */
    public function getMeta(): ?Meta
    {
        return $this->meta;
    }

    /**
     * @return Customer
     */
    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    /**
     * @return NewPackage[]
     */
    public function getNewPackage(): ?NewPackage
    {
        return $this->newPackage;
    }


    /**
     * SubscriberProfileResponse constructor.
     * @param $result
     */
    public function __construct($response)
    {
        $result = $response['result'];
        
        $this->meta = isset($response['meta']) ? new Meta($response['meta']) : null;
        $this->profile = isset($result['profile']) && $result['profile'] != null ? (new Profile($result['profile'])) : null;
        $this->package = isset($result['package']) && $result['package'] != null ? new Package($result['package']) : null;
        $this->newPackage = isset($result['newPackage']) && $result['newPackage'] != null ? new NewPackage($result['newPackage']) : null;
        $this->card = isset($result['card']) && $result['card'] != null ? new Card($result['card']) : null;
        $this->customer = isset($result['customer']) && $result['customer'] != null ? new Customer($result['customer']) : null;
    }
}