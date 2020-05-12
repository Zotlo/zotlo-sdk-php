<?php
/**
 * It's very easy to manage your subscriptions with Zotlo! Create your account now on zotlo.com, add your subscription packages and enable users to subscribe to your apps using a credit card.dd
 *
 * Docs : https://docs.zotlo.com/
 */

namespace Zotlo\Connect\Services;

use Zotlo\Connect\Entity\Card;
use Zotlo\Connect\Entity\Form;
use Zotlo\Connect\Entity\Refund;
use Zotlo\Connect\Exception\PaymentException;
use Zotlo\Connect\Entity\CardToken;
use Zotlo\Connect\Entity\Credentials;
use Zotlo\Connect\Entity\Product;
use Zotlo\Connect\Entity\Redirect;
use Zotlo\Connect\Entity\Request;
use Zotlo\Connect\Entity\Subscriber;
use Zotlo\Connect\Response\CreateFormUrlResponse;
use Zotlo\Connect\Response\PaymentFormResponse;
use Zotlo\Connect\Response\RefundResponse;
use Zotlo\Connect\Response\Sale3DResponse;
use Zotlo\Connect\Response\SaleResponse;
use Zotlo\Connect\Response\StatusCodeResponse;

/**
 * Class Payment
 * @package Zotlo\Connect\Payment
 */
class Payment extends HttpClient
{

    /**
     * @var Credentials
     */
    private $credentials = null;
    /**
     * @var Subscriber
     */
    private $subscriber = null;
    /**
     * @var Product
     */
    private $product = null;

    /**
     * @var Card
     */
    private $card = null;

    /**
     * @var CardToken
     */
    private $cardToken = null;

    /**
     * @var Redirect
     */
    private $redirect = null;

    /**
     * @var Request
     */
    private $request = null;
    /**
     * @var Form
     */
    private $form = null;
    /**
     * @var Refund
     */
    private $refund = null;

    /**
     * @var array
     */
    private $requestData = [];

    /**
     * @return Credentials
     */
    public function getCredentials(): Credentials
    {
        return $this->credentials;
    }

    /**
     * @param Credentials $credentials
     */
    public function setCredentials(Credentials $credentials)
    {
        $this->credentials = $credentials;
        return $this;
    }

    /**
     * @return Subscriber
     */
    public function getSubscriber(): Subscriber
    {
        return $this->subscriber;
    }

    /**
     * @param Subscriber $subscriber
     */
    public function setSubscriber(Subscriber $subscriber)
    {
        $this->subscriber = $subscriber;
        return $this;
    }

    /**
     * @return Product
     */
    public function getProduct(): Product
    {
        return $this->product;
    }

    /**
     * @param Product $product
     */
    public function setProduct(Product $product)
    {
        $this->product = $product;
        return $this;
    }

    /**
     * @return Card
     */
    public function getCard(): Card
    {
        return $this->card;
    }

    /**
     * @param Card $card
     */
    public function setCard(Card $card)
    {
        $this->card = $card;
        return $this;
    }

    /**
     * @return CardToken
     */
    public function getCardToken(): CardToken
    {
        return $this->cardToken;
    }

    /**
     * @param CardToken $cardToken
     */
    public function setCardToken(CardToken $cardToken)
    {
        $this->cardToken = $cardToken;
        return $this;
    }

    /**
     * @return Redirect
     */
    public function getRedirect(): Redirect
    {
        return $this->redirect;
    }

    /**
     * @param Redirect $redirect
     */
    public function setRedirect(Redirect $redirect)
    {
        $this->redirect = $redirect;
        return $this;
    }

    /**
     * @return Request
     */
    public function getRequest(): Request
    {
        return $this->request;
    }

    /**
     * @param Request $request
     */
    public function setRequest(Request $request)
    {
        $this->request = $request;
        return $this;
    }

    /**
     * @return Form
     */
    public function getForm(): Form
    {
        return $this->form;
    }

    /**
     * @param Form $form
     */
    public function setForm(Form $form)
    {
        $this->form = $form;
    }

    /**
     * @return array
     */
    public function getRequestData()
    {
        return $this->requestData;
    }

    /**
     * @param array $requestData
     */
    public function setRequestData($requestData)
    {
        $this->requestData = $requestData;
    }

    /**
     * @return Refund
     */
    public function getRefund(): Refund
    {
        return $this->refund;
    }

    /**
     * @param Refund $refund
     */
    public function setRefund(Refund $refund)
    {
        $this->refund = $refund;
    }


    /**
     * Payment constructor.
     * @param Credentials $credentials
     */
    public function __construct(Credentials $credentials)
    {
        $this->setCredentials($credentials);
    }

    /**
     * @return SaleResponse
     * @throws PaymentException
     */
    public function saleWithCard(): SaleResponse
    {
        $requestData = [
            'cardNo' => $this->getCard()->getCardNumber(),
            'cardOwner' => $this->getCard()->getcardHolderName(),
            'expireMonth' => $this->getCard()->getExpireMonth(),
            'expireYear' => $this->getCard()->getExpireYear(),
            'cvv' => $this->getCard()->getCvv(),
            'language' => $this->getSubscriber()->getLanguage(),
            'packageId' => $this->getProduct()->getPackageId(),
            'subscriberId' => $this->getSubscriber()->getSubscriberId(),
            'subscriberCountry' => $this->getSubscriber()->getCountry(),
            'subscriberPhoneNumber' => $this->getSubscriber()->getPhoneNumber(),
            'subscriberFirstname' => $this->getSubscriber()->getFirstName(),
            'subscriberLastname' => $this->getSubscriber()->getLastName(),
            'subscriberEmail' => $this->getSubscriber()->getEmail(),
            'subscriberIpAddress' => $this->getSubscriber()->getIpAddress(),
            'redirectUrl' => $this->redirect ? $this->getRedirect()->getRedirectUrl() : '',
        ];

        $response = $this->post('payment/credit-card', $requestData);
        $salesResponse = new SaleResponse($response);
        return $salesResponse;

    }

    /**
     * @return SaleResponse
     * @throws PaymentException
     */
    public function saleWithToken(): SaleResponse
    {
        $requestData = [
            'cardToken' => $this->getCardToken()->getToken(),
            'language' => $this->getSubscriber()->getLanguage(),
            'packageId' => $this->getProduct()->getPackageId(),
            'subscriberId' => $this->getSubscriber()->getSubscriberId(),
            'subscriberCountry' => $this->getSubscriber()->getCountry(),
            'subscriberPhoneNumber' => $this->getSubscriber()->getPhoneNumber(),
            'subscriberFirstname' => $this->getSubscriber()->getFirstName(),
            'subscriberLastname' => $this->getSubscriber()->getLastName(),
            'subscriberEmail' => $this->getSubscriber()->getEmail(),
            'subscriberIpAddress' => $this->getSubscriber()->getIpAddress(),
        ];

        $response = $this->post('payment/credit-card', $requestData);
        $salesResponse = new SaleResponse($response);
        return $salesResponse;
    }

    /**
     * @return CreateFormUrlResponse
     * @throws PaymentException
     */
    public function createFormUrl(): CreateFormUrlResponse
    {
        $requestData = [
            'platform' => $this->getRequest()->getPlatform(),
            'formId' => $this->getForm()->getFormId(),
            'language' => $this->getSubscriber()->getLanguage(),
            'packageId' => $this->getProduct()->getPackageId(),
            'subscriberId' => $this->getSubscriber()->getSubscriberId(),
            'subscriberCountry' => $this->getSubscriber()->getCountry(),
            'subscriberPhoneNumber' => $this->getSubscriber()->getPhoneNumber(),
            'subscriberFirstname' => $this->getSubscriber()->getFirstName(),
            'subscriberLastname' => $this->getSubscriber()->getLastName(),
            'subscriberEmail' => $this->getSubscriber()->getEmail(),
            'subscriberIpAddress' => $this->getSubscriber()->getIpAddress(),
        ];

        $response = $this->post('payment/create-form-url', $requestData);
        $salesResponse = new CreateFormUrlResponse($response);
        return $salesResponse;
    }

    /**
     * @return Sale3DResponse
     * @throws PaymentException
     */
    public function sale3D(): Sale3DResponse
    {
        $requestData = [
            'cardNo' => $this->getCard()->getCardNumber(),
            'cardOwner' => $this->getCard()->getcardHolderName(),
            'expireMonth' => $this->getCard()->getExpireMonth(),
            'expireYear' => $this->getCard()->getExpireYear(),
            'cvv' => $this->getCard()->getCvv(),
            'language' => $this->getSubscriber()->getLanguage(),
            'platform' => $this->getRequest()->getPlatform(),
            'packageId' => $this->getProduct()->getPackageId(),
            'subscriberId' => $this->getSubscriber()->getSubscriberId(),
            'subscriberCountry' => $this->getSubscriber()->getCountry(),
            'subscriberPhoneNumber' => $this->getSubscriber()->getPhoneNumber(),
            'subscriberFirstname' => $this->getSubscriber()->getFirstName(),
            'subscriberLastname' => $this->getSubscriber()->getLastName(),
            'subscriberEmail' => $this->getSubscriber()->getEmail(),
            'subscriberIpAddress' => $this->getSubscriber()->getIpAddress(),
            'redirectUrl' => $this->getRedirect()->getRedirectUrl(),
        ];

        $response = $this->post('payment/start-payment', $requestData);
        return new Sale3DResponse($response);

    }


    /**
     * @return PaymentFormResponse
     * @throws PaymentException
     */
    public function getPaymentForms(): PaymentFormResponse
    {
        $response = $this->get('payment/form-list', []);
        return new PaymentFormResponse($response);

    }

    /**
     * @return StatusCodeResponse
     * @throws PaymentException
     */
    public function getStatusCode(): StatusCodeResponse
    {
        $response = $this->get('payment/status-code', []);
        return new StatusCodeResponse($response);
    }

    public function refund()
    {
        $requestData = [
            'transactionId' => $this->getRefund()->getTransactionId(),
            'refundReason' => $this->getRefund()->getReason(),
        ];

        $response = $this->post('payment/refund', $requestData);
        return new RefundResponse($response);

    }

}