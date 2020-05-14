<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Zotlo\Connect\Client;
use Zotlo\Connect\Entity\Credentials;
use Zotlo\Connect\Entity\Card;
use Zotlo\Connect\Entity\Subscriber;
use Zotlo\Connect\Entity\Request;

$credentials = new Credentials();
$credentials->setAccessKey("1")->setAccessSecurity("1")->setApplicationId('2');

$card = new Card();
$card->setCardNumber('4444333322221111');
$card->setcardHolderName("Test Test");
$card->setExpireMonth('12');
$card->setExpireYear('23');
$card->setCvv('001');


$subcriber = new Subscriber();
$subcriber->setSubscriberId('deneme-123343332332233333323333333323');
$subcriber->setEmail('test@zotlo.com');
$subcriber->setPhoneNumber('+905555555555');
$subcriber->setCountry('TR');
$subcriber->setLanguage('TR');
$subcriber->setFirstName('Test');
$subcriber->setLastName('Test');
$subcriber->setIpAddress('192.168.1.1');

$request = new Request();
$request->setPlatform('web');
$request->setEndpoint('http://api.zotlo.localhost/');

$client = new Client($credentials);
$client->payment()->setCard($card);
$client->payment()->setSubscriber($subcriber);
$client->payment()->setRequest($request);

try {

    $paymentResponse = $client->payment()->changeCard();

    if ($paymentResponse->getResponse()->isSuccess()) {
        echo 'success';
    } else {
        echo 'fail';
    }

    print_r($paymentResponse);

} catch (\Zotlo\Connect\Exception\PaymentException $exception) {
    echo $exception->getErrorCode() . PHP_EOL;
    echo $exception->getErrorMessage() . PHP_EOL;
    echo $exception->getHttpStatus() . PHP_EOL;
    print_r($exception->getMeta());
    print_r($exception->getResult());
}