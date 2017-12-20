<?php
namespace views;

class Contact

{

    public function templateContact()
    {
        ?>
        <html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="description" content="">
        <meta name="author" content="Jean Forteroche">
        <link rel="icon" href="img/favicon.ico">
        <title>Formulaire de Contact</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
    <div>
        <header class="page-header bleu">
            <div class="container-fluid">

            </div>
            <h1 style="text-align: center">Un billet simple pour l'Alaska</h1>
            <?php include '../views/template/nav.php';?>
        </header>

    </div>
    </body>
        <form class="col-lg-6" method="post" action="index.php?action=sendContact">
            <label for="name">Votre nom :</label> <input type="text" name="name" id="name" class="form-control" required autofocus>
            <label for="mail">Votre email :</label> <input type="email" name="mail" id="mail" class="form-control" required autofocus>
            <label for="objet">Objet :</label> <input type="text" name="objet" id="objet" class="form-control">
            <label for="textarea">Votre message :</label> <textarea name="textarea" id="textarea" class="form-control"></textarea>
            <div>
                <input type="submit" value="Envoyez"/>
            </div>
        </form>
        <?php
    }
}
