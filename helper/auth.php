<?php
// Validate user session 
function validateUserSession()
{
    session_start();
    if (!isset($_SESSION['user'])) {
        header('Location: ../login.php');
    }
}

// Validate user session role as mitra
function validateUserSessionRoleMitra()
{
    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'mitra') {
        header('Location: ../dashboard');
    }
}

// Validate user session exist
function validateUserSessionExist()
{
    session_start();
    if (isset($_SESSION['user'])) {
        header('Location: ../dashboard');
    }
}
