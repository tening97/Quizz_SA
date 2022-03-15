<?php

if (isset($_SESSION[KEY_ERROR])) {
    $errors = $_SESSION[KEY_ERROR];
    unset($_SESSION[KEY_ERROR]);
}
require_once(PATH_VIEWS . "include" . DIRECTORY_SEPARATOR . "header.inc.html.php");

?>

<link rel="stylesheet" href="<?= WEBROOT . "css" . DIRECTORY_SEPARATOR . "style.creerQuestions.css" ?>">



<h1 class="parametrer">PARAMÈTRER VOTRE QUESTIONS</h1>
<div class="container2">
    <div class="creerQuestion">
        <form action="<?= WEBROOT ?>" method="post" id="forme">
            <input type="hidden" name="controller" value="questions">
            <input type="hidden" name="action" value="creer.questions">
            <div class="parametre">
                <label for="text">Questions</label>
                <textarea name="text" id="text" cols="50" rows="5"></textarea>
                <span style="color: red;"><?= isset($errors['question']) ? $errors['question'] : '' ?></span>

            </div>

            <div class="parametre" id="champPoint">
                <label for="">Nbre de points</label>
                <!-- <input type="number" name="nbrePoints" min="1" id="nbrePoints" class="nbrePoints"> -->
                <input type="text" name="minus" class="minplus" value="-" id="moins" readonly="readonly">
                <input type="text" name="nbrePoints" value="1" id="nbrePoints" class="nbrePoints">
                <input type="text" class="minplus" value="+" id="plus" readonly="readonly">
                <span style=" color: red;"><?= isset($errors['nbrPoints']) ? $errors['nbrPoints'] : '' ?></span>




            </div>

            <div class="parametre">
                <label for="typeReponse">Type de réponse</label>
                <select name="typeReponse" id="typeReponse">
                    <option selected value="opt">Donnez le type de réponse</option>
                    <option value="multiple" id="opt1">Réponses multiples</option>
                    <option value="unique" id="opt2">Réponse unique</option>
                    <option value="text" id="opt3">Réponse texte</option>
                    <span style="color: red;"><?= isset($errors['typeReponse']) ? $errors['typeReponse'] : '' ?></span>

                </select>
                <div class="ajouter">
                    <button id="btn" type="button">+</button>
                </div>
            </div>

            <div class="generate" id="generate">

            </div>




    </div>
    <div class="saver">
        <button class="save" id="btn_enregistrer">Enregistrer</button>
    </div>
    </form>
</div>

<script src="<?= WEBROOT . "js" . DIRECTORY_SEPARATOR . "creerQuestions.js" ?>"></script>