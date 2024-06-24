<?php

namespace Zotlo\Connect\Entity;

class WebhookConstant
{
    /**
     *
     */
    const WEBHOOK_EVENT_TYPE_NEW_SUBSCRIBER = 'newSubscriber';
    /**
     *
     */
    const WEBHOOK_EVENT_TYPE_CANCEL = 'cancel';
    /**
     *
     */
    const WEBHOOK_EVENT_TYPE_REACTIVATE = 'reactivate';
    /**
     *
     */
    const WEBHOOK_EVENT_TYPE_ACTIVE_TO_GRACE = 'activeToGrace';
    /**
     *
     */
    const WEBHOOK_EVENT_TYPE_GRACE_TO_ACTIVE = 'graceToActive';
    /**
     *
     */
    const WEBHOOK_EVENT_TYPE_PACKAGE_UPGRADE = 'packageUpgrade';
    /**
     *
     */
    const WEBHOOK_EVENT_TYPE_PACKAGE_DOWNGRADE = 'packageDowngrade';
    /**
     *
     */
    const WEBHOOK_EVENT_TYPE_TRANSACTION = 'transaction';
    /**
     * asdasd
     */
    const WEBHOOK_EVENT_TYPE_RENEWAL = 'renewal';
    /**
     *
     */
    const WEBHOOK_EVENT_TYPE_REFUND = 'refund';

    /**
     *
     */
    const WEBHOOK_EVENT_TYPE_GRACE_TO_PASSIVE = 'graceToPassive';

    /**
     *
     */
    const WEBHOOK_EVENT_TYPE_PACKAGE_CLOSED = 'packageClosed';
    /**
     *
     */
    const WEBHOOK_EVENT_TYPE_CHANGE_PACKAGE = 'changePackage';

}