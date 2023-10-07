<?php

namespace Pims12\ColdHot\View;

use function cli\line;

class View
{
    public function showGame()
    {

        line("This is the game intereface");
    }

    public static function showLose(string $secretNumber)
    {
        line("Вы проиграли! Загаданное число: $secretNumber");
    }

    public static function showWin(string $secretNumber)
    {
        line("Вы победили! Загаданное число: $secretNumber");
    }

    public static function showHints(string $hints)
    {
        line($hints);
    }
}