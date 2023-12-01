<?php

require_once __DIR__ . '/../vendor/autoload.php';
$config = require __DIR__ . '/config.php';

use Zotlo\Connect\Client;
use Zotlo\Connect\Entity\Card;
use Zotlo\Connect\Entity\Constants;
use Zotlo\Connect\Entity\Credentials;
use Zotlo\Connect\Entity\Request;

$credentials = new Credentials();
$credentials->setAccessKey($config->accessKey)->setAccessSecurity($config->accessSecurity)->setApplicationId($config->appId);

$card = new Card();
$card->setCardNumber('4111111111111111');
$card->setcardHolderName("Test Test");
$card->setExpireMonth('12');
$card->setExpireYear('20');
$card->setCvv('001');

$request = new Request();
$request->setPlatform('web');
$request->setEndpoint($config->apiEndpoint);
$request->setApiVersion(Constants::API_ACTIVE_VERSION_V2);
$request->setLanguage('en');
$request->setSslVerify(false);

$client = new Client($credentials);
$client->information->setCard($card);
$client->information->setRequest($request);

try {
    $binCountryResponse = $client->information->binCountry();

    // you can use this methods.
    // $binCountryResponse->getMeta();
    // $binCountryResponse->getResult();
} catch (\Zotlo\Connect\Exception\PaymentException $exception) {
    echo $exception->getErrorCode() . PHP_EOL;
    echo $exception->getErrorMessage() . PHP_EOL;
    echo $exception->getHttpStatus() . PHP_EOL;
    print_r($exception->getMeta());
    print_r($exception->getResult());
}