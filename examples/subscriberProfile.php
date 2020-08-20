<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Zotlo\Connect\Client;
use Zotlo\Connect\Entity\Credentials;
use Zotlo\Connect\Entity\Request;

$credentials = new Credentials();
$credentials->setAccessKey("0ba673ed73fc17c9f739a2ba4daaf6afec95816b94f7d9fd4e")->setAccessSecurity("b1c8202410a10479134710dd8c06f8a248e68723ea898688817ef86dd1d9d85f5db5b0e68c3dc6c4")->setApplicationId('2');

$subscriber = new \Zotlo\Connect\Entity\Subscriber();
$subscriber->setSubscriberId('905389837455');

$request = new Request();
$request->setPlatform('web');
$request->setEndpoint('https://api-zotlo.mobylonia.com/');
$request->setLanguage('en');


$client = new Client($credentials);
$client->subscription()->setSubscriber($subscriber);
$client->subscription()->setRequest($request);

try {
    $response = $client->subscription()->profile();
    print_r($response->getProfile());

} catch (\Zotlo\Connect\Exception\PaymentException $exception) {
    echo $exception->getErrorCode() . PHP_EOL;
    echo $exception->getErrorMessage() . PHP_EOL;
    echo $exception->getHttpStatus() . PHP_EOL;
    print_r($exception->getMeta());
    print_r($exception->getResult());
    print_r($exception->getResult());
}