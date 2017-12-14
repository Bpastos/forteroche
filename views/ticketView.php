<?php $title = htmlspecialchars($post['title']);

ob_start(); ?>

    <h1 style="text-align: center">Un billet simple pour l'Alaska</h1>
    <p><a href="index.php">Retour à la liste des billets</a></p>

    <div>
        <h3>
            <?= htmlspecialchars($post['title']) ?>
            <em>le <?= $post['dateCreated'] ?></em>
        </h3>

        <p>
            <?= nl2br(htmlspecialchars($post['content'])) ?>
        </p>
    </div>

    <form class="col-lg-6" action="index.php?action=addComment&amp;id=<? $post['id'] ?>" method="post">
        <legende>Commentaire</legende>
        <div class="form-group">
            <label for="author">Auteur</label><br />
            <input type="text" id="author" name="author" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="comment">Votre commentaire</label><br/>
            <textarea id="comment" name="comment" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <input type="submit"/>
        </div>
    </form>

<?php
while ($comments = $comment->fetch() ) { ?>

    <p><strong><?= htmlspecialchars($comment['author'])?></strong> le <?= $comment['dateCommentCreated'] ?></p>
    <p><?= nl2br(htmlspecialchars($comment['comment']))?></p>
<?php } ?>
<?php $content = ob_get_clean();

require 'template/default.php'; ?>