<?php
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $_SESSION['message_error_username'] = '';
    $_SESSION['message_error_password'] = '';
    $_SESSION['message_error_result'] = '';
    $username = '';
    $password = '';

    if ($_POST['username'] == '') {
        $_SESSION['message_error_username'] = 'Tolong isi username';
        return header('Location: http://localhost/basic_php/');
    } else if ($_POST['password'] == '') {
        $_SESSION['message_error_password'] = 'Tolong isi password';
        return header('Location: http://localhost/basic_php/');
    }
    $username = $_POST['username'];
    $password = $_POST['password'];

    login($username, $password);
}

function login($username, $password) // function paramaternya required
{
    if ($username != 'Mas Burhan') {
        $_SESSION['message_error_username'] = 'Username invalid';
        return header('Location: http://localhost/basic_php/');
    }
    if ($password != '123') {
        $_SESSION['message_error_password'] = 'Password invalid';
        return header('Location: http://localhost/basic_php/');
    }
}
