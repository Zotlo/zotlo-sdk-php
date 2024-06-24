<?php

namespace Zotlo\Connect\Services;


use Zotlo\Connect\Response\WebhookResponse\RefundResponse;
use Zotlo\Connect\Response\WebhookResponse\SubscriptionResponse;
use Zotlo\Connect\Response\WebhookResponse\TransactionInsertResponse;

class Webhook
{
    /**
     * @var array|null
     */
    private $data;

    /**
     * @return array|null
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array|null $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return TransactionInsertResponse
     */
    public function getTransactionInsert(): TransactionInsertResponse
    {
        return new TransactionInsertResponse($this->data);
    }

    /**
     * @return RefundResponse
     */
    public function getTransactionRefund(): RefundResponse
    {
        return new RefundResponse($this->data);
    }

    /**
     * @return SubscriptionResponse
     */
    public function getSubscription(): SubscriptionResponse
    {
        return new SubscriptionResponse($this->data);
    }
}