<?php
namespace controllers;


use models\User;

class LoginControllers
{
    private $user;


    public function __construct()
    {
        $this->user = new User();
    }

    public function login()
    {

    }


}
