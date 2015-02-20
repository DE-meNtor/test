<?php

/*
function checkLP($login, $password)
{
    $users = ['den' => '123', 'bill' => '3333', 'gilbert' => '111'];
    return (isset($login) && isset($password)) && (isset($users[$login]) && $users[$login] == $password);
}
*/

// Авторизация пользователя ////////////////////////////////////////////////////

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

// Работа с изображениями //////////////////////////////////////////////////////

function image_all()
{
    $q = 'SELECT * FROM images';
    return sql_query($q);
}

// База данных /////////////////////////////////////////////////////////////////

function sql_connect()
{
    mysql_connect('localhost', 'root', '');
    mysql_select_db('test');
}

function sql_query($q)
{
    sql_connect();
    $res = mysql_query($q);
    $ret = [];
    while (FALSE !== $row = mysql_fetch_assoc($res)){
        $ret[] = $res;
    }
    return $ret;
}

// Работа с файлами ////////////////////////////////////////////////////////////

function file_upload($f){
    if (empty($_FILES))
        return false;
    if (0 != $_FILES[$f]['error'])
        return false;
    if (is_uploaded_file($_FILES[$f]['tmp_name'])){
        $res = move_uploaded_file(
            $_FILES[$f]['tmp_name'],
            __DIR__ . '../img/' . $_FILES[$f]['name']);
        if (!$res) {
            return false;
        } else {
            return '/img/' . $_FILES[$f]['name'];
        }
    }
    return false;
}