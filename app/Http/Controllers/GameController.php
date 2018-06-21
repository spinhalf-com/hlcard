<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\HLCard\GameManagerInterface;
use Illuminate\Support\Facades\Response;

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
        $game                       = $this->gameManager->newGame();

        return response()->json(['status' => 200, 'info' => $game], 200);
    }

    /**
     * RETRIEVES NEXT CARD
     */
    public function nextGuess()
    {

    }

    /**
     * RENDERS GAME PLAY VIEW
     *
     * @return void
     */
    public function gamepage()
    {
        return view()->make('gamepage');
    }


}
