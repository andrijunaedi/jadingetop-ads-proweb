<?php
require_once(dirname(__DIR__) . '/models/Users.php');

// Get data email and password from form post and use to login user
if (isset($_POST['submit'])) {
    $email      = $_POST['email'];
    $password   = $_POST['password'];

    $Users = new Users();
    $result = $Users->login($email, $password);

    if ($result['status']) {
        session_start();
        $_SESSION['user'] = $result['data'];
        header('Location: ../dashboard');
    } else {
        echo $result['message'];
    }
}
