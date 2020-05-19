<?php

namespace Zotlo\Connect\Entity;

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
     * @return $this
     */
    public function setSubscriberId($subscriberId)
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
     * @return $this
     */
    public function setCountry($country)
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
     * @return $this
     */
    public function setPhoneNumber($phoneNumber)
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
     * @return $this
     */
    public function setFirstName($firstName)
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
     * @return $this
     */
    public function setLastName($lastName)
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
     * @return $this
     */
    public function setEmail($email)
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
     * @return $this
     */
    public function setLanguage($language)
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
     * @return $this
     */
    public function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;
        return $this;
    }


}