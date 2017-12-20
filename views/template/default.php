<?php
session_start();
ob_start();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
      <meta name="description" content="">
      <meta name="author" content="Jean Forteroche">
      <link rel="icon" href="img/favicon.ico">
      <title><?= $title ?></title>
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

            <div class="container rose">

            <?= $content; ?>

            </div>
            <div class="container-fluid">
                <?php include '../views/template/footer.php'; ?>
            </div>


    </body>
</html>

<?php
ob_end_flush();
?>