<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Zotlo\Connect\Client;
use Zotlo\Connect\Entity\Card;
use Zotlo\Connect\Entity\Credentials;
use Zotlo\Connect\Entity\Product;
use Zotlo\Connect\Entity\Request;
use Zotlo\Connect\Entity\Subscriber;

$credentials = new Credentials();
$credentials->setAccessKey("1")->setAccessSecurity("1")->setApplicationId('2');

$card = new Card();
$card->setCardNumber('4111111111111111');
$card->setcardHolderName("Test Test");
$card->setExpireMonth('12');
$card->setExpireYear('20');
$card->setCvv('001');

$product = new Product();
$product->setPackageId('test');
$product->setDiscountPercent(0);

$subcriber = new Subscriber();
$subcriber->setSubscriberId('11113');
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



$request = new Request();
$request->setPlatform('web');
$request->setEndpoint('https:/app.zotlo.com//');
$request->setLanguage('en');


$client = new Client($credentials);
$client->payment()->setForce3ds(true);
$client->payment()->setCard($card);
$client->payment()->setSubscriber($subcriber);
$client->payment()->setRequest($request);
$client->payment()->setProduct($product);

try {

    $paymentResponse = $client->payment()->saleWithCard();

    print_r($paymentResponse);
    die('d');

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