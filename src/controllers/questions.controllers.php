<?php
require_once(PATH_SRC . "models" . DIRECTORY_SEPARATOR . "question.models.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_REQUEST['action'])) {
        if ($_REQUEST['action'] == 'creer.questions') {
            /* var_dump($_POST);
            die; */
            $text = $_POST['text'];
            $nbrePoints = $_POST['nbrePoints'];
            $typeReponse = $_POST['typeReponse'];
            $choix = $_POST['choice'];
            $valInput = $_POST['nameInput'];
            createQuestion($text, $nbrePoints, $choix, $valInput);
            require_once(PATH_VIEWS . "user" . DIRECTORY_SEPARATOR . "accueil.html.php");
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


function createQuestion(string $text, int $nbrePoints, array $choix, array $valInput)
{
    $tab = [];

    $tab['question'] = $text;


    $tab['nbrePoints'] = $nbrePoints;


    $tab['choice'] = $choix;
    $tab['reponse'] = $valInput;
    array_to_json("questions", $tab);
}
