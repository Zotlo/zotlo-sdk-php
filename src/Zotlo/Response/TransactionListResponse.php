<?php

namespace Zotlo\Connect\Response;


class TransactionListResponse
{

    /**
     * @var array
     */
    private $transactions = null;
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
    public function getTransactions()
    {
        return $this->transactions;
    }

    /**
     * @param array $transactions
     */
    private function setTransactions($transactions)
    {
        $this->transactions = $transactions;
    }


    public function __construct($response)
    {
        $this->setMeta($response['meta']);
        $this->setTransactions($response['result']['transactions']);
    }
}