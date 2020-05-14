<?php

namespace Zotlo\Connect\Response;

use Zotlo\Connect\Entity\Sale3D\Payment;
use Zotlo\Connect\Entity\Sale3D\Redirect;
use Zotlo\Connect\Entity\Sale3D\Subscriber;

class Sale3DResponse
{

    /**
     * @var array
     */

    private $meta = [];

    /**
     * @var Subscriber
     */
    private $subscriber = null;

    /**
     * @var Payment
     */
    private $payment = null;

    /**
     * @var Redirect
     */
    private $redirect = null;

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
    private function setSubscriber(Subscriber $subscriber)
    {
        $this->subscriber = $subscriber;
    }

    /**
     * @return Payment
     */
    public function getPayment(): Payment
    {
        return $this->payment;
    }

    /**
     * @param Payment $payment
     */
    private function setPayment(Payment $payment)
    {
        $this->payment = $payment;
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
    private function setRedirect(Redirect $redirect)
    {
        $this->redirect = $redirect;
    }

    /**
     * @return array
     */
    public function getMeta()
    {
        return $this->meta;
    }

    /**
     * @param array $meta
     */
    private function setMeta( $meta)
    {
        $this->meta = $meta;
    }


    public function __construct($response)
    {
        $this->setMeta($response['meta']);
        $this->setSubscriber(new Subscriber($response['result']['payment']['subscriber']));
        $this->setPayment(new Payment($response['result']['payment']['payment']));
        $this->setRedirect(new Redirect($response['result']['redirect']));

    }
}