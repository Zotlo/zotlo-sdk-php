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
     * SubscriberProfileResponse constructor.
     * @param $response
     */
    public function __construct($response)
    {
        $this->setMeta($response['meta']);
        $this->setProfile($response['result']['profile']);
        $this->setCard($response['result']['card']);
        $this->setPackage($response['result']['package']);

    }
}