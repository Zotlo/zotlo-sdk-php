<?php

namespace Zotlo\Connect\Response\WebhookResponse;


use Zotlo\Connect\Response\TransactionResponse;

class TransactionInsertResponse extends Response
{
    private TransactionResponse $transactionResponse;

    public function __construct($webhookData)
    {
        parent::__construct($webhookData['queue']);

        $this->transactionResponse = new TransactionResponse($webhookData['parameters']);
    }

    /**
     * @return TransactionResponse
     */
    public function getTransaction(): TransactionResponse
    {
        return $this->transactionResponse;
    }
}