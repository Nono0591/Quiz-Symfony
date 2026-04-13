<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class QuizControllerTest extends WebTestCase
{
    public function testQuizPageLoads()
    {
        $client = static::createClient();

        // Accéder à un quiz existant (ID 1 si fixtures chargées)
        $crawler = $client->request('GET', '/quiz/1');

        // Vérifier que la page charge
        $this->assertResponseIsSuccessful();

        // Vérifier qu’on voit le titre du quiz
        $this->assertSelectorExists('h1');
    }
}
