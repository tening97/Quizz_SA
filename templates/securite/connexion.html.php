<?php
if (isset($_SESSION[KEY_ERROR])) {
    $errors = $_SESSION[KEY_ERROR];
    unset($_SESSION[KEY_ERROR]);
}


?>
<link rel="stylesheet" href="<?= WEBROOT . "css" . DIRECTORY_SEPARATOR . "style.connexion.css" ?>">

<div id="container" class="main">
    <div class="form-contain">
        <div class="header-form">
            <p>Login form</p>
        </div>
        <form id="forme" action="<?= WEBROOT ?>" method="post">
            <input type="hidden" name="controller" value="securite">
            <input type="hidden" name="action" value="connexion">

            <?php if (isset($errors['connexion'])) {
            ?>
                <span>
                <?= $errors['connexion'];
            }

                ?>

                </span>
                <div class="items">
                    <div class="item" id="item">

                        <input type="text" name="login" placeholder="Login" value="" id="login">

                        <img src="<?= WEBROOT . "img" . DIRECTORY_SEPARATOR . "ic-login.png" ?>" alt="">

                    </div>
                    <span style="color: red;"><?= isset($errors['login']) ? $errors['login'] : '' ?></span>
                    <div class="item" id="item1">
                        <input type="password" name="password" placeholder="Password" id="pwd">
                        <img src="<?= WEBROOT . "img" . DIRECTORY_SEPARATOR . "ic-password.png" ?>" alt="">
                    </div>
                    <span style="color: red;"><?= isset($errors['password']) ? $errors['password'] : '' ?></span>

                </div>
                <div class="connect">
                    <button name="btn_con" class="btn">Connexion</button>
                    <a class="inscrire" href="<?= WEBROOT . "?controller=securite&action=inscription" ?>">S'inscrire pour jouer</a>
                </div>

        </form>
    </div>

</div>
<script src="<?= WEBROOT . "js" . DIRECTORY_SEPARATOR . "connexion.js" ?>"></script>