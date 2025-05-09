<?php

require_once __DIR__ . '/../vendor/autoload.php';
$config = require __DIR__ . '/config.php';


use Zotlo\Connect\Client;
use Zotlo\Connect\Entity\Credentials;
use Zotlo\Connect\Entity\Request;

$credentials = new Credentials();
$credentials->setAccessKey($config->accessKey)->setAccessSecurity($config->accessSecurity)->setApplicationId($config->appId);

$subscriberUnfreeze = new \Zotlo\Connect\Entity\SubscriberUnfreeze();
$subscriberUnfreeze->setSubscriberId('33321D3');
$subscriberUnfreeze->setPackageId("web_zotlo_premium");

$request = new Request();
$request->setPlatform('web');
$request->setEndpoint($config->apiEndpoint);
$request->setLanguage('en');
$request->setSslVerify(false);

$client = new Client($credentials);
$client->subscription()->setUnfreeze($subscriberUnfreeze);
$client->subscription()->setRequest($request);

try {
    $response = $client->subscription()->unfreeze();
    print_r($response);

} catch (\Zotlo\Connect\Exception\PaymentException $exception) {
    echo $exception->getErrorCode() . PHP_EOL;
    echo $exception->getErrorMessage() . PHP_EOL;
    echo $exception->getHttpStatus() . PHP_EOL;
    print_r($exception->getMeta());
    print_r($exception->getResult());
    print_r($exception->getResult());
}