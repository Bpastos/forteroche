<?php


namespace models;


use views\Login;


class LoginManager extends Login
{

    protected function login()
    {
        if (isset($_POST['login']) == 'JeanForteroche' && $_POST['psw'] == 'test') {
            $this->dashboard();
        } else {
            echo 'Vous n\'avez pas l\'autorisation requis pour accéder à la page d\'administration';
        }
    }




}