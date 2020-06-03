<?php
/**
 * It's very easy to manage your subscriptions with Zotlo! Create your account now on zotlo.com, add your subscription packages and enable users to subscribe to your apps using a credit card.dd
 *
 * Docs : https://docs.zotlo.com/
 */

require_once __DIR__ . '/../vendor/autoload.php';

use Zotlo\Connect\Client;
use Zotlo\Connect\Entity\Credentials;
use Zotlo\Connect\Entity\Request;

$credentials = new Credentials();
$credentials->setAccessKey("1")->setAccessSecurity("1")->setApplicationId('2');


$request = new Request();
$request->setPlatform('web');
$request->setEndpoint('http://api.zotlo.localhost/');
$request->setLanguage('en');


$subscriber = new \Zotlo\Connect\Entity\Subscriber();
$subscriber->setSubscriberId('9053898374531');

$package = new \Zotlo\Connect\Entity\Product();
$package->setPackageId('upgrate');

$client = new Client($credentials);
$client->subscription()->setSubscriber($subscriber);
$client->subscription()->setProduct($package);
$client->subscription()->setRequest($request);

try {
    $response = $client->subscription()->packageDowngradeCancel();
    print_r($response);

} catch (\Zotlo\Connect\Exception\PaymentException $exception) {
    echo $exception->getErrorCode() . PHP_EOL;
    echo $exception->getErrorMessage() . PHP_EOL;
    echo $exception->getHttpStatus() . PHP_EOL;
    print_r($exception->getMeta());
    print_r($exception->getResult());
    print_r($exception->getResult());
}