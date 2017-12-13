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
        $postComment = $commentM->addComment($author, $content, $tickId);

        if ($postComment === false) {
            throw new \Exception('Il est impossible d\'ajouter le commentaire !');
        }

        return $postComment;

    }

    public function listPosts()
    {
        $ticketManager = new TicketManager();
        $posts = $ticketManager->getTickets();

        require '../views/listTicketsView.php';

    }

    public function post()
    {
        $ticketM = new TicketManager();
        $commentM = new CommentManager();

        $post = $ticketM->getTicket($_GET['id']);
        $comment = $commentM->getComments($_GET['id']);

        // Require la page vue d'un ticket
    }

}