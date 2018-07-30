<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MessagesController extends AbstractController
{
    public function messagesTemplate()
    {
       return $this->render('messages/messages.html.twig');
    }
}