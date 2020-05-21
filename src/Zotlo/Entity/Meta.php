<?php

namespace Zotlo\Connect\Entity;

/**
 * Class Meta
 * @package Zotlo\Connect\Entity
 */
class Meta
{
    /**
     * @var string
     */

    private $requestId = null;
    /**
     * @var integer
     */
    private $httpStatus = null;

    /**
     * @return string
     */
    public function getRequestId()
    {
        return $this->requestId;
    }

    /**
     * @return int
     */
    public function getHttpStatus()
    {
        return $this->httpStatus;
    }


    public function __construct($result)
    {
        $this->requestId = isset($result['requestId']) ? $result['requestId'] : null;
        $this->httpStatus = isset($result['httpStatus']) ? (int)$result['httpStatus'] : null;
    }

}