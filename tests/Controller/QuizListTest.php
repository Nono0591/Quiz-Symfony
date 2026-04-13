<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class QuizListTest extends WebTestCase
{
    public function testQuizListLoads()
    {
    $client = static::createClient();

    // Accéder à la page d'accueil des quiz
    $client->request('GET', '/quiz');

    // Suivre la redirection automatique
    $client->followRedirect();

    // Vérifier que la page charge correctement
    $this->assertResponseIsSuccessful();

    // Vérifier qu'il y a au moins un quiz affiché
    $this->assertSelectorExists('h1');

    }
    
}

