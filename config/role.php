<?php
define("ROLE_JOUEUR", "ROLE_JOUEUR");
define("ROLE_ADMIN", "ROLE_ADMIN");

function is_connect(): bool
{
    return isset($_SESSION[KEY_UER_CONNECT]);
}
function is_joueur()
{
    return is_connect() && $_SESSION[KEY_UER_CONNECT]['role'] == ROLE_JOUEUR;
}
function is_admin()
{
    return is_connect() && $_SESSION[KEY_UER_CONNECT]['role'] == ROLE_ADMIN;
}
