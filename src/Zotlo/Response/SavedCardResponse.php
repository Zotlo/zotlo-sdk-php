<?php

namespace Zotlo\Connect\Response;


use Zotlo\Connect\Entity\CardList\CardItem;
use Zotlo\Connect\Entity\Meta;

/**
 * Class SavedCardResponse
 * @package Zotlo\Connect\Response
 */
class SavedCardResponse
{

    /**
     * @return Meta
     */
    private $meta = null;
    /**
     * @var CardItem[}
     */
    private $cards;

    /**
     * @return null
     */
    public function getMeta()
    {
        return $this->meta;
    }

    /**
     * @return CardItem[]
     */
    public function getCards() : array
    {
        return $this->cards;
    }

    /**
     * SavedCardResponse constructor.
     * @param $response
     */
    public function __construct($response)
    {
        $cards = $response['result']['cardList'];
        $cardItems = [];

        if (count($cards) > 0) {
            foreach ($cards as $card) {
                $cardItems[] = new CardItem($card);
            }
        }

        $this->meta = new Meta($response['meta']);
        $this->cards = $cardItems;

    }
}