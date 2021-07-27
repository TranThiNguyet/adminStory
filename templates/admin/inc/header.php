<?php
ob_start();
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/adminStory/util/DatabaseConnectUtil.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/adminStory/util/CheckUserUtil.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/adminStory/util/ConstantUtil.php';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AdminCP | VinaEnter Edu</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="/adminStory/templates/admin/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="/adminStory/templates/admin/assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="/adminStory/templates/admin/assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">sun* Inc</a>
            </div>
            <div style="color: white; padding: 15px 50px 5px 50px; float: right; font-size: 16px;">
                <?php
                if (isset($_SESSION['user'])) {
                    $name =  $_SESSION['user']['fullname'];
                ?>
                    Xin chào, <b><?php echo $name; ?></b>
                <?php } ?>
                &nbsp; <a href="/adminStory/auth/logout.php">
                    <img class="exit" src="/adminStory/files/iconexit.png" title="Đăng xuất" />
                </a> </div>
        </nav>
        <!-- /. NAV TOP  -->