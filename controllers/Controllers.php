<?php


namespace controllers;


use models\CommentManager;
use models\TicketManager;

class Controllers
{


    private $ticket;

    private $comment;


    public function __construct()
    {
        $this->ticket = new TicketManager();
        $this->comment = new CommentManager();
    }

    public function addComment ($author, $content, $tickId)
    {
        $commentM = new CommentManager();
        $postComment = $commentM->createComment($author, $content, $tickId);

        if ($postComment === false) {
            throw new \Exception('Il est impossible d\'ajouter le commentaire !');
        }

        return $postComment;


    }

    public function listTickets()
    {
        $ticketM = new TicketManager();
        $content = $ticketM->getTickets();

        // Require la vue de la liste des tickets

    }

    public function getTicket()
    {
        $ticketM = new TicketManager();
        $commentM = new CommentManager();

        $post = $ticketM->getTicket($_GET['id']);
        $comment = $commentM->getComments($_GET['id']);

        // Require la page vue d'un ticket
    }

}