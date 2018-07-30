<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RegistrationControllerTest extends WebTestCase
{
    public function testRegistrationTemplate()
    {
        $client = static::createClient();

        $crawler = $client->request('post', '/registration');

        $form = $crawler->selectButton('Зарегистрироваться')->form();

        $form['firstName'] = 'Ivan';
        $form['lastName'] = 'Ivanov';
        $form['fatherName'] = 'Ivanovich';
        $form['username'] = 'IvanovMaster';
        $form['password'] = 'IvanovIvan';
        $form['password_conf'] = 'IvanovIvan';
        $form['country']->select('Ukraine');
        $form['city']->select('Kiev');
        $form['male']->tick();
    }
}