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
    protected $guzzleClient;

    function __construct()
    {
        $this->cardApiUrl           = env('CARD_API_URL');
        $this->makeClient();
    }

    private function makeClient()
    {
        $this->guzzleClient         = new Client(); //GuzzleHttp\Client
    }

    public function getCards()
    {
        $cardResponse               = $this->guzzleClient->get($this->cardApiUrl);

//        dd($cardResponse->getBody()->getContents());

        return $cardResponse->getBody()->getContents();
    }
}



//$result = $client->post('your-request-uri', [
//    'form_params' => [
//        'sample-form-data' => 'value'
//    ]
//]);