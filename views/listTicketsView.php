<?php $title = 'Blog de Jean Forteroche';

ob_start(); ?>

    <h1>Un billet simple pour l'Alaska</h1>

<?php

while ($data = $posts->fetch()) { ?>

    <div>
        <h2>
            <a href="../public/index.php?action=post&id=<?= $data['id']; ?>"><?= htmlspecialchars($data['title']) ?></a>
            <em>le <?= $data['dateCreated'] ?></em>
        </h2>

        <p>
            <?= nl2br(htmlspecialchars($data['content'])) ?>
        </p>
    </div>
<?php }
$posts->closeCursor();

$content = ob_get_clean();

require 'views/template/default.php'; ?>
