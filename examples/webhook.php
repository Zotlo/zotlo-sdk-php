<?php

use Zotlo\Connect\Services\Webhook;

require_once __DIR__ . '/../vendor/autoload.php';

/**
 * Webhook ile gelen data.
 *
 */
$data = json_decode(file_get_contents('php://input'), true);

/**
 * Webhook initialize edip data setlenir.
 *
 */
$webhook = new Webhook();
$webhook->setData($data);

try {
    $transactionInsertResponse = $webhook->getTransactionInsert(); // Transaction Insert için kullanılan method.
    $webhookType = $transactionInsertResponse->getType(); // Webhook tipini verir.
    $webhookEventType = $transactionInsertResponse->getEventType(); // webhook event tipini verir.
    $transaction = $transactionInsertResponse->getTransaction(); // Transaction'a ait bilgiler içerir.


//    $transactionRefundResponse = $webhook->getTransactionRefund(); // Transaction Refund için kullanılan method.
//    $transactionRefund = $transactionRefundResponse->getRefund(); // Transaction'a ait bilgiler içerir.


//    $subscriptionResponse = $webhook->getSubscription(); // Abonelik bilgileri için kullanılan method.
//    $profile = $subscriptionResponse->getProfile(); // Aboneye ait bilgileri içerir.
//    $package = $subscriptionResponse->getPackage(); // Aboneye ait paket bilgilerini içerir.
//    $newPackage = $subscriptionResponse->getNewPackage(); // Eğer paket değişikliği var ise yeni paket bilgilerini içerir.
//    $creditCard = $subscriptionResponse->getCard(); // Aboneye ait kredi kartı bilgilerini içerir.

    print_r($transactionInsertResponse);

} catch (\Exception $exception) {
    echo $exception->getMessage();
}