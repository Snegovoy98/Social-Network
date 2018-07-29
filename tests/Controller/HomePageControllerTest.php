<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomePageControllerTest extends WebTestCase
{
    public function testHomeTemplate()
    {
        $client = static ::createClient();

        $crawler = $client->request('post', '/home');



    }
}