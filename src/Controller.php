<?php

namespace Pims12\ColdHot\Controller;

use Pims12\ColdHot\View\View;

class Controller
{
    public function generateSecretNumber()
    {
        $arrayNumbers = [];
        $length = 3;

        while (count($arrayNumbers) !== $length) {
            $number = rand(1, 9);

            if (!in_array($number, $arrayNumbers)) {
                $arrayNumbers[] = $number;
            }
        }

        $result = implode("", $arrayNumbers);

        return $result;
    }

    public function startGame()
    {
        $isFinished = false;
        $counter = 0;
        $hints = [];

        $secretNumber = $this->generateSecretNumber();

        while (!$isFinished) {
            $userData = readline("Ваше число (или 'exit' для выхода): ");

            $counter = 0;
            $hints = [];

            if ($userData === 'exit') {

                View::showLose($secretNumber);
                die();

            } else if (strlen($userData) === strlen($secretNumber)) {

                for ($i = 0; $i < strlen($secretNumber); $i++) {
                    if (mb_strpos($secretNumber, $userData[$i]) !== false) {

                        if (mb_strpos($secretNumber, $userData[$i]) === $i) {
                            $hints[] = 'Горячо';
                        } else {
                            $hints[] = 'Тепло';
                        }

                    } else {
                        $hints[] = 'Холодно';
                    }
                }

                sort($hints);

                foreach ($hints as $status) {
                    if ($status === 'Горячо') {
                        $counter++;
                    }            
                }

                if ($counter === 3) {
                    $isFinished = true;
                    View::showWin($secretNumber);            
                }

                View::showHints(implode(', ', $hints));
            }
        }
    }
}
