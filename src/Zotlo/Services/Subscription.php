<?php
/**
 * It's very easy to manage your subscriptions with Zotlo! Create your account now on zotlo.com, add your subscription packages and enable users to subscribe to your apps using a credit card.dd
 *
 * Docs : https://docs.zotlo.com/
 */

namespace Zotlo\Connect\Services;

use Zotlo\Connect\Entity\Card;
use Zotlo\Connect\Entity\SubscriberCancellation;
use Zotlo\Connect\Exception\PaymentException;
use Zotlo\Connect\Entity\Credentials;
use Zotlo\Connect\Entity\Product;
use Zotlo\Connect\Entity\Request;
use Zotlo\Connect\Entity\Subscriber;
use Zotlo\Connect\Response\ChangePackageResponse;
use Zotlo\Connect\Response\SubscriberCancellationResponse;
use Zotlo\Connect\Response\SubscriberProfileResponse;

/**
 * Class Payment
 * @package Zotlo\Connect\Payment
 */
class Subscription extends HttpClient
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
     * @var Request
     */
    private $request = null;

    /**
     * @var SubscriberCancellation
     */
    private $cancellation = null;


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
     * @return SubscriberCancellation
     */
    public function getCancellation(): SubscriberCancellation
    {
        return $this->cancellation;
    }

    /**
     * @param SubscriberCancellation $cancellation
     */
    public function setCancellation(SubscriberCancellation $cancellation)
    {
        $this->cancellation = $cancellation;
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
     * @return SubscriberProfileResponse
     * @throws PaymentException
     */
    public function profile(): SubscriberProfileResponse
    {
        $response = $this->get('subscription/profile', [
            'subscriberId' => $this->getSubscriber()->getSubscriberId(),
        ]);

        return new SubscriberProfileResponse($response);

    }

    /**
     * @return SubscriberCancellationResponse
     * @throws PaymentException
     */
    public function cancellation(): SubscriberCancellationResponse
    {
        $response = $this->post('subscription/cancellation', [
            'subscriberId' => $this->getCancellation()->getSubscriberId(),
            'cancellationReason' => $this->getCancellation()->getReason(),
            'force' => $this->getCancellation()->isForce(),
        ]);

        return new SubscriberCancellationResponse($response);

    }

    /**
     * @return ChangePackageResponse
     * @throws PaymentException
     */
    public function changePackage(): ChangePackageResponse
    {
        $response = $this->post('subscription/change-package', [
            'subscriberId' => $this->getSubscriber()->getSubscriberId(),
            'packageId' => $this->getProduct()->getPackageId(),
        ]);

        return new ChangePackageResponse($response);

    }

}