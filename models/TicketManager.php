<?php


namespace models;


class TicketManager extends Bdd
{

    /**
     * Créer un ticket
     * @param $title
     * @param $content
     */
    public function createTicket($title, $content)
    {
        $req = $this->connexionDb()->prepare('INSERT INTO ticket(tick_title, tick_content) VALUES (?, ?)');
        $req->execute(array($title, $content));
    }

    /**
     * Obtenir un ticket
     * @param $tickId
     *
     * @return mixed
     */
    public function getTicket($tickId)
    {
        $req = $this->connexionDb()->prepare('SELECT tick_id AS id, DATE_FORMAT(tick_date, \'%d/%m/%Y\') AS dateCreated,
        tick_title AS title, tick_content AS content FROM ticket WHERE tick_id = ?');
        $req->execute(array($tickId));

        $ticket = $req->fetch();

        return $ticket;
    }

    /**
     * Obbtenir les tickets
     * @return \PDOStatement
     */
    public function getTickets()
    {
        $req = $this->connexionDb()->prepare('SELECT tick_id AS id, DATE_FORMAT(tick_date, \'%d/%m/%Y\') AS dateCreated,
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
        $req = $this->connexionDb()->prepare('UPDATE ticket SET tick_title = ?, tick_content = ?, WHERE tick_id = ?');
        $req->execute(array($title, $content, $tickId));
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