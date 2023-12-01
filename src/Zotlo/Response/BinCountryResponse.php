<?php

namespace Zotlo\Connect\Response;

use Zotlo\Connect\Entity\Meta;

/**
 * Class BinCountryResponse
 * @package Zotlo\Connect\Response
 */
class BinCountryResponse
{
    /**
     * @var Meta
     */
    private $meta = null;

    /**
     * @var array
     */
    private $result = null;

    /**
     * BinCountryResponse constructor.
     * @param $response
     */
    public function __construct($response)
    {
        $this->setMeta(new Meta($response["meta"]));
        $this->setResult($response["result"]);
    }

    /**
     * @return Meta|null
     */
    public function getMeta(): ?Meta
    {
        return $this->meta;
    }

    /**
     * @param Meta $meta
     * @return void
     */
    public function setMeta(Meta $meta): void
    {
        $this->meta = $meta;
    }

    /**
     * @return array|null
     */
    public function getResult(): ?array
    {
        return $this->result;
    }

    /**
     * @param array $result
     * @return void
     */
    public function setResult(array $result): void
    {
        $this->result = $result;
    }
}