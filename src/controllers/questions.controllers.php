<?php
require_once(PATH_SRC . "models" . DIRECTORY_SEPARATOR . "question.models.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_REQUEST['action'])) {
        if ($_REQUEST['action'] == 'creer.questions') {
            $text = $_POST['text'];
            $nbrePoints = $_POST['nbrePoints'];
            $typeReponse = $_POST['typeReponse'];
            creerQuestion();
        }
    }
}



if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_REQUEST['action'])) {
        if ($_REQUEST['action'] == 'creer.question') {
            creerQuestion();
        }
    }
}


function creerQuestion()
{
    ob_start();
    require_once(PATH_VIEWS . "questions" . DIRECTORY_SEPARATOR . "creerQuestions.html.php");
    $content_for_views = ob_get_clean();
    require_once(PATH_VIEWS . "user" . DIRECTORY_SEPARATOR . "accueil.html.php");
}
