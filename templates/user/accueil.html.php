<?php
require_once(PATH_VIEWS . "include" . DIRECTORY_SEPARATOR . "header.inc.html.php");

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
                <div class="info"></div>
                <div class="avatar">
                    <img class="avatar1" src="<?= WEBROOT . "uploads" . DIRECTORY_SEPARATOR . "avatar.jpg" ?>" alt="" width="90%" height="90%">
                </div>
            </div>
            <div class="corpsnav">
                <?php if (is_admin()) { ?>
                    <ul>
                        <li>
                            <span> <a href="">Liste des Questions</a></span>
                            <img src="img/ic-liste.png" alt="">
                        </li>
                        <li>
                            <span> <a href="<?= WEBROOT . "?controller=user&action=creer.admin" ?>"> Créer Admin</a></span>
                            <img src="img/ic-ajout.png" alt="">
                        </li>
                        <li>
                            <span><a href="<?= WEBROOT . "?controller=user&action=liste.joueur" ?>">Liste des joueurs</a></span>
                            <img src="img/ic-liste.png" alt="">
                        </li>
                        <li>
                            <span>Créer Questions</span>
                            <img src="img/ic-ajout.png" alt="">
                        </li>
                    <?php } ?>
                    </ul>
            </div>
        </div>
        <div class="bloc-info">
            <?= isset($content_for_views) ? $content_for_views : 'Bienvenue ' . $_SESSION[KEY_UER_CONNECT]['nom'] . ' ' . $_SESSION[KEY_UER_CONNECT]['prenom'] ?>

        </div>
    </div>
</div>