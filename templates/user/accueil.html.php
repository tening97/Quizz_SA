<?php
require_once(PATH_VIEWS . "include" . DIRECTORY_SEPARATOR . "header.inc.html.php");
if (isset($_SESSION['info_temp'])) {
    unset($_SESSION['info_temp']);
}
?>

<link rel="stylesheet" href="<?= WEBROOT . "css" . DIRECTORY_SEPARATOR . "style.accueil.css" ?>">


<div class="container">
    <div class="head">
        <P class="h3">CRÉER ET PARAMÉTRER VOS QUIZZ</p>
        <button class="deconnexion"><a href="<?= WEBROOT . "?controller=securite&action=deconnexion" ?>">Déconnexion</a></button>
    </div>
    <div class="corps">
        <div class="navbar">
            <div class="headnav">

                <div class="avatar">
                    <img class="avatar1" src="<?= WEBROOT . "uploads" . DIRECTORY_SEPARATOR . $_SESSION[KEY_UER_CONNECT]['photo'] ?>" alt="">
                </div>
                <div class="info">
                    <div class="nom"><?= $_SESSION[KEY_UER_CONNECT]['nom'] ?></div>
                    <div class="prenom"> <?= $_SESSION[KEY_UER_CONNECT]['prenom'] ?></div>

                </div>
            </div>
            <div class="corpsnav">
                <?php if (is_admin()) { ?>
                    <ul>

                        <a href="">
                            <li>Liste des Questions <img src="img/ic-liste.png" alt=""></li>
                        </a>



                        <a href="<?= WEBROOT . "?controller=user&action=creer.admin" ?>">
                            <li> Créer Admin <img src="img/ic-ajout.png" alt=""></li>

                        </a>


                        <a href="<?= WEBROOT . "?controller=user&action=liste.joueur" ?>">
                            <li>Liste des joueurs<img src="img/ic-liste.png" alt=""></li>
                        </a>



                        <a href="<?= WEBROOT . "?controller=questions&action=creer.question" ?>">
                            <li>Créer Questions <img src="img/ic-ajout.png" alt=""></li>
                        </a>


                    <?php } ?>
                    </ul>
            </div>
        </div>
        <div class="bloc-info">
            <?= isset($content_for_views) ? $content_for_views : 'Bienvenue ' . $_SESSION[KEY_UER_CONNECT]['nom'] . ' ' . $_SESSION[KEY_UER_CONNECT]['prenom'] ?>

        </div>
    </div>
</div>