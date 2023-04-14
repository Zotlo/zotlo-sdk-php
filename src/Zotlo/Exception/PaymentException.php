<?php

namespace Zotlo\Connect\Exception;

/**
 * Class PaymentException
 * @package Zotlo\Connect\Exception
 */
class PaymentException extends \Exception
{
    /**
     * @var null
     */
    private $errorMessage = null;
    /**
     * @var null
     */
    private $httpStatus = null;
    /**
     * @var null
     */
    private $errorCode = null;
    /**
     * @var null
     */
    private $meta = null;
    /**
     * @var null
     */
    private $result = null;

    /**
     * @return null
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    /**
     * @param null $errorMessage
     */
    public function setErrorMessage($errorMessage)
    {
        $this->errorMessage = $errorMessage;
    }

    /**
     * @return null
     */
    public function getHttpStatus()
    {
        return $this->httpStatus;
    }

    /**
     * @param null $httpStatus
     */
    public function setHttpStatus($httpStatus)
    {
        $this->httpStatus = $httpStatus;
    }

    /**
     * @return null
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }

    /**
     * @param null $errorCode
     */
    public function setErrorCode($errorCode)
    {
        $this->errorCode = $errorCode;
    }

    /**
     * @return null
     */
    public function getMeta()
    {
        return $this->meta;
    }

    /**
     * @param null $meta
     */
    public function setMeta($meta)
    {
        $this->meta = $meta;
    }

    /**
     * @return null
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param null $result
     */
    public function setResult($result)
    {
        $this->result = $result;
    }

    /**
     * PaymentException constructor.
     * @param $response
     */
    public function __construct($response)
    {

        if (!is_array($response)) {
            $response = [
                'meta' => [
                    'requestId' => uniqid(),
                    'httpStatus' => 400,
                    'errorCode' => 400000,
                    'errorMessage' => 'Transaction failed. Please try again.'
                ],
                'result' => []
            ];
        }

        $this->setMeta(is_array($response) ? $response['meta'] : null);
        $this->setHttpStatus($response['meta']['httpStatus']);
        $this->setErrorCode($response['meta']['errorCode']);
        $this->setErrorMessage($response['meta']['errorMessage']);
        $this->setResult($response['result']);
    }
}