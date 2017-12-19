<?php


namespace models;


class CommentManager extends TicketManager
{

    /**
     * Créer un commentaire
     * @param $author
     * @param $content
     * @param $tickId
     */
    public function addComment($author, $content, $tickId)
    {
        $sql = 'INSERT INTO comment(com_author, com_content, tick_id, com_date) VALUES (?, ?, ?, NOW())';
        $result = $this->sqlPrepare($sql,array($author, $content, $tickId));

        return $result;

    }

    /**
     * Obtenir les commentaires correspondant à l'id du ticket
     *
     */
    public function getComments($postId)
    {
        $sql = 'SELECT com_id AS id, com_author AS author , com_content AS comment, DATE_FORMAT(com_date, \'%d/%m/%Y\') AS dateCommentCreated 
                                  FROM comment WHERE tick_id = ? ORDER BY com_date DESC';
        $comments = $this->sqlPrepare($sql, array($postId));
        $result = $comments->fetchAll();

        return $result;
    }

    /**
     * Supprime un commentaire
     * @param $comId
     */
    public function deleteComment($comId)
    {
        $sql = 'DELETE FROM comment WHERE com_id = ?';
        $result = $this->sqlPrepare($sql, array($comId));

        return $result;
    }


}