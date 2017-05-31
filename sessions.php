<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 01/04/2017
 * Time: 11:24
 */
// Inialize session
session_start();

// Check, if user is already login, then jump to secured page
if (isset($_SESSION['userid']) && isset($_SESSION['category'])) {
    switch($_SESSION['category']) {
        case 1:
            header('location:powner/index.php');//redirect to client page
            break;
        case 2:
            header('location:user/index.php');//redirect to  page
            break;
        case 4:
            header('location:admin/index.php');//redirect to  page
            break;

    }
}elseif(!isset($_SESSION['userid']) && !isset($_SESSION['category'])) {
    header('Location:index.php');
}
else
{

    header('Location:index.php');
}

?>