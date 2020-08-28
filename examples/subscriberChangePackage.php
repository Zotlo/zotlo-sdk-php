<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Zotlo\Connect\Client;
use Zotlo\Connect\Entity\Card;
use Zotlo\Connect\Entity\Credentials;
use Zotlo\Connect\Entity\Request;
use Zotlo\Connect\Entity\Subscriber;

$config = require __DIR__ . '/config.php';


$credentials = new Credentials();
$credentials->setAccessKey($config->accessKey)->setAccessSecurity($config->accessSecurity)->setApplicationId($config->appId);

$card = new Card();
$card->setCardNumber('4111111111111111');
$card->setcardHolderName("Test Test");
$card->setExpireMonth('12');
$card->setExpireYear('20');
$card->setCvv('001');

$subcriber = new Subscriber();
$subcriber->setSubscriberId('905555550002');
$subcriber->setLanguage('TR');
$subcriber->setIpAddress('192.168.1.1');
$subcriber->setPackageId('web_zotlo_premium_professional');

$request = new Request();
$request->setPlatform('web');
$request->setEndpoint($config->apiEndpoint);
$request->setLanguage('en');
$request->setSslVerify(false);


$changePackage = new \Zotlo\Connect\Entity\ChangePackage();
$changePackage->setNewPackageId('web_zotlo_exclusive_monthly1');
$changePackage->setChangeType('downgrade');

$client = new Client($credentials);
$client->payment()->setCard($card);
$client->payment()->setSubscriber($subcriber);
$client->payment()->setRequest($request);
$client->payment()->setChangePackage($changePackage);

try {

    $paymentResponse = $client->payment()->changeSubscriberPackage();

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
}catch (\Exception $exception) {
    echo $exception->getCode() . PHP_EOL;
    echo $exception->getMessage() . PHP_EOL;
    echo $exception->getTraceAsString() . PHP_EOL;
}