<?php
if (isset($_SESSION[KEY_ERROR])) {
    $errors = $_SESSION[KEY_ERROR];
    unset($_SESSION[KEY_ERROR]);
}


?>
<link rel="stylesheet" href="<?= WEBROOT . "css" . DIRECTORY_SEPARATOR . "style.inscription.css" ?>">
<div class="container1">
    <div class="gauche">
        <div class="titre">
            <h3>S'INSCRIRE</h3>
            <p>Pour tester votre niveau de culture générale</p>
        </div>
        <div class="form">

            <form action="<?= WEBROOT ?>" method="POST">
                <input type="hidden" name="controller" value="securite">
                <input type="hidden" name="action" value="inscription">

                <span style="color: red;"><?= isset($errors['prenom']) ? $errors['prenom'] : '' ?></span>
                <div class="div">
                    <label for="">Prénom</label>
                    <input type="text" id="prenom" name="prenom">
                </div>
                <span style="color: red;"><?= isset($errors['nom']) ? $errors['nom'] : '' ?></span>

                <div class="div">
                    <label for="">nom</label>
                    <input type="text" id="nom" name="nom">
                </div>
                <span style="color: red;"><?= isset($errors['login']) ? $errors['login'] : '' ?></span>
                <div class="div">
                    <label for="">login</label>
                    <input type="text" id="login" name="login">
                </div>
                <span style="color: red;"><?= isset($errors['error_login']) ? $errors['error_login'] : '' ?></span>

                <span style="color: red;"><?= isset($errors['password']) ? $errors['password'] : '' ?></span>
                <div class="div">
                    <label for="">Mot de passe</label>
                    <input type="password" id="password" name="password">
                </div>
                <span style="color: red;"><?= isset($errors['password1']) ? $errors['password1'] : '' ?></span>

                <div class="div">
                    <label for="">Confirmer mot de passe</label>
                    <input type="password" id="password1" name="password1">

                </div>
                <span style="color: red;"><?= isset($errors['confirmation']) ? $errors['confirmation'] : '' ?></span>



                <div>
                    <label for="fichier">choisir un fichier</label>
                    <input type="file" title=" " id="fichier" name="fichier" id="fichier">
                    <!-- <button>choisir un fichier</button> -->
                </div>

                <button id="creer">Créer un compte</button>
            </form>
        </div>
    </div>
    <div class="droite">
        <div class="droite1">
            <img src="<?= WEBROOT . "img" . DIRECTORY_SEPARATOR . "avatar.jpg" ?>" alt="" width="220px" height="220px" class="img1">
        </div>
    </div>
</div>