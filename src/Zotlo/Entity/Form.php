<?php

namespace Zotlo\Connect\Entity;

/**
 * Class Form
 * @package Zotlo\Connect\Entity
 */
class Form
{
    /**
     * @var string
     */
    public $formId;

    /**
     * @return string
     */
    public function getFormId()
    {
        return $this->formId;
    }

    /**
     * @param string $formId
     */
    public function setFormId($formId)
    {
        $this->formId = $formId;
    }


}