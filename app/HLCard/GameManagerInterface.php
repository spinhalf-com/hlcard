<?php
/**
 * Created by PhpStorm.
 * User: johnriordan
 * Date: 21/06/2018
 * Time: 11:47
 */

namespace App\HLCard;

interface GameManagerInterface
{
    public function newGame();
    public function retrieveCardList();
    public function guessNext($direction);
    public function compareCard($lastCard, $thisCard, $guess);

}