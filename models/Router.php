<?php

namespace models;


use PHPUnit\Runner\Exception;
use controllers\Controllers;

class Router extends Controllers
{


    public function blog() {



        try {

            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'home') {
                    $this->listPosts();
                } elseif ($_GET['action'] == 'post') {
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        $this->post();
                    } else {
                        throw new Exception('Aucun identifiant de billet envoyé');
                    }
                } elseif ($_GET['action'] == 'addComment') {
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                            $this->addComment($_POST['author'], $_POST['comment'], $_GET['id']);
                            $this->post();
                        } else {
                            throw new Exception('Tous les champs ne sont pas remplis !');
                        }
                    } else {
                        throw new Exception('Aucun identifiant de billet envoyé');
                    }
                } elseif ($_GET['action'] == 'contact') {
                    $this->displayContact();
                } elseif ($_GET['action'] == 'sendContact') {
                    $this->emailC();
                } elseif ($_GET['action'] == 'login') {
                    $this->displayLog();
                } elseif ($_GET['action'] == 'admin') {
                    $this->login();
                }
                else {
                $this->listPosts();
                }
            }
        } catch (Exception $e) {
            $errorMessage = $e->getMessage();
            require '../views/template/errorView.php';
        }

    }



}