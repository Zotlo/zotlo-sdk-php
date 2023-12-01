<?php
/**
 * It's very easy to manage your subscriptions with Zotlo! Create your account now on zotlo.com, add your subscription packages and enable users to subscribe to your apps using a credit card.dd
 *
 * Docs : https://docs.zotlo.com/
 */

namespace Zotlo\Connect;

use Zotlo\Connect\Entity\Credentials;
use Zotlo\Connect\Services\Information;
use Zotlo\Connect\Services\Payment;
use Zotlo\Connect\Services\Subscription;
use Zotlo\Connect\Services\Transaction;

/**
 * Class Client
 * @package Zotlo\Connect
 */
class Client
{
    /**
     * @var Payment
     */
    public $payment;
    /**
     * @var Transaction
     */
    public $transaction;

    /**
     * @var Subscription
     */
    public $subscription;

    /**
     * @var Information
     */
    public $information;


    /**
     * Client constructor.
     * @param Credentials $credentials
     */
    public function __construct(Credentials $credentials)
    {
        $this->payment = new Payment($credentials);
        $this->transaction = new Transaction($credentials);
        $this->subscription = new Subscription($credentials);
        $this->information = new Information($credentials);
    }

    /**
     * @return Payment
     */
    public function payment(): Payment
    {
        return $this->payment;
    }

    /**
     * @return Transaction
     */
    public function transaction(): Transaction
    {
        return $this->transaction;
    }

    /**
     * @return Subscription
     */
    public function subscription(): Subscription
    {
        return $this->subscription;
    }

}