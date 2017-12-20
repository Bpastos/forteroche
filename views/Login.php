<?php
namespace views;



use views\Administration\Admin;


class Login extends Admin
{

    public function logForm() {

            $title = 'Page de connexion';
            include '../views/template/header.php';
            include '../views/template/nav.php'; ?>

            <div class="section">
                <div class="container">
                    <form method="POST" action="index.php?action=admin">
                        <h1 class="text-center">Connexion</h1>
                        <div class="row">
                            <div class="col-sm-12">
                                <input id="login" class="form-control" name="login" type="text" required autofocus>
                                <label class="active" for="login">Identifiant</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <input id="psw" class="form-control" name="psw" type="password" required autofocus>
                                <label for="psw">Mot de passe</label>
                            </div>
                        </div>
                        <?php if (isset($ErrorMsg)): ?>
                            <p class="errorTest red-text"><?= $ErrorMsg ?></p>
                        <?php endif; ?>
                        <button type="submit" class="btn waves-effect waves-light" <i class="glyphicon glyphicon-send"></i>Connexion
                    </form>
                </div>
            </div>
        <?php
    }



}