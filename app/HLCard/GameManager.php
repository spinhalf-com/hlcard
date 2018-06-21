<?php
/**
 * Created by PhpStorm.
 * User: johnriordan
 * Date: 21/06/2018
 * Time: 11:48
 */

namespace App\HLCard;

use App\HLCard\GameManagerInterface;
use Exception;

use App\HLCard\CardApiInterface;

class GameManager implements GameManagerInterface
{
    protected $cardApi;
    public $score;

    function __construct(CardApiInterface $cardApi)
    {
        $this->cardApi         = $cardApi;

        $this->ordinality      = [1 => 'A', 2 => '2', 3 => '3', 4 => '4', 5 => '5', 6 => '6', 7 => '7', 8 => '8', 9 => '9', 10 => '10', 11 => 'J', 12 => 'Q', 13 => 'K'];
    }

    /**
     * SETS UP NEW GAME WITH SESSIONS FOR POSITION AND SHUFFLED DECK
     *
     * @return array
     */
    public function newGame()
    {
        $cards                  = $this->retrieveCardList();

        session(['deck' => $cards]);
        session(['position' => 1]);

        return ['first_card' => $cards[0], 'status' => 'New Game Started'];
    }

    /**
     * GETS SHUFFLED DECK FROM EXTERNAL SOURCE
     *
     * @return mixed
     * @throws \Exception
     */
    public function retrieveCardList()
    {
        try
        {
            $cards                 = $this->cardApi->getCards();

            if(!is_array($cards))
            {
                $cards              = json_decode($cards, true);
            }

            shuffle($cards);

            return $cards;
        }
        catch(\Exception $e)
        {
            abort(400, $e->getMessage());
        }
    }

    /**
     * RECEIVES HIGHER OR LOWER GUESS FOR NEXT CARD AND SETS UP COMPARISON
     *
     * @param string $direction
     * @return bool $result
     */
    public function guessNext($direction)
    {
        $cards                  = session('deck');

        $nextPosition           = session('position') + 1;
        $lastPosition           = session('position');

        $thisCard               = $cards[$nextPosition];
        $lastCard               = $cards[$lastPosition];

        $result                 = $this->compareCard($lastCard, $thisCard, $direction);

        if($result)
        {
            session(['position' => $nextPosition]);
        }

        return ['result' => $result, 'next_card' => $thisCard, 'score' => $lastPosition];
    }

    /**
     * COMPARES GUESS WITH ACTUAL RELATIVE SCORE FOR CARD
     *
     * @param array $actual
     * @param string $guess
     *
     * @return bool
     */
    public function compareCard($lastCard, $thisCard, $guess)
    {
        $lastCardValue          = $this->ordinalise($lastCard['value']);
        $thisCardValue          = $this->ordinalise($thisCard['value']);

        if($lastCardValue < $thisCardValue)
        {
            if($guess == 'higher')
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            if($guess == 'higher')
            {
                return false;
            }
            else
            {
                return true;
            }
        }
    }

    /**
     * CONVERTS CARD VALUE TO KEY VALUE
     *
     * @param string $cardValue
     * @return int
     */
    public function ordinalise($cardValue)
    {
        $key                    = array_search($cardValue, $this->ordinality);

        return $key;
    }
}