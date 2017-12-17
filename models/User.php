<?php


namespace models;



use PHPUnit\Runner\Exception;

class User extends Bdd
{

    public function userExists($login) {
        $req = 'SELECT user_id FROM user WHERE user_login = ?';
        $user = $this->connexionDb()->prepare($req, array($login));

        return ($user->rowCount() == 1);
    }


    public function getUserHash($login) {
        $req = 'SELECT user_psw AS hash FROM user WHERE user_login = ?';
        $hashage = $this->connexionDb()->prepare($req, array($login));

        return $hashage->fetch();
    }

    public function getUser($login) {
        $req = 'SELECT user_id AS userId, user_login AS login, user_psw AS psw, user_role AS role FROM user WHERE user_login = ?';
        $user = $this->connexionDb()->prepare($req, array($login));

        if ($user->rowCount() == 1) {
            return $user->fetch();
        } else {
            throw new Exception('Aucun utilisateur ne correspond aux identifiants fournis, veuillez réessayer.');
        }
    }

    public function changePsw($newPsw, $login) {
        $req = 'UPDATE user SET user_psw = ? WHERE user_login = ?';
        $result = $this->connexionDb()->query($req, array($newPsw, $login));

        return $result;
    }




}