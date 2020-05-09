<?php

namespace Zotlo\Connect\Response;


class StatusCodeResponse
{

    /**
     * @var array
     */
    private $codes = null;
    /**
     * @var array
     */
    private $meta = null;

    /**
     * @return array
     */
    public function getCodes(): array
    {
        return $this->codes;
    }

    /**
     * @param array $codes
     */
    private function setCodes(array $codes)
    {
        $this->codes = $codes;
    }

    /**
     * @return array
     */
    public function getMeta(): array
    {
        return $this->meta;
    }

    /**
     * @param array $meta
     */
    private function setMeta(array $meta)
    {
        $this->meta = $meta;
    }



    public function __construct($response)
    {
        $this->setMeta($response['meta']);
        $this->setCodes($response['result']['codes']);
    }
}