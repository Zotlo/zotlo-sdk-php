<?php

use Zotlo\Connect\Client;
use Zotlo\Connect\Entity\Credentials;
use Zotlo\Connect\Entity\Request;
use Zotlo\Connect\Entity\Subscriber;

require_once __DIR__ . '/../vendor/autoload.php';
$config = require __DIR__ . '/config.php';

$credentials = new Credentials();
$credentials->setAccessKey($config->accessKey)->setAccessSecurity($config->accessSecurity)->setApplicationId($config->appId);

$request = new Request();
$request->setPlatform('web');
$request->setEndpoint($config->apiEndpoint);
$request->setLanguage('en');
$request->setSslVerify(false);

$cardToken = new \Zotlo\Connect\Entity\CardToken();
$cardToken->setToken("YOUR_CARD_TOKEN");

$subcriber = new Subscriber();
$subcriber->setSubscriberId('4433344');
$subcriber->setEmail('test@zotlo.com');
$subcriber->setPhoneNumber('+905555555555');
$subcriber->setCountry('TR');
$subcriber->setLanguage('TR');
$subcriber->setFirstName('Test');
$subcriber->setLastName('Test');
$subcriber->setIpAddress('192.168.1.1');
$subcriber->setCustomParams([
    'source' => 'facebook',
]);

$client = new Client($credentials);
$client->subscription->setSubscriber($subcriber);

try {
    $saveCardResponse = $client->subscription->removeCard($cardToken);

    // $saveCardResponse->getResult();
    // if the catch is not thrown, the operation is successful.
}catch (\Zotlo\Connect\Exception\PaymentException $exception){
    echo $exception->getErrorCode() . PHP_EOL;
    echo $exception->getErrorMessage() . PHP_EOL;
    echo $exception->getHttpStatus() . PHP_EOL;
    print_r($exception->getMeta());
    print_r($exception->getResult());
}
