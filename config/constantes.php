<?php
//  define("ROOT",str_replace("public".DIRECTORY_SEPARATOR.index.php,"",$_SERVER['SCRIPT_FILENAME'])); 
// var_dump(ROOT)
define("ROOT", str_replace("public" . DIRECTORY_SEPARATOR . "index.php", "", $_SERVER['SCRIPT_FILENAME']));

//Chemin  vers src
define("PATH_SRC", ROOT . "src" . DIRECTORY_SEPARATOR);
//Chemin vers templates
define("PATH_VIEWS", ROOT . "templates" . DIRECTORY_SEPARATOR);
//Chemin vers le fichier json
define("PATH_DB", ROOT . "data" . DIRECTORY_SEPARATOR . "db.json");

// Chemin sur le dossier public , pour inclusion des images,css et js*/
define("WEBROOT", str_replace("index.php", "", $_SERVER['SCRIPT_NAME']));
/**
 * Chemin sur l'action des formulaires
 */
//Constantes d'erreurs
define("KEY_ERROR", "errors");
define("KEY_UER_CONNECT", "user-connect");
