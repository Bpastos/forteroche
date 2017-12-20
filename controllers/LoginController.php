<?php


namespace controllers;


use views\Login;

class LoginController extends ContactController
{

    protected function displayLog() {
        $login = new Login();
        $login->logForm();
    }

}