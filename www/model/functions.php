<?php

/*
function checkLP($login, $password)
{
    $users = ['den' => '123', 'bill' => '3333', 'gilbert' => '111'];
    return (isset($login) && isset($password)) && (isset($users[$login]) && $users[$login] == $password);
}
*/

function auth($login)
{
    setcookie('auth', $login, time()+86400);
}

function is_user()
{
    return isset($_COOKIE['auth']);
}

function get_user()
{
    return $_COOKIE['auth'];
}

function logout()
{
    unset ($_COOKIE['auth']);
    setcookie('auth', '', time()-86400);
}