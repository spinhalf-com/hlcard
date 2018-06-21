<?php
/**
 * Created by PhpStorm.
 * User: johnriordan
 * Date: 21/06/2018
 * Time: 11:58
 */
namespace App\HLCard;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;


class CardApi implements CardApiInterface
{
    protected $cardApiUrl;

    function __construct()
    {
        $this->cardApiUrl           = env('CARD_API_URL');
    }

    public function getCards()
    {
        // TODO: Implement getCards() method.
    }
}