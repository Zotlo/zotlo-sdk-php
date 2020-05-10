<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Zotlo\Connect\Client;
use Zotlo\Connect\Entity\Credentials;
use Zotlo\Connect\Entity\Request;

$credentials = new Credentials();
$credentials->setAccessKey("1")->setAccessSecurity("1")->setApplicationId('2');

$subscriberCancellation = new \Zotlo\Connect\Entity\SubscriberCancellation();
$subscriberCancellation->setSubscriberId('sadsfsdf');
$subscriberCancellation->setReason('Reason');
$subscriberCancellation->setForce(false);

$request = new Request();
$request->setPlatform('web');
$request->setEndpoint('https://api.zotlo.com/');

$client = new Client($credentials);
$client->subscription()->setCancellation($subscriberCancellation);
$client->subscription()->setRequest($request);

try {
    $response = $client->subscription()->cancellation();
    print_r($response);

} catch (\Zotlo\Connect\Exception\PaymentException $exception) {
    echo $exception->getErrorCode() . PHP_EOL;
    echo $exception->getErrorMessage() . PHP_EOL;
    echo $exception->getHttpStatus() . PHP_EOL;
    print_r($exception->getMeta());
    print_r($exception->getResult());
    print_r($exception->getResult());
}