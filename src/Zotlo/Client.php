<?php
/**
 * It's very easy to manage your subscriptions with Zotlo! Create your account now on zotlo.com, add your subscription packages and enable users to subscribe to your apps using a credit card.dd
 *
 * Docs : https://docs.zotlo.com/
 */

namespace Zotlo\Connect;

use Zotlo\Connect\Entity\Credentials;
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


    public function __construct(Credentials $credentials)
    {
        $this->payment = new Payment($credentials);
        $this->transaction = new Transaction($credentials);
        $this->subscription = new Subscription($credentials);
    }

    public function payment(): Payment
    {
        return $this->payment;
    }

    public function transaction(): Transaction
    {
        return $this->transaction;
    }

    public function subscription(): Subscription
    {
        return $this->subscription;
    }

}