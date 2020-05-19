<?php
/**
 * It's very easy to manage your subscriptions with Zotlo! Create your account now on zotlo.com, add your subscription packages and enable users to subscribe to your apps using a credit card.dd
 *
 * Docs : https://docs.zotlo.com/
 */

namespace Zotlo\Connect\Services;

use Zotlo\Connect\Entity\Credentials;
use Zotlo\Connect\Entity\Request;
use Zotlo\Connect\Entity\Transaction as TransactionEntity;
use Zotlo\Connect\Response\TransactionDetailResponse;
use Zotlo\Connect\Response\TransactionListResponse;

/**
 * Class Transaction
 * @package Zotlo\Connect\Services
 */
class Transaction extends HttpClient
{

    /**
     * @var Credentials
     */
    private $credentials = null;

    /**
     * @var TransactionEntity
     */
    private $transaction;

    /**
     * @var Request
     */
    private $request = null;

    /**
     * @return TransactionEntity
     */
    public function getTransaction(): TransactionEntity
    {
        return $this->transaction;
    }

    /**
     * @param TransactionEntity $transaction
     */
    public function setTransaction(TransactionEntity $transaction)
    {
        $this->transaction = $transaction;
    }

    /**
     * @return Credentials
     */
    public function getCredentials(): Credentials
    {
        return $this->credentials;
    }

    /**
     * @param Credentials $credentials
     */
    public function setCredentials(Credentials $credentials)
    {
        $this->credentials = $credentials;
    }

    /**
     * @return Request
     */
    public function getRequest(): Request
    {
        return $this->request;
    }

    /**
     * @param Request $request
     */
    public function setRequest(Request $request)
    {
        $this->request = $request;
    }


    /**
     * Payment constructor.
     * @param Credentials $credentials
     */
    public function __construct(Credentials $credentials)
    {
        $this->setCredentials($credentials);
    }


    /**
     * @return TransactionListResponse
     * @throws \Zotlo\Connect\Exception\PaymentException
     */
    public function transactionList()
    {
        $response = $this->get('transaction', [
            'subscriberId' => $this->getTransaction()->getSubscriberId(),
            'paymentType' => $this->getTransaction()->getPaymentType(),
            'startDate' => $this->getTransaction()->getStartDate(),
            'endDate' => $this->getTransaction()->getEndDate(),
            'packageId' => $this->getTransaction()->getPackageId(),
        ]);

        return new TransactionListResponse($response);
    }

    /**
     * @return TransactionDetailResponse
     * @throws \Zotlo\Connect\Exception\PaymentException
     */
    public function transactionDetail()
    {
        $response = $this->get('transaction/detail', [
            'transactionId' => $this->getTransaction()->getTransactionId(),
        ]);

        return new TransactionDetailResponse($response);
    }

}