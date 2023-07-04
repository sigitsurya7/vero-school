<?php
    //require_once "../config/setting.php";
    // Check User Login
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
        // User is logged in, check their role
        switch ($_SESSION['role']) {
        case 'admin':
            // User is an admin, display the admin Menu
            include 'admin-menu.php';
            break;
        case 'operator':
            // User is an Operator, display the user Menu
            include 'operator-menu.php';
            break;
        case 'siswa':
            // User is an Operator, display the user Menu
            include 'siswa-menu.php';
            break;
        case 'tu':
            // User is an Operator, display the user Menu
            include 'tu-menu.php';
            break;
        case 'kesiswaan':
            // User is an Operator, display the user Menu
            include 'kesiswaan-menu.php';
            break;
        case 'perpustakaan':
            // User is an Operator, display the user Menu
            include 'perpustakaan-menu.php';
            break;
        case 'wali':
            // User is an Operator, display the user Menu
            include 'siswa-menu.php';
            break;
        case 'guru':
            // User is an Operator, display the user Menu
            include 'guru-menu.php';
            break;
        default:
            // Unknown role, display an error message
            echo WARNING;
            break;
        }
    } else {
        // User is not logged in, display the login form
        echo WARNING;
    }

?>