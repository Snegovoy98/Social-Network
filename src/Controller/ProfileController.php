<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProfileController extends AbstractController
{
    public function myTemplate($id)
    {
       return $this->render('profile/profile.html.twig');
    }

    public function friendTemplate($id)
    {

    }
}