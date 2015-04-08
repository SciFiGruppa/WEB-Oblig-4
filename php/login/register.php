<?php
    require_once 'User.php';
    session_start();
    if (isset($_POST['username'], $_POST['password'], $_POST['password_confirm'], $_POST['register'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password_confirm = $_POST['password_confirm'];

        if ($password == $password_confirm) {
            $user = new User($username, $password);

            if ($user->create()) {
                echo "User created!";
            } else {
                echo "A user with this username is already registered.";
            }

        } else {
            echo "Double check your password.";
        }
    }