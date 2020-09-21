<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Zotlo\Connect\Client;
use Zotlo\Connect\Entity\Credentials;
use Zotlo\Connect\Entity\Form;
use Zotlo\Connect\Entity\Request;
use Zotlo\Connect\Entity\Subscriber;

$config = require __DIR__ . '/config.php';


$credentials = new Credentials();
$credentials->setAccessKey($config->accessKey)->setAccessSecurity($config->accessSecurity)->setApplicationId($config->appId);

$form = new Form();
$form->setFormId('payment-form');

$subcriber = new Subscriber();
$subcriber->setSubscriberId('905555550024');
$subcriber->setLanguage('TR');
$subcriber->setIpAddress('192.168.1.1');
$subcriber->setPackageId('web_zotlo_premium');
$subcriber->setCustomParams([
    'source' => 'facebook',
]);

$request = new Request();
$request->setPlatform('web');
$request->setEndpoint($config->apiEndpoint);
$request->setLanguage('en');
$request->setSslVerify(false);


$changePackage = new \Zotlo\Connect\Entity\ChangePackage();
$changePackage->setNewPackageId('web_zotlo_business');
$changePackage->setChangeType('upgrade');

$client = new Client($credentials);
$client->payment()->setForm($form);
$client->payment()->setSubscriber($subcriber);
$client->payment()->setRequest($request);
$client->payment()->setChangePackage($changePackage);

try {

    $response = $client->payment()->changeSubscriberPackageFormRequest();
    print_r($response);

} catch (\Exception $exception) {
    echo $exception->getCode() . PHP_EOL;
    echo $exception->getMessage() . PHP_EOL;
    echo $exception->getTraceAsString() . PHP_EOL;
}