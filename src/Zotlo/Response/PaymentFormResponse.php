<?php

namespace Zotlo\Connect\Response;

/**
 * Class PaymentFormResponse
 * @package Zotlo\Connect\Response
 */
class PaymentFormResponse
{

    /**
     * @var array
     */
    private $forms = null;
    /**
     * @var array
     */
    private $meta = null;

    /**
     * @return array
     */
    public function getForms(): array
    {
        return $this->forms;
    }

    /**
     * @param array $forms
     */
    private function setForms(array $forms)
    {
        $this->forms = $forms;
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


    /**
     * PaymentFormResponse constructor.
     * @param $response
     */
    public function __construct($response)
    {
        $this->setMeta($response['meta']);
        $this->setForms($response['result']['form']);
    }
}