<?php

namespace Zotlo\Connect\Entity\Profile;

/**
 * Class PaymentResponse
 * @package Zotlo\Connect\Entity\Customer
 */
class Customer
{
    /**
     * @var int
     */
    private $id = null;

    /**
     * @var string
     */
    private $createDate = null;
    /**
     * @var string
     */
    private $country = null;
    /**
     * @var string
     */
    private $firstname = null;
    /**
     * @var string
     */
    private $lastname = null;
    /**
     * @var string
     */
    private $email = null;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getCreateDate(): string
    {
        return $this->createDate;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Customer constructor.
     * @param $result
     */
    public function __construct($result)
    {
        $this->id = isset($result['id']) ? (int)$result['id'] : null;
        $this->createDate = isset($result['createDate']) ? $result['createDate'] : null;
        $this->firstname = isset($result['firstname']) ? $result['firstname'] : null;
        $this->lastname = isset($result['lastname']) ? $result['lastname'] : null;
        $this->email = isset($result['email']) ? $result['email'] : null;
    }

}