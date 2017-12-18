<?php


namespace models;


class CommentManager extends Bdd
{

    /**
     * Créer un commentaire
     * @param $author
     * @param $content
     * @param $tickId
     */
    public function addComment($author, $content, $tickId)
    {
        $req = $this->connexionDb()->prepare('INSERT INTO comment(com_author, com_content, tick_id, com_date) VALUES (?, ?, ?, NOW())');
        $result = $req->execute(array($author, $content, $tickId));

        return $result;

    }

    /**
     * Obtenir les commentaires correspondant à l'id du ticket
     *
     */
    public function getComments($postId)
    {
        $db = $this->connexionDb();
        $comments = $db->prepare('SELECT com_id AS id, com_author AS author , com_content AS comment, DATE_FORMAT(com_date, \'%d/%m/%Y\') AS dateCommentCreated 
                                  FROM comment WHERE tick_id = ? ORDER BY com_date DESC');
        $comments->execute(array($postId));

        $result = $comments->fetchAll();

        return $result;
    }

    /**
     * Supprime un commentaire
     * @param $comId
     */
    public function deleteComment($comId)
    {
        $req = $this->connexionDb()->prepare('DELETE FROM comment WHERE com_id = ?');
        $req->execute(array($comId));
    }

    /**
     * Obtenir les commentaires reportés
     * @return bool
     */
    public function getReportedComments()
    {
        $req = $this->connexionDb()->prepare('SELECT com_id AS id, DATE_FORMAT(com_date, \'%d/%m/%Y\') AS dateCreated, 
        com_author AS author, com_content AS content FROM comment WHERE com_reported = 1 ORDER BY com_date DESC ');
        $commentsReported = $req->execute();

        return $commentsReported;
    }

}