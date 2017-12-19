<?php
session_start();
if (!isset($_SESSION['login'])) {
    header ('Location: dashboard.php');
    exit();
}
?>


<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="description" content="">
        <meta name="author" content="Jean Forteroche">
        <link rel="icon" href="img/favicon.ico">
        <title>Tableau d'administration</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        Bienvenue<?php echo htmlentities(trim($_SESSION['login'])); ?>!<br />
    <a href="deconnexion.php">Déconnexion</a>
    </body>
</html>