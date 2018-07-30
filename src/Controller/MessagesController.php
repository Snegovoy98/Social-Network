<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MessagesController extends AbstractController
{
    public function messagesTemplate()
    {
        $this->render('messages/messages.html.twig');
    }
}