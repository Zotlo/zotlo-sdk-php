<?php

namespace Zotlo\Connect\Response;


/**
 * Class AlternativePaymentResponse
 * @package Zotlo\Connect\Response
 */
class PreCheckAlternativePaymentResponse
{
    /**
     * @var array
     */
    private $meta = null;

    /**
     * @var string
     */
    private $operator = null;

    /**
     * /**
     * @var string
     */
    private $country = null;

    /**
     * /**
     * @var string
     */
    private $userType = null;

    /**
     * @var int
     */
    private $groupId;


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
     * @return string|null
     */
    public function getOperator()
    {
        return $this->operator;
    }

    /**
     * @param string|null $operator
     */
    public function setOperator($operator)
    {
        $this->operator = $operator;
    }

    /**
     * @return string|null
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string|null $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return string|null
     */
    public function getUserType()
    {
        return $this->userType;
    }

    /**
     * @param string|null $userType
     */
    public function setUserType($userType)
    {
        $this->userType = $userType;
    }

    /**
     * @return int
     */
    public function getGroupId()
    {
        return $this->groupId;
    }

    /**
     * @param int $groupId
     */
    public function setGroupId(int $groupId)
    {
        $this->groupId = $groupId;
    }


    /**
     * CreateFormUrlResponse constructor.
     * @param $response
     */
    public function __construct($response)
    {
        $this->setMeta($response['meta']);
        $this->setOperator($response['result']['operator'] ?? null);
        $this->setCountry($response['result']['country'] ?? null);
        $this->setUserType($response['result']['userType'] ?? null);
        $this->setGroupId($response['result']['groupId'] ?? 0);

    }
}