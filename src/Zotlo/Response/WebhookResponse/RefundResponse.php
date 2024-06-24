<?php

namespace Zotlo\Connect\Response\WebhookResponse;

use Zotlo\Connect\Response\TransactionResponse;

class RefundResponse extends Response
{
    private ?TransactionResponse $refund;

    public function __construct($refundData)
    {
        parent::__construct($refundData['queue']);

        $this->refund = new TransactionResponse($refundData['parameters']);

    }

    /**
     * @return TransactionResponse|null
     */
    public function getRefund(): ?TransactionResponse
    {
        return $this->refund;
    }

}