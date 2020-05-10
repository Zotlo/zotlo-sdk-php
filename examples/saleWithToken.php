<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Zotlo\Connect\Client;
use Zotlo\Connect\Entity\Credentials;
use Zotlo\Connect\Entity\CardToken;
use Zotlo\Connect\Entity\Product;
use Zotlo\Connect\Entity\Subscriber;
use Zotlo\Connect\Entity\Request;

$credentials = new Credentials();
$credentials->setAccessKey("1")->setAccessSecurity("1")->setApplicationId('2');

$cardToken = new CardToken();
$cardToken->setToken('YlpjcFhtQ2M0a0ljNGFhbzZZeVlSaWthQzlqRkRCaDUvVllwbVlTUHdNZC84ZVh0UjJwUkxINXp4QnYxOFNsZmExbUM5WEU9');

$product = new Product();
$product->setPackageId('zotlo.single');

$subcriber = new Subscriber();
$subcriber->setSubscriberId('test');
$subcriber->setEmail('test@zotlo.com');
$subcriber->setPhoneNumber('+905555555555');
$subcriber->setCountry('TR');
$subcriber->setLanguage('TR');
$subcriber->setFirstName('Test');
$subcriber->setLastName('Test');
$subcriber->setIpAddress('192.168.1.1');

$request = new Request();
$request->setPlatform('web');
$request->setEndpoint('https://api.zotlo.com/');

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