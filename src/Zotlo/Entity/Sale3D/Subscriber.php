<?php

namespace Zotlo\Connect\Entity\Sale3D;

/**
 * Class Subscriber
 * @package Zotlo\Connect\Entity
 */
class Subscriber
{
    /**
     * @var string
     */
    private $subscriberId = null;
    /**
     * @var string
     */
    private $country = null;
    /**
     * @var string
     */
    private $phoneNumber = null;
    /**
     * @var string
     */
    private $firstName = null;
    /**
     * @var string
     */
    private $lastName = null;
    /**
     * @var string
     */
    private $email = null;
    /**
     * @var string
     */
    private $language = null;
    /**
     * @var string
     */
    private $ipAddress = null;

    /**
     * @return string
     */
    public function getSubscriberId()
    {
        return $this->subscriberId;
    }

    /**
     * @param string $subscriberId
     */
    private function setSubscriberId($subscriberId)
    {
        $this->subscriberId = $subscriberId;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    private function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     */
    private function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    private function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    private function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    private function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param string $language
     */
    private function setLanguage($language)
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @return string
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    /**
     * @param string $ipAddress
     */
    private function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;
    }


    public function __construct($subscriber)
    {
        $this->setSubscriberId($subscriber['subscriberId']);
        $this->setCountry($subscriber['subscriberCounry']);
        $this->setPhoneNumber($subscriber['subscriberPhoneNumber']);
        $this->setFirstName($subscriber['subscriberFirstname']);
        $this->setLanguage($subscriber['subscriberLastname']);
        $this->setEmail($subscriber['subscriberEmail']);
        $this->setIpAddress($subscriber['subscriberIpAddress']);
    }

}