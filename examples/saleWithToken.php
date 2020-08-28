<?php

require_once __DIR__ . '/../vendor/autoload.php';
$config = require __DIR__ . '/config.php';

use Zotlo\Connect\Client;
use Zotlo\Connect\Entity\Credentials;
use Zotlo\Connect\Entity\CardToken;
use Zotlo\Connect\Entity\Product;
use Zotlo\Connect\Entity\Subscriber;
use Zotlo\Connect\Entity\Request;

$credentials = new Credentials();
$credentials->setAccessKey($config->accessKey)->setAccessSecurity($config->accessSecurity)->setApplicationId($config->appId);

$request = new Request();
$request->setPlatform('web');
$request->setEndpoint($config->apiEndpoint);
$request->setLanguage('en');
$request->setSslVerify(false);

$cardToken = new CardToken();
$cardToken->setToken('cWdVY3pyc3lCcmJwa2ZzZGszQkl4K2lheW1JL25Rbmc3bVJLcHpvczh1bGFra2MzRXV0bUtreWlhQWpIY2c9PQ==');

$product = new Product();
$product->setPackageId('web_zotlo_business_monthly1');

$subcriber = new Subscriber();
$subcriber->setSubscriberId('4433344');
$subcriber->setEmail('test@zotlo.com');
$subcriber->setPhoneNumber('+905555555555');
$subcriber->setCountry('TR');
$subcriber->setLanguage('TR');
$subcriber->setFirstName('Test');
$subcriber->setLastName('Test');
$subcriber->setIpAddress('192.168.1.1');

$client = new Client($credentials);
$client->payment()->setCardToken($cardToken);
$client->payment()->setSubscriber($subcriber);
$client->payment()->setRequest($request);
$client->payment()->setProduct($product);

try {
    $paymentResponse = $client->payment()->saleWithToken();

    if ($paymentResponse->getResponse()->isSuccess()) {
        echo 'success';
    } else {
        echo 'fail';
    }

    echo '<pre>';
    print_r($paymentResponse->getResponse());

} catch (\Zotlo\Connect\Exception\PaymentException $exception) {
    echo $exception->getErrorCode() . PHP_EOL;
    echo $exception->getErrorMessage() . PHP_EOL;
    echo $exception->getHttpStatus() . PHP_EOL;
    print_r($exception->getMeta());
    print_r($exception->getResult());
    print_r($exception->getResult());
}