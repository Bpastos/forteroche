<?php


namespace models;



use PHPUnit\Runner\Exception;

class User extends Sql
{

    /**
     * Si un utilisateur existe
     * @param $login
     *
     * @return bool
     */
    public function userExists($login) {
        $sql = 'SELECT user_id FROM user WHERE user_login = ?';
        $user = $this->sqlPrepare($sql, array($login));

        return ($user->rowCount() == 1);
    }

    /**
     * Obtenir le psw
     * @param $login
     *
     * @return mixed
     */
    public function getUserHash($login) {
        $sql = 'SELECT user_psw AS hash FROM user WHERE user_login = ?';
        $hashage = $this->sqlPrepare($sql, array($login));

        return $hashage->fetch();
    }

    /**
     * Obtenir un utilisateur
     * @param $login
     *
     * @return mixed
     */
    public function getUser($login) {
        $sql = 'SELECT user_id AS userId, user_login AS login, user_psw AS psw, user_role AS role FROM user WHERE user_login = ?';
        $user = $this->sqlPrepare($sql, array($login));

        if ($user->rowCount() == 1) {
            return $user->fetch();
        } else {
            throw new Exception('Aucun utilisateur ne correspond aux identifiants fournis, veuillez réessayer.');
        }
    }

    /**
     * Changer le psw
     * @param $newPsw
     * @param $login
     *
     * @return \PDOStatement
     */
    public function changePsw($newPsw, $login) {
        $sql = 'UPDATE user SET user_psw = ? WHERE user_login = ?';
        $result = $this->sqlPrepare($sql, array($newPsw, $login));

        return $result;
    }




}