<?php
require_once(PATH_SRC . "models" . DIRECTORY_SEPARATOR . "question.models.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_REQUEST['action'])) {
        if ($_REQUEST['action'] == 'creer.questions') {

            $text = $_POST['text'];
            $nbrePoints = $_POST['nbrePoints'];
            $typeReponse = $_POST['typeReponse'];
            if ($typeReponse == 'opt') {
                $valInput = '';
                $choix = '';
            } else {

                $valInput = $_POST['nameInput'];
            }
            if ($typeReponse == 'text') {
                $choix = '';
            } else {
                $choix = $_POST['choice'];
            }
            createQuestion($text, $nbrePoints, $typeReponse, $choix, $valInput);
        }
    }
}



if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_REQUEST['action'])) {
        if ($_REQUEST['action'] == 'creer.question') {
            creerQuestion();
        } elseif ($_REQUEST['action'] == "liste.question") {
            listeQuestion();
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
function listeQuestion()
{
    ob_start();
    require_once(PATH_VIEWS . "questions" . DIRECTORY_SEPARATOR . "listeQuestions.html.php");
    $content_for_views = ob_get_clean();
    require_once(PATH_VIEWS . "user" . DIRECTORY_SEPARATOR . "accueil.html.php");
}


function createQuestion(string $text, string $nbrePoints, $typeReponse, array | string $choix, array $valInput)
{
    $tab = [];
    $errors = [];
    champ_obligatoire('question', $text, $errors);
    if (!is_numeric($nbrePoints)) {
        $errors['nbrPoints'] = "Veuillez entrez un nombre positif";
    }
    if ($typeReponse == "opt") {
        $errors['typeReponse'] = "Veuillez choisir un type de reponse";
    }


    if (count($errors) == 0) {
        $tab['question'] = $text;
        $tab['nbrePoints'] = $nbrePoints;
        $tab['typeReponse'] = $typeReponse;
        $tab['reponseCorrecte'] = $choix;
        $tab['reponses'] = $valInput;
        array_to_json("questions", $tab);
        header("location:" . WEBROOT . "?controller=user&action=accueil");
    } else {
        $_SESSION[KEY_ERROR] = $errors;
        header("location:" . WEBROOT . "?controller=questions&action=creer.question");
        exit();
    }
}
