
    <?php include 'header.php'; ?>

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