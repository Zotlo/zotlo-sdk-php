<?php

namespace Zotlo\Connect\Entity\Sale3D;

/**
 * Class Redirect
 * @package Zotlo\Connect\Entity
 */
class Redirect
{
    /**
     * @var string
     */
    private $url = null;

    /**
     * @var string
     */
    private $expiredDate = null;

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    private function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getExpiredDate()
    {
        return $this->expiredDate;
    }

    /**
     * @param string $expiredDate
     */
    private function setExpiredDate($expiredDate)
    {
        $this->expiredDate = $expiredDate;
    }

    public function __construct(array $redirect)
    {
        $this->setExpiredDate($redirect['expireDate']);
        $this->setUrl($redirect['url']);
    }


}