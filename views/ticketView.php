<?php $title = htmlspecialchars($post['title']);

ob_start(); ?>




    <div class="row">
        <h2 style="text-align: center">
            <?= htmlspecialchars($post['title']) ?>
        </h2>
        <p class="titleCom"><em>le <?= $post['dateCreated'] ?></em></p>

        <div class="modal-content " style="text-align: justify">
            <p class="content">
                <?= nl2br(htmlspecialchars($post['content'])) ?>
            </p>
        </div>

    </div><br/>
    <div class="row">
        <fieldset>
            <legend class="titleCom">Commentaires :</legend>
            <form class="col-lg-6" action="index.php?action=addComment&amp;id=<?= $post['id']; ?>" method="post">

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
        </fieldset>

    </div>

    <div class="row commentaire">
        <fieldset>
            <?php

            foreach ($comment as $com) {?>

                <p><strong><?= htmlspecialchars($com['author'])?></strong> le <?= $com['dateCommentCreated'] ?></p>
                <p><?= nl2br(htmlspecialchars($com['comment']))?></p>

            <?php } ?>
        </fieldset>
    </div>
    <p><a href="index.php?action=home">Retour à la liste des billets</a></p>
<?php $content = ob_get_clean();

require 'template/default.php'; ?>