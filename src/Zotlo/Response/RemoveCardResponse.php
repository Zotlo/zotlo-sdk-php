<?php

namespace Zotlo\Connect\Response;

use Zotlo\Connect\Entity\Meta;

class RemoveCardResponse
{
    /**
     * @return Meta
     */
    private $meta = null;

    /**
     * @var array
     */
    private $result = [];

    /**
     * @return Meta
     */
    public function getMeta()
    {
        return $this->meta;
    }

    /**
     * @return array
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * SavedCardResponse constructor.
     * @param $response
     */
    public function __construct($response)
    {
        $this->meta = new Meta($response['meta']);
        $this->result = $response['result'];
    }
}