<?php
function is_logged_in()
{
    return isset($_SESSION['logged']) && $_SESSION['logged'] === true;
}

function is_admin()
{
    return is_logged_in() && $_SESSION['role'] === 'admin';
}

function logout_user()
{
    $_SESSION = [];
    session_destroy();
    session_unset();
}
