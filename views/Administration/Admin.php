<?php
namespace views\Administration;

use controllers\ContactController;

class Admin extends ContactController
{


    public function dashboard()
    {
        $title = 'Panneau d\'administration';
        include '../views/template/header.php';
        include '../views/template/nav.php'; ?>


        <div>
            <header>
                <h1 style="text-align: center">Panneau d'administration</h1>

            </header>
        </div>





        <?php
    }




}







