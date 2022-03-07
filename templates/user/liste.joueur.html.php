<link rel="stylesheet" href="<?= WEBROOT . "css" . DIRECTORY_SEPARATOR . "style.liste_joueur.css" ?>">



 <table>
    <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Score</th>
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