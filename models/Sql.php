<?php
namespace models;

class Sql extends Bdd {


    /**
     * Permet le lancement d'un requête prepare ou query
     *
     * @param $sql string
     * @param $array array ou vide qui va permettre de lancer execute sur un prepare ou un query
     *
     * @return \PDOStatement req sql
     */
    protected function sqlPrepare($sql, $array = null) {
        if ($array) {
            $req = $this->bdd->prepare($sql);
            $req->execute($array);
            return $req;
        } else {
            $req = $this->bdd->query($sql);
            return $req;
        }
    }

}