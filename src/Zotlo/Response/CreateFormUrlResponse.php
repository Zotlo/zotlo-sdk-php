<?php

namespace Zotlo\Connect\Response;

use Zotlo\Connect\Entity\Transaction;

class CreateFormUrlResponse
{
    /**
     * @var array
     */
    private $meta = null;

    /**
     * @var string
     */
    private $formUrl = null;

    /**
     * @var string
     */
    private $expireDate = null;

    /**
     * @return string
     */
    public function getFormUrl()
    {
        return $this->formUrl;
    }

    /**
     * @param string $formUrl
     */
    private function setFormUrl($formUrl)
    {
        $this->formUrl = $formUrl;
    }

    /**
     * @return string
     */
    public function getExpireDate()
    {
        return $this->expireDate;
    }

    /**
     * @param string $expireDate
     */
    private function setExpireDate($expireDate)
    {
        $this->expireDate = $expireDate;
    }

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


    public function __construct($response)
    {
        $this->setMeta($response['meta']);
        $this->setFormUrl($response['result']['form']['formUrl']);
        $this->setExpireDate($response['result']['form']['expireDate']);
    }
}