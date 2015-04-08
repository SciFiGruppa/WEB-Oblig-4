<?php
    require_once 'User.php';
    session_start();
    if (isset($_POST['login'], $_POST['username'], $_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $user = new User($username, $password);
        var_dump($user->checkUser());
        //header("Location: ../../index.php");
    } else {
        header("Location: ../../login.php");
    }