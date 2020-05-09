<?php

namespace Zotlo\Connect\Response;


/**
 * Class SubscriberProfileResponse
 * @package Zotlo\Connect\Response
 */
class SubscriberCancellationResponse
{

    /**
     * @var array
     */
    private $profile;

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
     * SubscriberProfileResponse constructor.
     * @param $response
     */
    public function __construct($response)
    {
        $this->setMeta($response['meta']);
        $this->setProfile($response['result']['profile']);

    }
}