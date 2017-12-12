<?php $title = 'Blog de Jean Forteroche';

ob_start(); ?>

    <h1>Un billet simple pour l'Alaska</h1>

<?php

while ($data = $posts->fetch()) { ?>

    <div>
        <h2>
            <a href="../../index.php?action=ticket&id=<?= $data['id']; ?>"><?= htmlspecialchars($data['title']) ?></a>
            <em>le <?= $data['date'] ?></em>
        </h2>
    </div>

