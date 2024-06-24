<?php

namespace Zotlo\Connect\Response\WebhookResponse;

use Zotlo\Connect\Entity\Card;
use Zotlo\Connect\Entity\Profile\Customer;
use Zotlo\Connect\Entity\Profile\Package;
use Zotlo\Connect\Entity\Profile\Profile;

class SubscriptionResponse extends Response
{

    private Profile $profile;

    private Package $package;

    private ?Package $newPackage;

    private Card $card;

    private Customer $customer;

    public function __construct($subscriptionData)
    {
        parent::__construct($subscriptionData['queue']);

        $params = $subscriptionData['parameters'];

        $this->profile = new Profile($params['profile'] ?? null);
        $this->package = new Package($params['package'] ?? null);
        $this->customer = new Customer($params['customer'] ?? null);
        $this->newPackage = new Package($params['newPackage'] ?? null);

        $creditCard = new Card();
        $creditCard->setCardNumber($params['card']['cardNumber'] ?? null);
        $creditCard->setTokenId($params['card']['tokenId'] ?? null);
        $creditCard->setExpireMonth(explode('/', $params['card']['expireDate'])[0]);
        $creditCard->setExpireYear(explode('/', $params['card']['expireDate'])[1]);
        $this->card = $creditCard;
    }

    /**
     * @return Profile
     */
    public function getProfile(): Profile
    {
        return $this->profile;
    }

    /**
     * @return Package
     */
    public function getPackage(): Package
    {
        return $this->package;
    }

    /**
     * @return Card
     */
    public function getCard(): Card
    {
        return $this->card;
    }

    /**
     * @return Customer
     */
    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    /**
     * @return Package|null
     */
    public function getNewPackage(): ?Package
    {
        return $this->newPackage;
    }

}