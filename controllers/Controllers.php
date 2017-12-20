<?php


namespace controllers;


use models\CommentManager;
use models\TicketManager;


class Controllers extends LoginController
{


    /**
     * Ajoute un commentaire au billet correspondant à son id
     *
     * @param $author
     * @param $content
     * @param $tickId
     *
     * @return \PDOStatement
     * @throws \Exception
     */
    public function addComment ($author, $content, $tickId)
    {
        $commentM = new CommentManager();
        $postComment = $commentM->addComment($author, $content, $tickId);

        if ($postComment === false) {
            throw new \Exception('Il est impossible d\'ajouter le commentaire !');
        }

        return $postComment;

    }

    /**
     * Affiche la liste des billets
     */
    public function listPosts()
    {
        $ticketManager = new TicketManager();
        $posts = $ticketManager->getTickets();

        require '../views/template/listTicketsView.php';

    }

    /**
     * Affiche un billet avec ces commentaires
     */
    public function post()
    {
        $ticketM = new TicketManager();
        $commentM = new CommentManager();

        $post = $ticketM->getTicket($_GET['id']);
        $comment = $commentM->getComments($_GET['id']);

        require '../views/template/ticketView.php';
    }


}