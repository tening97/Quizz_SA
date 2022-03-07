<?php
function find_user_login_password(string $login, string $password): array
{
    $users = json_to_array("users");
    foreach ($users as $user) {
        if ($user['login'] == $login && $user['password'] == $password)
            return $user;
    }
    return [];
}
function find_users(string $role): array
{
    $users = json_to_array("users");
    $result = [];
    foreach ($users as $user) {
        if ($user['role'] == $role)
            $result[] = $user;
    }
    return
        $result;
}
function find_users_login(string $login)
{
    $users = json_to_array("users");
    foreach ($users as $user) {
        if ($user['login'] == $login)
            return true;
    }

    return false;
}
