<?php

require_once __DIR__ . '/../vendor/autoload.php';
$config = require __DIR__ . '/config.php';


use Zotlo\Connect\Client;
use Zotlo\Connect\Entity\Card;
use Zotlo\Connect\Entity\Credentials;
use Zotlo\Connect\Entity\Product;
use Zotlo\Connect\Entity\Request;
use Zotlo\Connect\Entity\Subscriber;
use Zotlo\Connect\Entity\Redirect;

$credentials = new Credentials();
$credentials->setAccessKey($config->accessKey)->setAccessSecurity($config->accessSecurity)->setApplicationId($config->appId);

$request = new Request();
$request->setPlatform('web');
$request->setEndpoint($config->apiEndpoint);
$request->setLanguage('en');
$request->setSslVerify(false);

$card = new Card();
$card->setCardNumber('4111111111111111');
$card->setcardHolderName("Test Test");
$card->setExpireMonth('12');
$card->setExpireYear('22');
$card->setCvv('000');

$product = new Product();
$product->setPackageId('web_premium');
$product->setDiscountPercent(0);

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

$redirect = new Redirect();
$redirect->setRedirectUrl('https://www.example.com');

$client = new Client($credentials);
$client->payment()->setForce3ds(false);
$client->payment()->setCard($card);
$client->payment()->setSubscriber($subcriber);
$client->payment()->setRequest($request);
$client->payment()->setProduct($product);
$client->payment()->setRedirect($redirect);

try {

    $paymentResponse = $client->payment()->saleWithCard();

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