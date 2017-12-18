<?php


namespace models;
use PDO;

class Bdd
{

    /**
     * Connexion à la BDD
     * @return PDO
     */
    protected function connexionDb() {
        $db = new PDO('mysql:host=localhost;dbname=blogforteroche;charset=utf8','root','Commercy1411');

        return $db;
    }

}