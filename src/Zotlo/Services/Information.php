<?php

namespace Zotlo\Connect\Services;

use Zotlo\Connect\Entity\Card;
use Zotlo\Connect\Entity\Credentials;
use Zotlo\Connect\Entity\Request;
use Zotlo\Connect\Exception\PaymentException;
use Zotlo\Connect\Response\BinCountryResponse;

/**
 * Class Information
 * @package Zotlo\Connect\Payment
 */
class Information extends HttpClient
{
    /**
     * @var Credentials
     */
    private $credentials = null;

    /**
     * @var Card
     */
    private $card = null;

    /**
     * @var Request
     */
    private $request = null;

    /**
     * Information constructor.
     * @param Credentials $credentials
     */
    public function __construct(Credentials $credentials)
    {
        $this->setCredentials($credentials);
    }

    /**
     * @return Credentials|null
     */
    public function getCredentials(): ?Credentials
    {
        return $this->credentials;
    }

    /**
     * @param Credentials|null $credentials
     */
    public function setCredentials(?Credentials $credentials): void
    {
        $this->credentials = $credentials;
    }

    /**
     * @return Card|null
     */
    public function getCard(): ?Card
    {
        return $this->card;
    }

    /**
     * @param Card|null $card
     */
    public function setCard(?Card $card): void
    {
        $this->card = $card;
    }

    /**
     * @return Request|null
     */
    public function getRequest(): ?Request
    {
        return $this->request;
    }

    /**
     * @param Request|null $request
     */
    public function setRequest(?Request $request): void
    {
        $this->request = $request;
    }

    /**
     * @return BinCountryResponse
     * @throws PaymentException
     */
    public function binCountry(): BinCountryResponse
    {
        $cardNumber = $this->card->getCardNumber();

        if (empty($cardNumber)) {
            throw new \InvalidArgumentException('cardNumber is invalid');
        }

        if (strlen($cardNumber) < 6) {
            throw new \InvalidArgumentException('cardNumber is must be greater than 6 digits');
        }

        $binNumber = substr($cardNumber, 0, 6);

        $response = $this->post('information/bin-country', [
            'binNumber' => $binNumber,
        ]);

        return new BinCountryResponse($response);
    }
}