<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\HLCard\GameManagerInterface;


class GameController extends Controller
{
    public $gameManager;

    function __construct(GameManagerInterface $gameManager)
    {
        $this->gameManager          = $gameManager;
    }

    /**
     * STARTS NEW GAME
     *
     * @return void
     */
    public function newGame()
    {

    }

    /**
     * RETRIEVES NEXT CARD
     */
    public function getNextCard()
    {

    }

    /**
     * RENDERS GAME PLAY VIEW
     *
     * @return void
     */
    public function game()
    {
        return view()->make('gamepage');
    }
}
