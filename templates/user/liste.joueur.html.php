<link rel="stylesheet" href="<?= WEBROOT . "css" . DIRECTORY_SEPARATOR . "style.liste_joueur.css" ?>">


<h4>LISTE DES JOUEURS PAR SCORE</h4>
<div class="cont">
    <div class="tabjoueurs">
        <table>
            <tr id="entete">
                <td><b>NOM</b> </td>
                <td><b>PRENOM</b></td>
                <td><b>SCORE</b></td>
            </tr>


            <?php

            foreach ($data as $value) { ?>

                <tr class="tr_valeur">
                    <td><?= $value["nom"] ?></td>
                    <td><?= $value["prenom"] ?></td>
                    <td><?= $value["score"] . "pts" ?></td>
                </tr>




            <?php
            }
            ?>

        </table>
    </div>
    <div class="suivante">
        <a href="#" class="next" id="precedent">PRECEDENT</a>

        <a href="#" class="next" id="suivant">SUIVANT</a>

    </div>
</div>
<script src="<?= WEBROOT . "js" . DIRECTORY_SEPARATOR . "listeJoueur.js" ?>"></script>