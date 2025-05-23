<?php
/**
 * It's very easy to manage your subscriptions with Zotlo! Create your account now on zotlo.com, add your subscription packages and enable users to subscribe to your apps using a credit card.dd
 *
 * Docs : https://docs.zotlo.com/
 */

namespace Zotlo\Connect\Services;

use Zotlo\Connect\Entity\Card;
use Zotlo\Connect\Entity\CardToken;
use Zotlo\Connect\Entity\Credentials;
use Zotlo\Connect\Entity\Product;
use Zotlo\Connect\Entity\Profile\Profile;
use Zotlo\Connect\Entity\Request;
use Zotlo\Connect\Entity\Subscriber;
use Zotlo\Connect\Entity\SubscriberCancellation;
use Zotlo\Connect\Entity\SubscriberFreeze;
use Zotlo\Connect\Entity\SubscriberUnfreeze;
use Zotlo\Connect\Exception\PaymentException;
use Zotlo\Connect\Response\ChangePackageResponse;
use Zotlo\Connect\Response\PackageDowngradeCancelResponse;
use Zotlo\Connect\Response\PurchaseListResponse;
use Zotlo\Connect\Response\RemoveCardResponse;
use Zotlo\Connect\Response\SavedCardResponse;
use Zotlo\Connect\Response\SubscriberCancellationResponse;
use Zotlo\Connect\Response\SubscriberListResponse;
use Zotlo\Connect\Response\SubscriberProfileResponse;
use Zotlo\Connect\Response\SubscriptionFreezeResponse;
use Zotlo\Connect\Response\SubscriptionUnfreezeResponse;

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
     * @var null|SubscriberFreeze
     */
    private $freeze = null;

    /**
     * @var null|SubscriberUnfreeze
     */
    private $unfreeze = null;


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
     * @return $this
     */
    public function setCancellation(SubscriberCancellation $cancellation)
    {
        $this->cancellation = $cancellation;
        return $this;
    }

    /**
     * @return SubscriberFreeze|null
     */
    public function getFreeze(): ?SubscriberFreeze
    {
        return $this->freeze;
    }

    /**
     * @param SubscriberFreeze|null $freeze
     * @return $this
     */
    public function setFreeze(?SubscriberFreeze $freeze): Subscription
    {
        $this->freeze = $freeze;
        return $this;
    }

    /**
     * @return SubscriberUnfreeze|null
     */
    public function getUnfreeze(): ?SubscriberUnfreeze
    {
        return $this->unfreeze;
    }

    /**
     * @param SubscriberUnfreeze|null $unfreeze
     * @return $this
     */
    public function setUnfreeze(?SubscriberUnfreeze $unfreeze): Subscription
    {
        $this->unfreeze = $unfreeze;
        return $this;
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
        $subscriberId = trim($this->getSubscriber()->getSubscriberId());
        $packageId = trim($this->getSubscriber()->getPackageId());

        if (empty($subscriberId) || empty($packageId)) {
            throw new \InvalidArgumentException('subscriberId or packageId is invalid');
        }

        $response = $this->get('subscription/profile', [
            'subscriberId' => $subscriberId,
            'packageId' => $packageId,
        ]);

        return new SubscriberProfileResponse($response);
    }


    /**
     * @return Profile[]
     * @throws PaymentException
     */
    public function list()
    {
        $subscriberId = trim($this->getSubscriber()->getSubscriberId());

        if (empty($subscriberId)) {
            throw new \InvalidArgumentException('subscriberId is invalid');
        }

        $response = $this->get('subscription/list', [
            'subscriberId' => $subscriberId,
        ]);

        return (new SubscriberListResponse($response['result']))->getList();
    }

    /**
     * @return SavedCardResponse
     * @throws PaymentException
     */
    public function getCardList(): SavedCardResponse
    {
        $subscriberId = trim($this->getSubscriber()->getSubscriberId());

        if (empty($subscriberId)) {
            throw new \InvalidArgumentException('subscriberId is invalid');
        }

        $response = $this->get('subscription/card-list', [
            'subscriberId' => $subscriberId,
        ]);

        return new SavedCardResponse($response);
    }

    /**
     * @param CardToken $cardToken
     * @return RemoveCardResponse
     * @throws PaymentException
     */
    public function removeCard(CardToken $cardToken): RemoveCardResponse
    {
        $subscriberId = trim($this->getSubscriber()->getSubscriberId());

        if (empty($subscriberId)) {
            throw new \InvalidArgumentException('subscriberId is invalid');
        }

        if (empty($cardToken->getToken())){
            throw new \InvalidArgumentException('cardToken is invalid');
        }

        $response = $this->post('subscription/delete-card', [
            'subscriberId' => $subscriberId,
            'creditCardToken' => $cardToken->getToken()
        ]);

        return new RemoveCardResponse($response);
    }

    /**
     * @return SubscriberCancellationResponse
     * @throws PaymentException
     */
    public function cancellation(): SubscriberCancellationResponse
    {
        $subscriberId = trim($this->getCancellation()->getSubscriberId());
        $packageId = trim($this->getCancellation()->getPackageId());

        if (empty($subscriberId) || empty($packageId)) {
            throw new \InvalidArgumentException('subscriberId or packageId  is invalid');
        }

        $response = $this->post('subscription/cancellation', [
            'subscriberId' => $subscriberId,
            'cancellationReason' => $this->getCancellation()->getReason(),
            'force' => $this->getCancellation()->isForce(),
            'packageId' => $packageId,
        ]);

        return new SubscriberCancellationResponse($response);

    }

    /**
     * @return ChangePackageResponse
     * @throws PaymentException
     */
    public function changePackage(): ChangePackageResponse
    {
        $subscriberId = trim($this->getSubscriber()->getSubscriberId());
        $packageId = trim($this->getSubscriber()->getPackageId());

        if (empty($subscriberId) || empty($packageId)) {
            throw new \InvalidArgumentException('subscriberId or packageId is invalid');
        }

        $response = $this->post('subscription/change-package', [
            'subscriberId' => $subscriberId,
            'packageId' => $packageId,
        ]);

        return new ChangePackageResponse($response);

    }

    /**
     * @return SubscriberProfileResponse
     * @throws PaymentException
     */
    public function reactivated(): SubscriberProfileResponse
    {
        $subscriberId = trim($this->getSubscriber()->getSubscriberId());
        $packageId = trim($this->getSubscriber()->getPackageId());

        if (empty($subscriberId) || empty($packageId)) {
            throw new \InvalidArgumentException('subscriberId or packageId is invalid');
        }

        $response = $this->post('subscription/reactivate', [
            'subscriberId' => $subscriberId,
            'packageId' => $packageId,
        ]);

        return new SubscriberProfileResponse($response);
    }

    /**
     * @return PackageDowngradeCancelResponse
     * @throws PaymentException
     */
    public function packageDowngradeCancel(): PackageDowngradeCancelResponse
    {
        $subscriberId = trim($this->getSubscriber()->getSubscriberId());
        $packageId = trim($this->getSubscriber()->getPackageId());

        if (empty($subscriberId) || empty($packageId)) {
            throw new \InvalidArgumentException('subscriberId or packageId is invalid');
        }

        $response = $this->post('subscription/package-downgrade-cancel', [
            'subscriberId' => $subscriberId,
            'packageId' => $packageId,
        ]);

        return new PackageDowngradeCancelResponse($response);
    }

    /**
     * @return Profile[]
     * @throws PaymentException
     */
    public function getPurchaseList()
    {
        $token = trim($this->getSubscriber()->getToken());

        if (empty($token) || !preg_match('#[A-z0-9]{86}#', $token)) {
            throw new \InvalidArgumentException('token is invalid');
        }

        $response = $this->get('purchase/list', [
            'token' => $token,
        ]);

        return (new PurchaseListResponse($response['result']))->getList();

    }

    /**
     * @return SubscriptionFreezeResponse
     * @throws PaymentException
     */
    public function freeze(): SubscriptionFreezeResponse
    {
        $subscriberId = trim($this->getFreeze()->getSubscriberId());
        $packageId = trim($this->getFreeze()->getPackageId());
        $endDate = trim($this->getFreeze()->getEndDate());

        if (empty($subscriberId) || empty($packageId)) {
            throw new \InvalidArgumentException('subscriberId or packageId or endDate is required.');
        }

        if(empty($endDate)){
            throw new \InvalidArgumentException('endDate is required.');
        }

        $checkDate = \DateTime::createFromFormat('Y-m-d H:i:s', $endDate);
        if ($checkDate === false) {
            throw new \InvalidArgumentException('endDate is invalid. Expected format: Y-m-d H:i:s');
        }

        $response = $this->post('subscription/freeze', [
            'subscriberId' => $subscriberId,
            'packageId' => $packageId,
            'endDate' => $endDate,
        ]);

        return new SubscriptionFreezeResponse($response);

    }

    /**
     * @return SubscriptionUnfreezeResponse
     * @throws PaymentException
     */
    public function unfreeze(): SubscriptionUnfreezeResponse
    {
        $subscriberId = trim($this->getUnfreeze()->getSubscriberId());
        $packageId = trim($this->getUnfreeze()->getPackageId());

        if (empty($subscriberId) || empty($packageId)) {
            throw new \InvalidArgumentException('subscriberId or packageId or endDate is required.');
        }

        $response = $this->post('subscription/unfreeze', [
            'subscriberId' => $subscriberId,
            'packageId' => $packageId
        ]);

        return new SubscriptionUnfreezeResponse($response);

    }




}