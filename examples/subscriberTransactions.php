<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Zotlo\Connect\Client;
use Zotlo\Connect\Entity\Credentials;
use Zotlo\Connect\Entity\Request;

$credentials = new Credentials();
$credentials->setAccessKey("1")->setAccessSecurity("1")->setApplicationId('2');

$transaction = new \Zotlo\Connect\Entity\Transaction();
$transaction->setSubscriberId('test');
$transaction->setStartDate('');
$transaction->setEndDate('');
$transaction->setPackageId('');
$transaction->setPaymentType('');

$request = new Request();
$request->setPlatform('web');
$request->setEndpoint('https://api.zotlo.com/');
$request->setLanguage('en');


$client = new Client($credentials);
$client->transaction()->setTransaction($transaction);
$client->transaction()->setRequest($request);

try {
    $response = $client->transaction()->transactionList();
    print_r($response);

} catch (\Zotlo\Connect\Exception\PaymentException $exception) {
    echo $exception->getErrorCode() . PHP_EOL;
    echo $exception->getErrorMessage() . PHP_EOL;
    echo $exception->getHttpStatus() . PHP_EOL;
    print_r($exception->getMeta());
    print_r($exception->getResult());
    print_r($exception->getResult());
}