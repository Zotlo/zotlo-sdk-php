<?php

require_once __DIR__ . '/../vendor/autoload.php';
$config = require __DIR__ . '/config.php';

use Zotlo\Connect\Client;
use Zotlo\Connect\Entity\Constants;
use Zotlo\Connect\Entity\Credentials;
use Zotlo\Connect\Entity\Product;
use Zotlo\Connect\Entity\Redirect;
use Zotlo\Connect\Entity\Request;
use Zotlo\Connect\Entity\Subscriber;

$credentials = new Credentials();
$credentials
    ->setAccessKey($config->accessKey)
    ->setAccessSecurity($config->accessSecurity)
    ->setApplicationId($config->appId);

$product = new Product();
$product->setPackageId('web_premium');

$subcriber = new Subscriber();
$subcriber->setSubscriberId('33321D3');
$subcriber->setEmail('test@zotlo.com');
$subcriber->setPhoneNumber('+905555555555');
$subcriber->setCountry('US');
$subcriber->setLanguage('US');
$subcriber->setFirstName('Test');
$subcriber->setLastName('Test');

$request = new Request();
$request->setPlatform('web');
$request->setEndpoint($config->apiEndpoint);
$request->setLanguage('en');
$request->setSslVerify(false);
$request->setApiVersion(Constants::API_ACTIVE_VERSION_V2);

$redirect = new Redirect();
$redirect->setRedirectUrl('https://www.example.com');

$client = new Client($credentials);
$client->payment()->setSubscriber($subcriber);
$client->payment()->setRequest($request);
$client->payment()->setProduct($product);
$client->payment()->setRedirect($redirect);

try {
    $response = $client->payment()->saleWithCrypto();
    print_r($response);
    print_r($response->getFormUrl());

} catch (\Zotlo\Connect\Exception\PaymentException $exception) {
    echo $exception->getErrorCode() . PHP_EOL;
    echo $exception->getErrorMessage() . PHP_EOL;
    echo $exception->getHttpStatus() . PHP_EOL;
    print_r($exception->getMeta());
    print_r($exception->getResult());
    print_r($exception->getResult());
}