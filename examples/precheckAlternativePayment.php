<?php

require_once __DIR__ . '/../vendor/autoload.php';
$config = require __DIR__ . '/config.php';

use Zotlo\Connect\Client;
use Zotlo\Connect\Entity\Credentials;
use Zotlo\Connect\Entity\Request;

$credentials = new Credentials();
$credentials->setAccessKey($config->accessKey)->setAccessSecurity($config->accessSecurity)->setApplicationId($config->appId);


$entity = new \Zotlo\Connect\Entity\PreCheckAlternativePayment();
$entity->setPackageId('package');
$entity->setSubscriberPhoneNumber('+905555555555');
$entity->setProviderId(1);

$request = new Request();
$request->setPlatform('web');
$request->setApiVersion('v2');
$request->setEndpoint($config->apiEndpoint);
$request->setLanguage('en');
$request->setSslVerify(false);


$client = new Client($credentials);

$client->payment()->setPreCheckAlternativePaymentEntity($entity);
$client->payment()->setRequest($request);

try {
    $response = $client->payment()->preCheckAlternativePayment();
    print_r($response);

} catch (\Zotlo\Connect\Exception\PaymentException $exception) {
    echo $exception->getErrorCode() . PHP_EOL;
    echo $exception->getErrorMessage() . PHP_EOL;
    echo $exception->getHttpStatus() . PHP_EOL;
    print_r($exception->getMeta());
    print_r($exception->getResult());
}