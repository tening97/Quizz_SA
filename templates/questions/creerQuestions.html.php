<?php
require_once(PATH_VIEWS . "include" . DIRECTORY_SEPARATOR . "header.inc.html.php");

?>

<link rel="stylesheet" href="<?= WEBROOT . "css" . DIRECTORY_SEPARATOR . "style.creerQuestions.css" ?>">



<h1 class="parametrer">PARAMÈTRER VOTRE QUESTIONS</h1>
<div class="container2">
    <div class="creerQuestion">
        <form action="<?= WEBROOT ?>" method="post">
            <input type="hidden" name="controller" value="questions">
            <input type="hidden" name="action" value="creer.questions">
            <div class="parametre">
                <label for="text">Questions</label>
                <textarea name="text" id="text" cols="50" rows="5"></textarea>
                <!-- <input type="text" name="text" id="text"> -->
            </div>

            <div class="parametre">
                <label for="">Nbre de points</label>
                <input type="number" name="nbrePoints" min="1" id="nbrePoints" class="nbrePoints">
            </div>

            <div class="parametre">
                <label for="typeReponse">Type de réponse</label>
                <select name="typeReponse" id="typeReponse">
                    <option disabled selected>Donnez le type de réponse</option>
                    <option value="opt1" id="opt1">Réponses multiples</option>
                    <option value="opt2" id="opt2">Réponse unique</option>
                    <option value="opt3" id="opt3">Réponse texte</option>
                </select>
                <div class="ajouter">
                    <button id="btn" type="button">+</button>
                </div>
            </div>

            <div class="generate" id="generate">

            </div>




    </div>
    <div class="saver">
        <button class="save">Enregistrer</button>
    </div>
    </form>
</div>

<script src="<?= WEBROOT . "js" . DIRECTORY_SEPARATOR . "creerQuestions.js" ?>"></script>