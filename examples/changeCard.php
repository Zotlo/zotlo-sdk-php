<?php

require_once __DIR__ . '/../vendor/autoload.php';
$config = require __DIR__ . '/config.php';

use Zotlo\Connect\Client;
use Zotlo\Connect\Entity\Credentials;
use Zotlo\Connect\Entity\Card;
use Zotlo\Connect\Entity\Product;
use Zotlo\Connect\Entity\Subscriber;
use Zotlo\Connect\Entity\Request;

$credentials = new Credentials();
$credentials->setAccessKey($config->accessKey)->setAccessSecurity($config->accessSecurity)->setApplicationId($config->appId);


$card = new Card();
$card->setCardNumber('4111111111111111');
$card->setcardHolderName("Test Test");
$card->setExpireMonth('12');
$card->setExpireYear('20');
$card->setCvv('001');

$product = new Product();
$product->setPackageId('web_zotlo_exclusive_monthly1');

$subcriber = new Subscriber();
$subcriber->setSubscriberId('33321D3');
$subcriber->setEmail('test@zotlo.com');
$subcriber->setPhoneNumber('+905555555555');
$subcriber->setCountry('RU');
$subcriber->setLanguage('TR');
$subcriber->setFirstName('Test');
$subcriber->setLastName('Test');
$subcriber->setIpAddress('192.168.1.1');

$request = new Request();
$request->setPlatform('web');
$request->setEndpoint($config->apiEndpoint);
$request->setLanguage('en');
$request->setSslVerify(false);


$client = new Client($credentials);
$client->payment()->setCard($card);
$client->payment()->setSubscriber($subcriber);
$client->payment()->setRequest($request);
$client->payment()->setProduct($product);

try {

    $paymentResponse = $client->payment()->saveCard();

    if ($paymentResponse->getResponse()->isSuccess()) {
        echo 'success';
    } else {
        echo 'fail';
    }

    if ($paymentResponse->getPaymentStatus() == 'REDIRECT') {
        header('Location:' . $paymentResponse->getRedirect());
    } else {
        print_r($paymentResponse);
        echo 'complete';
    }

} catch (\Zotlo\Connect\Exception\PaymentException $exception) {
    echo $exception->getErrorCode() . PHP_EOL;
    echo $exception->getErrorMessage() . PHP_EOL;
    echo $exception->getHttpStatus() . PHP_EOL;
    print_r($exception->getMeta());
    print_r($exception->getResult());
}