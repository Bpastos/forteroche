<?php


namespace models;


class TicketManager extends Bdd
{

    /**
     * Ajoute un ticket à la bdd
     * @param Ticket $ticket
     */
    public function add(Ticket $ticket)
    {
        $req = $this->connexionDb()->prepare('INSERT INTO ticket(tick_title, tick_content,tick_date) VALUES (:title, :content, NOW())');
        $req->bindValue(':title', $ticket->getTickTitle());
        $req->bindValue(':content',$ticket->getTickContent());

        $req->execute();
    }

    /**
     * Obtenir un ticket
     * @param $tickId
     *
     * @return mixed
     */
    public function getTicket($postId)
    {
        $req = $this->connexionDb()->prepare('SELECT tick_id AS id, DATE_FORMAT(tick_date, \'%d/%m/%Y\') AS dateCreated,
        tick_title AS title, tick_content AS content FROM ticket WHERE tick_id = ?');
        $req->execute(array($postId));

        $post = $req->fetch();

        return $post;
    }

    /**
     * Obbtenir les tickets
     * @return \PDOStatement
     */
    public function getTickets()
    {
        $req = $this->connexionDb()->query('SELECT tick_id AS id, DATE_FORMAT(tick_date, \'%d/%m/%Y\') AS dateCreated,
        tick_title AS title, tick_content AS content FROM ticket ORDER BY tick_date DESC LIMIT 0, 5');

        return $req;
    }

    /**
     * Mettre à jour un ticket
     * @param $title
     * @param $content
     * @param $tickId
     */
    public function updateTicket($title, $content, $tickId)
    {
        $req = $this->connexionDb()->prepare('UPDATE ticket SET tick_title = :title, tick_content = :content, 
        tick_date = NOW() WHERE tick_id = :tickId');
        $req->bindValue(':title', $title);
        $req->bindValue(':content', $content);
        $req->bindValue(':tickId', (int) $tickId);
        $req->execute();

    }

    /**
     * Supprime un ticket
     * @param $tickId
     */
    public function deleteTicket($tickId)
    {
        $req = $this->connexionDb()->prepare('DELETE FROM ticket WHERE tick_id = ?');
        $req->execute(array($tickId));
    }


}