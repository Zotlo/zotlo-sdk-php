<?php

namespace Zotlo\Connect\Response;

class TransactionResponse
{
    private int $id;

    private ?string $payment_type;

    private ?string $original_transaction_id;

    private ?string $transaction_id;

    private ?string $package_id;

    private int $team_id;

    private int $app_id;

    private ?string $status;

    private ?string $create_date;

    private ?string $purchase_date;

    private ?string $original_purchase_date;

    private float|int $price;

    private ?string $currency;

    private ?string $country;

    private ?string $expire_date;

    private ?string $subscriber_id;

    private ?string $credit_card;

    private ?string $refund_price;

    private ?string $refund_date;

    private ?string $refund_reason;

    private ?string $is_refund;

    private int $provider_id;

    private ?string $provider_transaction_id;

    private ?string $provider_status;

    private ?string $provider_name;

    private ?string $comment;

    private int $quantity;

    private int|float $package_price;

    private ?string $subscription_id;

    private ?string $is_transfer;

    private ?array $custom_parameters;

    private ?string $paymentMethod;

    private ?int $installment;

    private ?array $exchange;

    private ?array $coupon_campaign;

    private ?string $language;

    public function __construct($data)
    {
        $this->id = $data['id'] ?? null;
        $this->payment_type = $data['payment_type'] ?? null;
        $this->original_transaction_id = $data['original_transaction_id'] ?? null;
        $this->transaction_id = $data['transaction_id'] ?? null;
        $this->package_id = $data['package_id'] ?? null;
        $this->team_id = $data['team_id'] ?? null;
        $this->app_id = $data['app_id'] ?? null;
        $this->status = $data['status'] ?? null;
        $this->create_date = $data['create_date'] ?? null;
        $this->purchase_date = $data['purchase_date'] ?? null;
        $this->original_purchase_date = $data['original_purchase_date'] ?? null;
        $this->price = $data['price'] ?? null;
        $this->currency = $data['currency'] ?? null;
        $this->country = $data['country'] ?? null;
        $this->expire_date = $data['expire_date'] ?? null;
        $this->subscriber_id = $data['subscriber_id'] ?? null;
        $this->credit_card = $data['credit_card'] ?? null;
        $this->refund_price = $data['refund_price'] ?? null;
        $this->refund_date = $data['refund_date'] ?? null;
        $this->refund_reason = $data['refund_reason'] ?? null;
        $this->is_refund = $data['is_refund'] ?? null;
        $this->provider_id = $data['provider_id'] ?? null;
        $this->provider_transaction_id = $data['provider_transaction_id'] ?? null;
        $this->provider_status = $data['provider_status'] ?? null;
        $this->provider_name = $data['provider_name'] ?? null;
        $this->comment = $data['comment'] ?? null;
        $this->quantity = $data['quantity'] ?? null;
        $this->package_price = $data['package_price'] ?? null;
        $this->subscription_id = $data['subscription_id'] ?? null;
        $this->is_transfer = $data['is_transfer'] ?? null;
        $this->custom_parameters = $data['custom_parameters'] ?? null;
        $this->paymentMethod = $data['paymentMethod'] ?? null;
        $this->installment = $data['installment'] ?? null;
        $this->exchange = $data['exchange'] ?? null;
        $this->coupon_campaign = $data['coupon_campaign'] ?? null;
        $this->language = $data['language'] ?? null;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getPaymentType(): ?string
    {
        return $this->payment_type;
    }

    /**
     * @param string|null $payment_type
     */
    public function setPaymentType(?string $payment_type): void
    {
        $this->payment_type = $payment_type;
    }

    /**
     * @return string|null
     */
    public function getOriginalTransactionId(): ?string
    {
        return $this->original_transaction_id;
    }

    /**
     * @param string|null $original_transaction_id
     */
    public function setOriginalTransactionId(?string $original_transaction_id): void
    {
        $this->original_transaction_id = $original_transaction_id;
    }

    /**
     * @return string|null
     */
    public function getTransactionId(): ?string
    {
        return $this->transaction_id;
    }

    /**
     * @param string|null $transaction_id
     */
    public function setTransactionId(?string $transaction_id): void
    {
        $this->transaction_id = $transaction_id;
    }

    /**
     * @return string|null
     */
    public function getPackageId(): ?string
    {
        return $this->package_id;
    }

    /**
     * @param string|null $package_id
     */
    public function setPackageId(?string $package_id): void
    {
        $this->package_id = $package_id;
    }

    /**
     * @return int
     */
    public function getTeamId(): int
    {
        return $this->team_id;
    }

    /**
     * @param int $team_id
     */
    public function setTeamId(int $team_id): void
    {
        $this->team_id = $team_id;
    }

    /**
     * @return int
     */
    public function getAppId(): int
    {
        return $this->app_id;
    }

    /**
     * @param int $app_id
     */
    public function setAppId(int $app_id): void
    {
        $this->app_id = $app_id;
    }

    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param string|null $status
     */
    public function setStatus(?string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return string|null
     */
    public function getCreateDate(): ?string
    {
        return $this->create_date;
    }

    /**
     * @param string|null $create_date
     */
    public function setCreateDate(?string $create_date): void
    {
        $this->create_date = $create_date;
    }

    /**
     * @return string|null
     */
    public function getPurchaseDate(): ?string
    {
        return $this->purchase_date;
    }

    /**
     * @param string|null $purchase_date
     */
    public function setPurchaseDate(?string $purchase_date): void
    {
        $this->purchase_date = $purchase_date;
    }

    /**
     * @return string|null
     */
    public function getOriginalPurchaseDate(): ?string
    {
        return $this->original_purchase_date;
    }

    /**
     * @param string|null $original_purchase_date
     */
    public function setOriginalPurchaseDate(?string $original_purchase_date): void
    {
        $this->original_purchase_date = $original_purchase_date;
    }

    /**
     * @return float|int
     */
    public function getPrice(): float|int
    {
        return $this->price;
    }

    /**
     * @param float|int $price
     */
    public function setPrice(float|int $price): void
    {
        $this->price = $price;
    }

    /**
     * @return string|null
     */
    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    /**
     * @param string|null $currency
     */
    public function setCurrency(?string $currency): void
    {
        $this->currency = $currency;
    }

    /**
     * @return string|null
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * @param string|null $country
     */
    public function setCountry(?string $country): void
    {
        $this->country = $country;
    }

    /**
     * @return|null string
     */
    public function getExpireDate(): ?string
    {
        return $this->expire_date;
    }

    /**
     * @param string|null $expire_date
     */
    public function setExpireDate(?string $expire_date): void
    {
        $this->expire_date = $expire_date;
    }

    /**
     * @return string|null
     */
    public function getSubscriberId(): ?string
    {
        return $this->subscriber_id;
    }

    /**
     * @param string|null $subscriber_id
     */
    public function setSubscriberId(?string $subscriber_id): void
    {
        $this->subscriber_id = $subscriber_id;
    }

    /**
     * @return string|null
     */
    public function getCreditCard(): ?string
    {
        return $this->credit_card;
    }

    /**
     * @param string|null $credit_card
     */
    public function setCreditCard(?string $credit_card): void
    {
        $this->credit_card = $credit_card;
    }

    /**
     * @return string|null
     */
    public function getRefundPrice(): ?string
    {
        return $this->refund_price;
    }

    /**
     * @param string|null $refund_price
     */
    public function setRefundPrice(?string $refund_price): void
    {
        $this->refund_price = $refund_price;
    }

    /**
     * @return string|null
     */
    public function getRefundDate(): ?string
    {
        return $this->refund_date;
    }

    /**
     * @param string|null $refund_date
     */
    public function setRefundDate(?string $refund_date): void
    {
        $this->refund_date = $refund_date;
    }

    /**
     * @return string|null
     */
    public function getRefundReason(): ?string
    {
        return $this->refund_reason;
    }

    /**
     * @param string|null $refund_reason
     */
    public function setRefundReason(?string $refund_reason): void
    {
        $this->refund_reason = $refund_reason;
    }

    /**
     * @return string|null
     */
    public function getIsRefund(): ?string
    {
        return $this->is_refund;
    }

    /**
     * @param string|null $is_refund
     */
    public function setIsRefund(?string $is_refund): void
    {
        $this->is_refund = $is_refund;
    }

    /**
     * @return int
     */
    public function getProviderId(): int
    {
        return $this->provider_id;
    }

    /**
     * @param int $provider_id
     */
    public function setProviderId(int $provider_id): void
    {
        $this->provider_id = $provider_id;
    }

    /**
     * @return string|null
     */
    public function getProviderTransactionId(): ?string
    {
        return $this->provider_transaction_id;
    }

    /**
     * @param string|null $provider_transaction_id
     */
    public function setProviderTransactionId(?string $provider_transaction_id): void
    {
        $this->provider_transaction_id = $provider_transaction_id;
    }

    /**
     * @return string|null
     */
    public function getProviderStatus(): ?string
    {
        return $this->provider_status;
    }

    /**
     * @param string|null $provider_status
     */
    public function setProviderStatus(?string $provider_status): void
    {
        $this->provider_status = $provider_status;
    }

    /**
     * @return string|null
     */
    public function getProviderName(): ?string
    {
        return $this->provider_name;
    }

    /**
     * @param string|null $provider_name
     */
    public function setProviderName(?string $provider_name): void
    {
        $this->provider_name = $provider_name;
    }

    /**
     * @return string|null
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * @param string|null $comment
     */
    public function setComment(?string $comment): void
    {
        $this->comment = $comment;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @return float|int
     */
    public function getPackagePrice(): float|int
    {
        return $this->package_price;
    }

    /**
     * @param float|int $package_price
     */
    public function setPackagePrice(float|int $package_price): void
    {
        $this->package_price = $package_price;
    }

    /**
     * @return string|null
     */
    public function getSubscriptionId(): ?string
    {
        return $this->subscription_id;
    }

    /**
     * @param string|null $subscription_id
     */
    public function setSubscriptionId(?string $subscription_id): void
    {
        $this->subscription_id = $subscription_id;
    }

    /**
     * @return string|null
     */
    public function getIsTransfer(): ?string
    {
        return $this->is_transfer;
    }

    /**
     * @param string|null $is_transfer
     */
    public function setIsTransfer(?string $is_transfer): void
    {
        $this->is_transfer = $is_transfer;
    }

    /**
     * @return array|null
     */
    public function getCustomParameters(): ?array
    {
        return $this->custom_parameters;
    }

    /**
     * @param array|null $custom_parameters
     */
    public function setCustomParameters(?array $custom_parameters): void
    {
        $this->custom_parameters = $custom_parameters;
    }

    /**
     * @return string|null
     */
    public function getPaymentMethod(): ?string
    {
        return $this->paymentMethod;
    }

    /**
     * @param string|null $paymentMethod
     */
    public function setPaymentMethod(?string $paymentMethod): void
    {
        $this->paymentMethod = $paymentMethod;
    }

    /**
     * @return int|null
     */
    public function getInstallment(): ?int
    {
        return $this->installment;
    }

    /**
     * @param int|null $installment
     */
    public function setInstallment(?int $installment): void
    {
        $this->installment = $installment;
    }

    /**
     * @return array|null
     */
    public function getExchange(): ?array
    {
        return $this->exchange;
    }

    /**
     * @param array|null $exchange
     */
    public function setExchange(?array $exchange): void
    {
        $this->exchange = $exchange;
    }

    /**
     * @return array|null
     */
    public function getCouponCampaign(): ?array
    {
        return $this->coupon_campaign;
    }

    /**
     * @param array|null $coupon_campaign
     */
    public function setCouponCampaign(?array $coupon_campaign): void
    {
        $this->coupon_campaign = $coupon_campaign;
    }

    /**
     * @return string|null
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }

    /**
     * @param string|null $language
     */
    public function setLanguage(?string $language): void
    {
        $this->language = $language;
    }

}