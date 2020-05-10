Zotlo.com PHP-SDK


## Author

Zotlo is owned and maintained by [Zotlo DevTeam](mailto:sdk@zotlo.com).

[Available Services](./examples)

## Create New Subscriber (REST)

```php

use Zotlo\Connect\Client;
use Zotlo\Connect\Entity\Credentials;
use Zotlo\Connect\Entity\Card;
use Zotlo\Connect\Entity\Product;
use Zotlo\Connect\Entity\Subscriber;
use Zotlo\Connect\Entity\Request;

$credentials = new Credentials();
$credentials->setAccessKey("1")->setAccessSecurity("1")->setApplicationId('2');

$card = new Card();
$card->setCardNumber('4111111111111111');
$card->setcardHolderName("Test Test");
$card->setExpireMonth('12');
$card->setExpireYear('20');
$card->setCvv('001');

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
$client->payment()->setCard($card);
$client->payment()->setSubscriber($subcriber);
$client->payment()->setRequest($request);
$client->payment()->setProduct($product);

try {

    $paymentResponse = $client->payment()->saleWithCard();

    if ($paymentResponse->getResponse()->isSuccess()) {
        echo 'success';
    } else {
        echo 'fail';
    }

    print_r($paymentResponse->getResponse());

} catch (\Zotlo\Connect\Exception\PaymentException $exception) {
    echo $exception->getErrorCode() . PHP_EOL;
    echo $exception->getErrorMessage() . PHP_EOL;
    echo $exception->getHttpStatus() . PHP_EOL;
    print_r($exception->getMeta());
    print_r($exception->getResult());
}

```


## Start New Payment (3DS)

```php

use Zotlo\Connect\Client;
use Zotlo\Connect\Entity\Credentials;
use Zotlo\Connect\Entity\Card;
use Zotlo\Connect\Entity\Product;
use Zotlo\Connect\Entity\Subscriber;
use Zotlo\Connect\Entity\Request;
use Zotlo\Connect\Entity\Redirect;

$credentials = new Credentials();
$credentials->setAccessKey("1")->setAccessSecurity("1")->setApplicationId('2');

$card = new Card();
$card->setCardNumber('4111111111111111');
$card->setcardHolderName("Test Test");
$card->setExpireMonth('12');
$card->setExpireYear('20');
$card->setCvv('001');

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

$redirect = new Redirect();
$redirect->setRedirectUrl('https://example.com/callback');

$client = new Client($credentials);
$client->payment()->setCard($card);
$client->payment()->setSubscriber($subcriber);
$client->payment()->setRequest($request);
$client->payment()->setProduct($product);
$client->payment()->setRedirect($redirect);

try {
    $paymentResponse = $client->payment()->sale3D();
    #Redirect Zotlo
    header('Location: ' . $paymentResponse->getRedirect()->getUrl());

} catch (\Zotlo\Connect\Exception\PaymentException $exception) {
    echo $exception->getErrorCode() . PHP_EOL;
    echo $exception->getErrorMessage() . PHP_EOL;
    echo $exception->getHttpStatus() . PHP_EOL;
    print_r($exception->getMeta());
    print_r($exception->getResult());
}
```


### Subscriber Profile

```php

use Zotlo\Connect\Client;
use Zotlo\Connect\Entity\Credentials;
use Zotlo\Connect\Entity\Request;

$credentials = new Credentials();
$credentials->setAccessKey("1")->setAccessSecurity("1")->setApplicationId('2');

$subscriber = new \Zotlo\Connect\Entity\Subscriber();
$subscriber->setSubscriberId('subscriber-id');

$request = new Request();
$request->setPlatform('web');
$request->setEndpoint('https://api.zotlo.com/');

$client = new Client($credentials);
$client->subscription()->setSubscriber($subscriber);
$client->subscription()->setRequest($request);

try {
    $response = $client->subscription()->profile();
    print_r($response);

} catch (\Zotlo\Connect\Exception\PaymentException $exception) {
    echo $exception->getErrorCode() . PHP_EOL;
    echo $exception->getErrorMessage() . PHP_EOL;
    echo $exception->getHttpStatus() . PHP_EOL;
    print_r($exception->getMeta());
    print_r($exception->getResult());
}
```


## License

The MIT License

Copyright (c) 2020 Zotlo. [https://zotlo.com](https://zotlo.com)

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.