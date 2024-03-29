<?php

require_once __DIR__ . '/../vendor/autoload.php';
$config = require __DIR__ . '/config.php';


use Zotlo\Connect\Client;
use Zotlo\Connect\Entity\Credentials;
use Zotlo\Connect\Entity\Refund;
use Zotlo\Connect\Entity\Request;

$credentials = new Credentials();
$credentials->setAccessKey($config->accessKey)->setAccessSecurity($config->accessSecurity)->setApplicationId($config->appId);

$request = new Request();
$request->setPlatform('web');
$request->setEndpoint($config->apiEndpoint);
$request->setLanguage('en');
$request->setSslVerify(false);

$refund = new Refund();
$refund->setTransactionId('bb37c2b8-4723-4ccd-84e6-c679e5618a55');
$refund->setReason('Test');
$refund->setUser('User1');

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