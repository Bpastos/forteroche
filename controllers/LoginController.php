<?php


namespace controllers;


use models\LoginManager;
use views\Login;

class LoginController extends LoginManager
{

    protected function displayLog() {
        $login = new Login();
        $login->logForm();
    }

}