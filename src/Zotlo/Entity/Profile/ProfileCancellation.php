<?php

namespace Zotlo\Connect\Entity\Profile;

/**
 * Class PaymentResponse
 * @package Zotlo\Connect\Entity\Profile
 */
class ProfileCancellation
{
    /**
     * @var string
     */
    private $date = null;

    /**
     * @var string
     */
    private $reason = null;
    /**
     * @var string
     */
    private $code = null;

    /**
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return string
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * ProfileCancellation constructor.
     * @param $result
     */
    public function __construct($result)
    {
        if ($result != null) {
            $this->reason = isset($result['reason']) ? $result['reason'] : null;
            $this->code = isset($result['code']) ? $result['code'] : null;
            $this->date = isset($result['date']) ? $result['date'] : null;
        }
    }

}