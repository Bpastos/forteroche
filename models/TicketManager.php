<?php


namespace models;


class TicketManager extends Sql
{

    /**
     * Ajoute un ticket à la bdd
     * @param Ticket $ticket
     */
    public function add($title, $content, $date)
    {
        $sql = 'INSERT INTO ticket(tick_title, tick_content,tick_date) VALUES (?, ?, NOW())';
        $result = $this->sqlPrepare($sql, array($title, $content, $date));

        return $result;
    }

    /**
     * Obtenir un ticket
     * @param $tickId
     *
     * @return mixed
     */
    public function getTicket($postId)
    {
        $sql = 'SELECT tick_id AS id, DATE_FORMAT(tick_date, \'%d/%m/%Y\') AS dateCreated,
        tick_title AS title, tick_content AS content FROM ticket WHERE tick_id = ?';
        $result = $this->sqlPrepare($sql, array($postId));

        $post = $result->fetch();

        return $post;
    }

    /**
     * Obbtenir les tickets
     * @return \PDOStatement
     */
    public function getTickets()
    {
        $sql = 'SELECT tick_id AS id, DATE_FORMAT(tick_date, \'%d/%m/%Y\') AS dateCreated,
        tick_title AS title, tick_content AS content FROM ticket ORDER BY tick_date DESC';
        $result = $this->sqlPrepare($sql);

        return $result;
    }


    /**
     * Mettre à jour un ticket
     * @param $title
     * @param $content
     * @param $tickId
     */
    protected function updateTicket($title, $content, $tickId)
    {
        $sql = 'UPDATE ticket SET tick_title = ?, tick_content = ?, 
        tick_date = NOW() WHERE tick_id = ?';

        $result = $this->sqlPrepare($sql, array($title, $content, $tickId));

        return $result;
    }



    /**
     * Supprime un ticket
     * @param $tickId
     */
    protected function deleteTicket($tickId)
    {
        $sql = 'DELETE FROM ticket WHERE tick_id = ?';
        $deleteTicket = $this->sqlPrepare($sql, array($tickId));
        return $deleteTicket;
    }

    /**
     * Compte le nombre de ticket pour la pagination
     * @return mixed
     */
    protected function getTicketsNumber()
    {
        $sql = 'SELECT COUNT(*) AS ticketsNb FROM ticket';
        $result = $this->sqlPrepare($sql);
        $line = $result->fetch();
        return $line['ticketsNb'];
    }

}