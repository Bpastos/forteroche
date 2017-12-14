<?php

namespace models;

include "../controllers/Controllers.php";
use PHPUnit\Runner\Exception;
use controllers\Controllers;
class Router extends Controllers
{


    public function blog() {



        try {

            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'listposts') {
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
                        } else {
                            throw new Exception('Tous les champs ne sont pas remplis !');
                        }
                    } else {
                        throw new Exception('Aucun identifiant de billet envoyé');
                    }
                }
            } else {
                $this->listPosts();
            }
        } catch (Exception $e) {
            $errorMessage = $e->getMessage();
            require '../views/errorView.php';
        }

    }



}