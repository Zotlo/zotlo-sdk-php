<?php
/**
 * It's very easy to manage your subscriptions with Zotlo! Create your account now on zotlo.com, add your subscription packages and enable users to subscribe to your apps using a credit card.dd
 *
 * Docs : https://docs.zotlo.com/
 */

namespace Zotlo\Connect\Entity\Sale;

/**
 * Class PaymentResponse
 * @package Zotlo\Connect\Entity\Sale
 */
class Transaction
{
    /**
     * @var bool
     */
    private $isSuccess = false;

    /**
     * @var string
     */
    private $transactionId = null;
    /**
     * @var string
     */
    private $statusCode = null;
    /**
     * @var string
     */
    private $statusMessage = null;
    /**
     * @var string
     */
    private $paymentDate = null;
    /**
     * @var array
     */
    private $providerResponse = [];

    /**
     * @return bool
     */
    public function isSuccess()
    {
        return $this->isSuccess;
    }

    /**
     * @param bool $isSuccess
     */
    private function setIsSuccess($isSuccess)
    {
        $this->isSuccess = $isSuccess;
    }

    /**
     * @return string
     */
    public function getTransactionId()
    {
        return $this->transactionId;
    }

    /**
     * @param string $transactionId
     */
    private function setTransactionId($transactionId)
    {
        $this->transactionId = $transactionId;
    }

    /**
     * @return string
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param string $statusCode
     */
    private function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
    }

    /**
     * @return string
     */
    public function getStatusMessage()
    {
        return $this->statusMessage;
    }

    /**
     * @param string $statusMessage
     */
    private function setStatusMessage($statusMessage)
    {
        $this->statusMessage = $statusMessage;
    }

    /**
     * @return string
     */
    public function getPaymentDate()
    {
        return $this->paymentDate;
    }

    /**
     * @param string $paymentDate
     */
    private function setPaymentDate($paymentDate)
    {
        $this->paymentDate = $paymentDate;
    }

    /**
     * @return array
     */
    public function getProviderResponse()
    {
        return $this->providerResponse;
    }

    /**
     * @param array $providerResponse
     */
    private function setProviderResponse($providerResponse)
    {
        $this->providerResponse = $providerResponse;
    }

    /**
     * Transaction constructor.
     * @param $result
     */
    public function __construct($result)
    {
        $this->setIsSuccess(isset($result['isSuccess']) ? $result['isSuccess'] : null);
        $this->setTransactionId(isset($result['transactionId']) ? $result['transactionId'] : null);
        $this->setPaymentDate(isset($result['paymentDate']) ? $result['paymentDate'] : null);
        $this->setStatusCode(isset($result['statusCode']) ? $result['statusCode'] : null);
        $this->setStatusMessage(isset($result['statusMessage']) ? $result['statusMessage'] : null);
        $this->setProviderResponse(isset($result['providerResponse']) ? $result['providerResponse'] : null);
    }

}