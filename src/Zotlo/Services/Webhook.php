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
    private ?array $data;

    /**
     * @return array|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }

    /**
     * @param array|null $data
     */
    public function setData(?array $data): void
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