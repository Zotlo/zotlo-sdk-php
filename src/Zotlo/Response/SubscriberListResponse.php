<?php

namespace Zotlo\Connect\Response;

use Zotlo\Connect\Entity\Profile\Profile;


/**
 * Class SubscriberListResponse
 * @package Zotlo\Connect\Response
 */
class SubscriberListResponse
{

    /**
     * @var Profile[]
     */
    private $list;

    /**
     * @return Profile[]
     */
    public function getList(): array
    {
        return $this->list;
    }

    /**
     * SubscriberListResponse constructor.
     * @param $response
     */
    public function __construct($response)
    {
        $resultArray = [];
        foreach ($response as $item) {
            $resultArray[] = new Profile($item);
        }
        $this->list = $resultArray;
    }
}