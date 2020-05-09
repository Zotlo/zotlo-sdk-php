<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Zotlo\Connect\Client;
use Zotlo\Connect\Entity\Credentials;
use Zotlo\Connect\Entity\Request;
use Zotlo\Connect\Entity\Refund;

$credentials = new Credentials();
$credentials->setAccessKey("1")->setAccessSecurity("1")->setApplicationId('2');

$request = new Request();
$request->setPlatform('web');
$request->setEndpoint('http://api.zotlo.localhost/');

$refund = new Refund();
$refund->setTransactionId('f564d351-c6d4-4092-b8a3-1d0efab0e446');
$refund->setReason('Test');

$client = new Client($credentials);
$client->payment()->setRequest($request);
$client->payment()->setRefund($refund);

try {
    $paymentResponse = $client->payment()->refund();
    print_r($paymentResponse);

} catch (\Zotlo\Connect\Exception\PaymentException $exception) {
    echo $exception->getErrorCode() . PHP_EOL;
    echo $exception->getErrorMessage() . PHP_EOL;
    echo $exception->getHttpStatus() . PHP_EOL;
    print_r($exception->getMeta());
    print_r($exception->getResult());
    print_r($exception->getResult());
}