<?php
/**
 * It's very easy to manage your subscriptions with Zotlo! Create your account now on zotlo.com, add your subscription packages and enable users to subscribe to your apps using a credit card.dd
 *
 * Docs : https://docs.zotlo.com/
 */

namespace Zotlo\Connect\Services;

use Zotlo\Connect\Entity\Card;
use Zotlo\Connect\Entity\CardToken;
use Zotlo\Connect\Entity\ChangePackage;
use Zotlo\Connect\Entity\Credentials;
use Zotlo\Connect\Entity\Form;
use Zotlo\Connect\Entity\Product;
use Zotlo\Connect\Entity\Redirect;
use Zotlo\Connect\Entity\Refund;
use Zotlo\Connect\Entity\Request;
use Zotlo\Connect\Entity\Subscriber;
use Zotlo\Connect\Entity\PreCheckAlternativePayment;
use Zotlo\Connect\Exception\PaymentException;
use Zotlo\Connect\Response\AlternativePaymentResponse;
use Zotlo\Connect\Response\ChangeCardResponse;
use Zotlo\Connect\Response\CreateFormUrlResponse;
use Zotlo\Connect\Response\CryptoPaymentResponse;
use Zotlo\Connect\Response\PaymentFormResponse;
use Zotlo\Connect\Response\PaypalPaymentResponse;
use Zotlo\Connect\Response\PreCheckAlternativePaymentResponse;
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
     * @var ChangePackage
     */
    private $changePackage = null;
    /**
     * @var PreCheckAlternativePayment
     */
    private $preCheckAlternativePaymentEntity = null;

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
     * @var bool
     */
    private $force3ds = false;

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
     * @return ?CardToken
     */
    public function getCardToken(): ?CardToken
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
     * @return $this
     */
    public function setForm(Form $form)
    {
        $this->form = $form;
        return $this;
    }

    /**
     * @return array
     */
    public function getRequestData()
    {
        return $this->requestData;
    }


    /**
     * @param $requestData
     * @return $this
     */
    public function setRequestData($requestData)
    {
        $this->requestData = $requestData;
        return $this;
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
     * @return $this
     */
    public function setRefund(Refund $refund)
    {
        $this->refund = $refund;
        return $this;
    }

    /**
     * @return ChangePackage
     */
    public function getChangePackage(): ChangePackage
    {
        return $this->changePackage;
    }


    /**
     * @param ChangePackage $changePackage
     * @return $this
     */
    public function setChangePackage(ChangePackage $changePackage)
    {
        $this->changePackage = $changePackage;
        return $this;
    }

    /**
     * @return bool
     */
    public function isForce3ds()
    {
        return $this->force3ds;
    }


    /**
     * @param bool $force3ds
     * @return $this
     */
    public function setForce3ds(bool $force3ds)
    {
        $this->force3ds = $force3ds;
        return $this;
    }

    /**
     * @return PreCheckAlternativePayment|null
     */
    public function getPreCheckAlternativePaymentEntity(): PreCheckAlternativePayment
    {
        return $this->preCheckAlternativePaymentEntity;
    }

    /**
     * @param PreCheckAlternativePayment|null $preCheckAlternativePaymentEntity
     */
    public function setPreCheckAlternativePaymentEntity(PreCheckAlternativePayment $preCheckAlternativePaymentEntity)
    {
        $this->preCheckAlternativePaymentEntity = $preCheckAlternativePaymentEntity;
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
            'platform' => $this->getRequest()->getPlatform(),
            'cardNo' => $this->getCard()->getCardNumber(),
            'cardOwner' => $this->getCard()->getcardHolderName(),
            'expireMonth' => $this->getCard()->getExpireMonth(),
            'expireYear' => $this->getCard()->getExpireYear(),
            'cvv' => $this->getCard()->getCvv(),
            'language' => $this->getSubscriber()->getLanguage(),
            'packageId' => $this->getProduct()->getPackageId(),
            'price' => $this->getProduct()->getDefaultPrice(),
            'currency' => $this->getProduct()->getDefaultCurrency(),
            'discountPercent' => $this->getProduct()->getDiscountPercent(),
            'subscriberId' => $this->getSubscriber()->getSubscriberId(),
            'subscriberCountry' => $this->getSubscriber()->getCountry(),
            'packageCountry' => $this->getSubscriber()->getPackageCountry(),
            'subscriberPhoneNumber' => $this->getSubscriber()->getPhoneNumber(),
            'subscriberFirstname' => $this->getSubscriber()->getFirstName(),
            'subscriberLastname' => $this->getSubscriber()->getLastName(),
            'subscriberEmail' => $this->getSubscriber()->getEmail(),
            'subscriberIpAddress' => $this->getSubscriber()->getIpAddress(),
            'force3ds' => $this->isForce3ds() ? 1 : 0,
            'redirectUrl' => $this->redirect ? $this->getRedirect()->getRedirectUrl() : '',
            'customParameters' => $this->getSubscriber()->getCustomParams(),
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
            'platform' => $this->getRequest()->getPlatform(),
            'language' => $this->getSubscriber()->getLanguage(),
            'packageId' => $this->getProduct()->getPackageId(),
            'discountPercent' => $this->getProduct()->getDiscountPercent(),
            'subscriberId' => $this->getSubscriber()->getSubscriberId(),
            'price' => $this->getProduct()->getDefaultPrice(),
            'currency' => $this->getProduct()->getDefaultCurrency(),
            'subscriberCountry' => $this->getSubscriber()->getCountry(),
            'packageCountry' => $this->getSubscriber()->getPackageCountry(),
            'subscriberPhoneNumber' => $this->getSubscriber()->getPhoneNumber(),
            'subscriberFirstname' => $this->getSubscriber()->getFirstName(),
            'subscriberLastname' => $this->getSubscriber()->getLastName(),
            'subscriberEmail' => $this->getSubscriber()->getEmail(),
            'subscriberIpAddress' => $this->getSubscriber()->getIpAddress(),
            'customParameters' => $this->getSubscriber()->getCustomParams(),
            'cardToken' => $this->getCardToken()->getToken(),
            'cvvCheck' => $this->getCardToken()->isCvvCheck(),
            'cvv' => $this->getCardToken()->getCvv(),
        ];


        $response = $this->post('payment/credit-card', $requestData);
        $salesResponse = new SaleResponse($response);
        return $salesResponse;
    }

    /**
     * @return CryptoPaymentResponse
     * @throws PaymentException
     */
    public function saleWithCrypto(): CryptoPaymentResponse
    {
        $requestData = [
            'platform' => $this->getRequest()->getPlatform(),
            'language' => $this->getSubscriber()->getLanguage(),
            'packageId' => $this->getProduct()->getPackageId(),
            'subscriberId' => $this->getSubscriber()->getSubscriberId(),
            'subscriberCountry' => $this->getSubscriber()->getCountry(),
            'subscriberPhoneNumber' => $this->getSubscriber()->getPhoneNumber(),
            'subscriberFirstname' => $this->getSubscriber()->getFirstName(),
            'subscriberLastname' => $this->getSubscriber()->getLastName(),
            'subscriberEmail' => $this->getSubscriber()->getEmail(),
            'redirectUrl' => $this->getRedirect()->getRedirectUrl(),
            'customParameters' => $this->getSubscriber()->getCustomParams(),
        ];

        $response = $this->post('payment/crypto', $requestData);
        return new CryptoPaymentResponse($response);
    }

    /**
     * @return \Zotlo\Connect\Response\PaypalPaymentResponse
     * @throws \Zotlo\Connect\Exception\PaymentException
     */
    public function saleWithPaypal(): PaypalPaymentResponse
    {
        $requestData = [
            'platform' => $this->getRequest()->getPlatform(),
            'language' => $this->getSubscriber()->getLanguage(),
            'packageId' => $this->getProduct()->getPackageId(),
            'subscriberId' => $this->getSubscriber()->getSubscriberId(),
            'subscriberCountry' => $this->getSubscriber()->getCountry(),
            'subscriberPhoneNumber' => $this->getSubscriber()->getPhoneNumber(),
            'subscriberFirstname' => $this->getSubscriber()->getFirstName(),
            'subscriberLastname' => $this->getSubscriber()->getLastName(),
            'subscriberEmail' => $this->getSubscriber()->getEmail(),
            'redirectUrl' => $this->getRedirect()->getRedirectUrl(),
            'customParameters' => $this->getSubscriber()->getCustomParams(),
        ];

        $response = $this->post('payment/paypal', $requestData);
        return new PaypalPaymentResponse($response);
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
            'customParameters' => $this->getSubscriber()->getCustomParams(),
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
            'platform' => $this->getRequest()->getPlatform(),
            'cardNo' => $this->getCard()->getCardNumber(),
            'cardOwner' => $this->getCard()->getcardHolderName(),
            'expireMonth' => $this->getCard()->getExpireMonth(),
            'expireYear' => $this->getCard()->getExpireYear(),
            'cvv' => $this->getCard()->getCvv(),
            'language' => $this->getSubscriber()->getLanguage(),
            'packageId' => $this->getProduct()->getPackageId(),
            'discountPercent' => $this->getProduct()->getDiscountPercent(),
            'subscriberId' => $this->getSubscriber()->getSubscriberId(),
            'subscriberCountry' => $this->getSubscriber()->getCountry(),
            'subscriberPhoneNumber' => $this->getSubscriber()->getPhoneNumber(),
            'subscriberFirstname' => $this->getSubscriber()->getFirstName(),
            'subscriberLastname' => $this->getSubscriber()->getLastName(),
            'subscriberEmail' => $this->getSubscriber()->getEmail(),
            'subscriberIpAddress' => $this->getSubscriber()->getIpAddress(),
            'redirectUrl' => $this->getRedirect()->getRedirectUrl(),
            'customParameters' => $this->getSubscriber()->getCustomParams(),
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

    /**
     * @return RefundResponse
     * @throws PaymentException
     */
    public function refund()
    {
        $requestData = [
            'transactionId' => $this->getRefund()->getTransactionId(),
            'refundReason' => $this->getRefund()->getReason(),
            'refundUser' => $this->getRefund()->getUser(),
        ];

        $response = $this->post('payment/refund', $requestData);
        return new RefundResponse($response);

    }

    /**
     * @return ChangeCardResponse
     * @throws PaymentException
     */
    public function changeCard(): ChangeCardResponse
    {
        $requestData = [
            'cardNo' => $this->getCard()->getCardNumber(),
            'cardOwner' => $this->getCard()->getcardHolderName(),
            'expireMonth' => $this->getCard()->getExpireMonth(),
            'expireYear' => $this->getCard()->getExpireYear(),
            'cvv' => $this->getCard()->getCvv(),
            'language' => $this->getSubscriber()->getLanguage(),
            'subscriberId' => $this->getSubscriber()->getSubscriberId(),
        ];

        $response = $this->post('subscription/change-card', $requestData);
        $salesResponse = new ChangeCardResponse($response);
        return $salesResponse;

    }

    /**
     * @return SaleResponse
     * @throws PaymentException
     */
    public function saveCard(): SaleResponse
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
            'force3ds' => $this->isForce3ds()
        ];

        $response = $this->post('payment/save-card', $requestData);
        $salesResponse = new SaleResponse($response);
        return $salesResponse;
    }

    /**
     * @return SaleResponse
     * @throws PaymentException
     */
    public function changeSubscriberPackage(): SaleResponse
    {
        $requestData = [
            'cardNo' => $this->getCard()->getCardNumber(),
            'cardOwner' => $this->getCard()->getcardHolderName(),
            'expireMonth' => $this->getCard()->getExpireMonth(),
            'expireYear' => $this->getCard()->getExpireYear(),
            'cvv' => $this->getCard()->getCvv(),
            'language' => $this->getSubscriber()->getLanguage(),
            'packageId' => $this->getSubscriber()->getPackageId(),
            'newPackageId' => $this->getChangePackage()->getNewPackageId(),
            'subscriberId' => $this->getSubscriber()->getSubscriberId(),
            'subscriberIpAddress' => $this->getSubscriber()->getIpAddress(),
            'redirectUrl' => $this->redirect ? $this->getRedirect()->getRedirectUrl() : '',
            'changeType' => $this->getChangePackage()->getChangeType(),
        ];

        if ($this->getCardToken() != null) {
            $requestData['cardToken'] = $this->getCardToken()->getToken();
        }

        $response = $this->post('payment/change-package', $requestData);
        $salesResponse = new SaleResponse($response);
        return $salesResponse;
    }


    /**
     * @return CreateFormUrlResponse
     * @throws PaymentException
     */
    public function changeSubscriberPackageFormRequest(): CreateFormUrlResponse
    {
        $requestData = [
            'formId' => $this->getForm()->getFormId(),
            'language' => $this->getSubscriber()->getLanguage(),
            'packageId' => $this->getSubscriber()->getPackageId(),
            'newPackageId' => $this->getChangePackage()->getNewPackageId(),
            'subscriberId' => $this->getSubscriber()->getSubscriberId(),
            'changeType' => $this->getChangePackage()->getChangeType(),
            'customParameters' => $this->getSubscriber()->getCustomParams(),
        ];

        $response = $this->post('payment/change-package-request', $requestData);
        return new CreateFormUrlResponse($response);
    }


    /**
     * @return AlternativePaymentResponse
     * @throws PaymentException
     */
    public function startAlternativePayment(): AlternativePaymentResponse
    {
        $requestData = [
            'platform' => $this->getRequest()->getPlatform(),
            'providerId' => $this->getRequest()->getProviderId(),
            'language' => $this->getSubscriber()->getLanguage(),
            'packageId' => $this->getProduct()->getPackageId(),
            'quantity' => 1,
            'subscriberId' => $this->getSubscriber()->getSubscriberId(),
            'subscriberCountry' => $this->getSubscriber()->getCountry(),
            'subscriberPhoneNumber' => $this->getSubscriber()->getPhoneNumber(),
            'subscriberFirstname' => $this->getSubscriber()->getFirstName(),
            'subscriberLastname' => $this->getSubscriber()->getLastName(),
            'subscriberEmail' => $this->getSubscriber()->getEmail(),
            'customParameters' => $this->getSubscriber()->getCustomParams(),
            'returnUrl' => $this->redirect ? $this->getRedirect()->getRedirectUrl() : '',
        ];

        $response = $this->post('payment/alternative-provider', $requestData);
        return new AlternativePaymentResponse($response);
    }


    /**
     * @return PreCheckAlternativePaymentResponse
     * @throws PaymentException
     */
    public function preCheckAlternativePayment(): PreCheckAlternativePaymentResponse
    {
        $requestData = [
            'subscriberPhoneNumber' => $this->getPreCheckAlternativePaymentEntity()->getSubscriberPhoneNumber(),
            'packageId' => $this->getPreCheckAlternativePaymentEntity()->getPackageId(),
            'providerId' => $this->getPreCheckAlternativePaymentEntity()->getProviderId(),
        ];

        $response = $this->post('payment/pre-check-alternative-provider', $requestData);
        return new PreCheckAlternativePaymentResponse($response);
    }

}