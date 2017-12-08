<?php


namespace models;


use controllers\Controllers;

class Router
{


    public function blog() {

        if (isset($_GET['request'])) {
            $request = $_GET['request'];
        } else {
            $request = 'home';
        }



        if ($request === 'home') {

            $controller = new Controllers();
            $controller->listTickets();
        }

    }



}