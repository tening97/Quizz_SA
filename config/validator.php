<?php

function champ_obligatoire(string $key, string|array $data, array &$errors, string $message = "ce champ est obligatoire")
{
    if (empty($data)) {
        $errors[$key] = $message;
    }
}
function valid_email(string $key, string $data, array &$errors, string $message = "L'Email saisi est invalide")
{
    if (!filter_var($data, FILTER_VALIDATE_EMAIL)) {
        $errors[$key] = $message;
    }
}
function valid_password(string $key, string $data, array &$errors, string $message = "Le mot de passe saisi n'est pas correcte")
{
    $password = '/^(?=.*[0-9])(?=.*[a-zA-Z])[a-zA-Z0-9!@#$%^&*]{6,}$/';
    if (!preg_match($password, $data)) {

        $errors[$key] = $message;
    }
}
