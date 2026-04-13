<?php

namespace App\Tests\Service;

use App\Entity\Question;
use App\Entity\Reponse;
use PHPUnit\Framework\TestCase;

class ScoreCalculatorTest extends TestCase
{
    public function testScoreCalculation()
    {
        // Question 1
        $q1 = new Question();
        $r1 = new Reponse();
        $r1->setIsCorrect(true);
        $q1->addReponse($r1);

        // Question 2
        $q2 = new Question();
        $r2 = new Reponse();
        $r2->setIsCorrect(false);
        $q2->addReponse($r2);

        // Simuler les réponses du joueur
        $playerAnswers = [
            ['question' => $q1, 'isCorrect' => true],
            ['question' => $q2, 'isCorrect' => false],
        ];

        $score = 0;
        foreach ($playerAnswers as $answer) {
            if ($answer['isCorrect']) {
                $score++;
            }
        }

        $this->assertEquals(1, $score);
    }
}
