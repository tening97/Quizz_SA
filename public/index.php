<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//Charger les constantes
require_once dirname(dirname(__FILE__)) . "/config/constantes.php";
//Charger le validator
require_once dirname(dirname(__FILE__)) . "/config/validator.php";
//Charger le role
require_once dirname(dirname(__FILE__)) . "/config/role.php";
//Charger l'orm
require_once dirname(dirname(__FILE__)) . "/config/orm.php";
require_once(PATH_VIEWS . "include" . DIRECTORY_SEPARATOR . "header.inc.html.php");
//Charger le router
require_once dirname(dirname(__FILE__)) . "/config/router.php";
require_once(PATH_VIEWS . "include" . DIRECTORY_SEPARATOR . "footer.inc.html.php");
