<?php

function champ_obligatoire(string $key, string $data, array &$errors, string
$message = "ce champ est obligatoire")
{
    if (empty($data)) {
        $errors[$key] = $message;
    }
}
function valid_email(string $key, string $data, array &$errors, string $message = "L'Email
saisi est invalide")
{
    if (!filter_var($data, FILTER_VALIDATE_EMAIL)) {
        $errors[$key] = $message;
    }
}
function valid_password(string $key, string $data, array &$errors, string
$message = "Le mot de passe saisi n'est pas correcte")
{
    if (!preg_match("/[a-zA-Z]/", $data) || !preg_match("/[0-9]/", $data) || ($data < 6)) {
        $errors[$key] = $message;
    }
}
