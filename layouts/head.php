<?php
    // include language configuration file based on selected language
    $lang = "en";
    if (isset($_GET['lang'])) {
    $lang = $_GET['lang'];
        $_SESSION['lang'] = $lang;
    }
    if( isset( $_SESSION['lang'] ) ) {
        $lang = $_SESSION['lang'];
    }else {
        $lang = "en";
    }
    require_once ("../assets/lang/" . $lang . ".php");
    
    require_once "../config/db.php";
    require_once "../config/get.php";
    require_once '../config/auth.php';

?>
<!DOCTYPE html>
<html lang="<?php echo $lang ?>">
<head>
    <title><?php echo APP_NAME ?></title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="VeroApps Schools" name="description"/>
    <meta content="Lysca" name="author"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <?php require_once 'head-style.php' ?>
</head>
<body>

<div id="layout-wrapper">

    <?php require_once 'menu.php'; ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18"><?php echo strtoupper($file2); ?></h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo strtoupper($dir); ?></a></li>
                                    <li class="breadcrumb-item active"><?php echo strtoupper($file2); ?></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            