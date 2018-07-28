<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AuthorizationControllerTest extends WebTestCase
{
    public function testAuthorizationTemplate()
    {
        $client = static::createClient();

        $crawler = $client->request('authorization','/');

        $form = $crawler->selectButton('button')->form();

        $form['login'] = 'Ivanov';
        $form['password'] = 'IvanovIvan';

        $link = $crawler->selectLink('Регистрация')->link();

        $client->click($link);

    }
}