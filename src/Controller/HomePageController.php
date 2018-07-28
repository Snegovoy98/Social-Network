<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomePageController extends AbstractController
{
    public function homeTemplate()
    {
       return $this->render('home/home.html.twig');
    }
}