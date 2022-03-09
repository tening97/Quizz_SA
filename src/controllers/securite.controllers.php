<?php
require_once(PATH_SRC . "models" . DIRECTORY_SEPARATOR . "user.models.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_REQUEST['action'])) {
        if ($_REQUEST['action'] == "connexion") {
            $login = $_POST['login'];
            $password = $_POST['password'];
            $_SESSION['info_con']['login'] = $login;
            $_SESSION['info_con']['password'] = $password;
            connexion($login, $password);
        }
    }
    if ($_REQUEST['action'] == "inscription") {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $login = $_POST['login'];
        $password = $_POST['password'];
        $password1 = $_POST['password1'];
        $photo = $_FILES['fichier']['tmp_name'];
        $temp_name = $_FILES['fichier']["name"];
        //$_SESSION['temp_name'] = $temp_name;

        //Garder les donnees saisies au cas ou il ya erreur
        $_SESSION['info_temp']['nom'] = $nom;
        $_SESSION['info_temp']['prenom'] = $prenom;
        $_SESSION['info_temp']['login'] = $login;
        $_SESSION['info_temp']['photo'] = $photo;


        inscrire($nom,  $prenom, $login, $password, $password1, $photo, $temp_name);
    }
}
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_REQUEST['action'])) {
        if ($_REQUEST['action'] == "connexion") {
            require_once(PATH_VIEWS . "securite" . DIRECTORY_SEPARATOR . "connexion.html.php");
        } elseif ($_REQUEST['action'] == "deconnexion") {
            logout();
        } elseif ($_REQUEST['action'] == "inscription") {
            require_once(PATH_VIEWS . "securite" . DIRECTORY_SEPARATOR . "inscription.html.php");
        }
    } else {
        require_once(PATH_VIEWS . "securite" . DIRECTORY_SEPARATOR . "connexion.html.php");
    }
}

function connexion(string $login, string $password): void
{
    $errors = [];
    champ_obligatoire('login', $login, $errors);
    if (!isset($errors['login'])) {
        valid_email('login', $login, $errors);
    }

    champ_obligatoire('password', $password, $errors);
    if (!isset($errors['password'])) {
        valid_password('password', $password, $errors);
    }
    if (count($errors) == 0) {
        //Appel d'ne fonction  du models
        $user = find_user_login_password($login, $password);
        if (count($user) != 0) {
            //Utilisateur Existe

            $_SESSION[KEY_UER_CONNECT] = $user;
            //?controller=user&action=connexion 
            header("location:" . WEBROOT . "?controller=user&action=accueil ");
            exit();
        } else {
            //Utilisateur n'existe pas 
            $errors['connexion'] = "Login ou Mot de pass Incorrect";
            $_SESSION[KEY_ERROR] = $errors;
            header("location:" . WEBROOT);
            exit();
        }
    }
    //Erreur de validation
    else {
        $_SESSION[KEY_ERROR] = $errors;
        header("location:" . WEBROOT);
        exit();
    }
}


function logout()
{
    session_destroy();
    header("location:" . WEBROOT);
    exit();
}
function inscrire(string $nom, string $prenom, string $login, string $password, string $password1, string $temp_name, string $photo)
{
    $errors = [];
    $tab = [];
    champ_obligatoire('nom', $nom, $errors);
    if (!isset($errors['nom'])) {
        $tab['nom'] = $nom;
    }
    champ_obligatoire('prenom', $prenom, $errors);
    if (!isset($errors['prenom'])) {
        $tab['prenom'] = $prenom;
    }
    champ_obligatoire('login', $login, $errors);
    if (!isset($errors['login'])) {
        valid_email('login', $login, $errors);
        $tab['login'] = $login;
    }
    champ_obligatoire('password', $password, $errors);
    if (!isset($errors['password'])) {
        valid_password('password', $password, $errors);
        $tab['password'] = $password;
    }

    champ_obligatoire('password1', $password1, $errors);
    /* if (!isset($errors['password1'])) {
        valid_password('password1', $password1, $errors);
    } */
    champ_obligatoire('photo', $photo, $errors);
    if (!isset($errors['photo'])) {
        $tab['photo'] = $photo;
    }


    if ($photo != "") {

        move_uploaded_file($temp_name, PATH_UPLOAD . $photo);
    }

    if (count($errors) == 0) {

        if (!find_users_login($login)) {
            if ($password == $password1) {
                if (!isset($_SESSION[KEY_UER_CONNECT])) {
                    $tab['role'] = "ROLE_JOUEUR";
                    $tab['score'] = 0;
                } else {
                    $tab['role'] = "ROLE_ADMIN";
                    $tab['score'] = 0;
                }

                array_to_json("users", $tab);
                if (!isset($_SESSION[KEY_UER_CONNECT])) {
                    header("location:" . WEBROOT . "?controller=securite&action=connexion");
                } else {
                    header("location:" . WEBROOT . "?controller=user&action=accueil");
                }
            } else {
                $errors['confirmation'] = "Les mots de passe ne correspondent pas";
                $_SESSION[KEY_ERROR] = $errors;
                header("location:" . WEBROOT . "?controller=securite&action=inscription");
                exit();
            }
        } else {
            $errors['error_login'] = "Le login existe déjà";
            $_SESSION[KEY_ERROR] = $errors;
            if (!isset($_SESSION[KEY_UER_CONNECT])) {
                header("location:" . WEBROOT . "?controller=securite&action=inscription");
            } else {
                header("location:" . WEBROOT . "?controller=user&action=creer.admin");
            }
        }
    } else {
        /*  if (!find_users_login($login)) {
            $errors['error_login'] = "Le login existe déjà";
            $_SESSION[KEY_ERROR] = $errors;
            header("location:" . WEBROOT . "?controller=securite&action=inscription ");
            exit();
        } */
        $_SESSION[KEY_ERROR] = $errors;
        header("location:" . WEBROOT . "?controller=securite&action=inscription ");
        exit();
    }
}
