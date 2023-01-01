<?php
// Validate user session 
function validateUserSession()
{
    session_start();
    if (!isset($_SESSION['user'])) {
        header('Location: /login.php');
    }
}
