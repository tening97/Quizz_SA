<link rel="stylesheet" href="<?= WEBROOT . "css" . DIRECTORY_SEPARATOR . "style.liste_joueur.css" ?>">



<table>
    <tr>
        <td><b>NOM</b> </td>
        <td><b>PRENOM</b></td>
        <td><b>SCORE</b></td>
    </tr>

    <tr>

        <?php

        foreach ($data as $value) { ?>
            <td><?= $value["nom"] ?></td>
            <td><?= $value["prenom"] ?></td>
            <td><?= $value["score"] . "pts" ?></td>
    </tr>


<?php    }
?>

</table>
</div>