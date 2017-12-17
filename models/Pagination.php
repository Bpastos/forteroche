<?php
namespace models;

class Pagination
{
    var $data;

    function paginate($values, $perPage) {
        $totalValues = count($values);

        if (isset($_GET['page'])) {
            $currentPage = $_GET['page'];
        } else {
            $currentPage = 1;
        }

        $counts = ceil($totalValues / $perPage);

        $param1 = ($currentPage - 1) * $perPage;
        $this->data = array_slice($values, $param1, $perPage);

        for ($x=1; $x<= $counts; $x++) {
            $numbers[] = $x;
        }

        return $numbers;

    }


    function fetchResult()
    {
        $resultsValues = $this->data;
        return $resultsValues;
    }

}


$page = new Pagination();
$data = array("hey","Salut","Test de pagination","Test de page 4");
$numbers = $page->paginate($data,1);

$result = $page->fetchResult();


foreach ($result as $res) {
    echo '<div>'.$res.'</div>';
}

