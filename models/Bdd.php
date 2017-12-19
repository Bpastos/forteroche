<?php


namespace models;
use PDO;
use PHPUnit\Runner\Exception;

class Bdd
{

    const HOST = 'localhost';
    const DBNAME = 'blogforteroche';
    const USERNAME = 'root';
    const PASSWORD = 'Commercy1411';

    protected $bdd;

    /**
     * Bdd constructor.
     * Se connecte à la base de données.
     */
    public function __construct()
    {
        try {
            $this->bdd = new PDO('mysql:host='.self::HOST.';dbname='.self::DBNAME.';charset=utf8',''.self::DBNAME.'',''.self::PASSWORD.'');
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        return $this->bdd;
    }

}