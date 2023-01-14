<?php
require_once(dirname(__DIR__) . '/models/Users.php');

// Get data from form post and use to create new user
if (isset($_POST['submit'])) {
    $fullname           = $_POST['fullname'];
    $username           = $_POST['email'];
    $password           = $_POST['password'];
    $confirmpassword    = $_POST['confirmpassword'];

    if ($password != $confirmpassword) {
        echo "Password tidak sama";
        exit;
    }

    $Users = new Users();
    if (isset($_POST['mitra']) && $_POST['mitra'] == 'on') {
        $result = $Users->register($fullname, $username, $password, 'mitra');
    } else {
        $result = $Users->register($fullname, $username, $password);
    }

    if ($result['status']) {
        header('Location: ../login.php');
    } else {
        header('Location: ../register.php?error=' . $result['message']);
    }
}
