<?php $title = 'Blog de Jean Forteroche';

ob_start(); ?>



<?php

while ($data = $posts->fetch()) { ?>

    <article>
        <section class="page-header">
            <h2>
                <?= htmlspecialchars($data['title']); ?>
                <p><small>le <?= $data['dateCreated']; ?></small></p>
            </h2>
        </section>

        <section class="">
            <p><?= substr(htmlspecialchars($data['content']), 0, 500).'...'; ?></p>
        </section><br/>
            <p><a href="index.php?action=post&id=<?= $data['id']; ?>" class="btn btn-default">Lire la suite</a></p>
    </article>
    <nav aria-label="Page de navigation" class="text-center">
        <ul class="pagination">

        </ul>
    </nav>

<?php }
$posts->closeCursor();

$content = ob_get_clean();

require 'template/default.php'; ?>
