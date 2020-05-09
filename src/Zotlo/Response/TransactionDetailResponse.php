<?php

namespace Zotlo\Connect\Response;


class TransactionDetailResponse
{

    /**
     * @var array
     */
    private $transaction = null;
    /**
     * @var array
     */
    private $transactionLog = null;
    /**
     * @var array
     */
    private $meta = null;

    /**
     * @return array
     */
    public function getMeta()
    {
        return $this->meta;
    }

    /**
     * @param array $meta
     */
    private function setMeta($meta)
    {
        $this->meta = $meta;
    }

    /**
     * @return array
     */
    public function getTransaction()
    {
        return $this->transaction;
    }

    /**
     * @param array $Transaction
     */
    private function setTransaction($Transaction)
    {
        $this->transaction = $Transaction;
    }

    /**
     * @return array
     */
    public function getTransactionLog()
    {
        return $this->transactionLog;
    }

    /**
     * @param array $transactionLog
     */
    private function setTransactionLog($transactionLog)
    {
        $this->transactionLog = $transactionLog;
    }


    public function __construct($response)
    {
        $this->setMeta($response['meta']);
        $this->setTransaction($response['result']['transaction']);
        $this->setTransactionLog($response['result']['transactionLog']);
    }
}