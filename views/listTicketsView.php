<?php $title = 'Blog de Jean Forteroche';

ob_start(); ?>

    <h1 style="text-align: center">Un billet simple pour l'Alaska</h1>

<?php

while ($data = $posts->fetch()) { ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            <h2>
                <a href="../../index.php?action=post&id=<?= $data['id']; ?>"><?= htmlspecialchars($data['title']) ?></a>
                <em>le <?= $data['dateCreated'] ?></em>
            </h2>

            <p>
                <?= nl2br(htmlspecialchars($data['content'])) ?>
            </p>
            </div>
        </div>
    </div>
<?php }
$posts->closeCursor();

$content = ob_get_clean();

require 'template/default.php'; ?>
