<div class="section">
    <div class="container">
        <form method="POST" action="?action=login">
            <p class="flow-text center">Centre d'administration</p>
            <div class="row">
                <div class="input-group col s12">
                    <input id="login" name="login" type="text" required autofocus>
                    <label class="active" for="login">Identifiant</label>
                </div>
            </div>
            <div class="row">
                <div class="input-group col s12">
                    <input id="psw" name="psw" type="password" required autofocus>
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