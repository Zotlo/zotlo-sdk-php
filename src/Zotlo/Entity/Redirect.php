<?php

namespace Zotlo\Connect\Entity;

/**
 * Class Redirect
 * @package Zotlo\Connect\Entity
 */
class Redirect
{
    /**
     * @var null
     */
    private $redirectUrl = null;

    /**
     * @return null
     */
    public function getRedirectUrl()
    {
        return $this->redirectUrl;
    }

    /**
     * @param null $redirectUrl
     */
    public function setRedirectUrl($redirectUrl)
    {
        $this->redirectUrl = $redirectUrl;
        return $this;
    }


}