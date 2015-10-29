<?php
/**
 * Author : Brijender Parta Rana, Choongyeol Kim
 * Date Created : 26 August 2015
 * Date Modified :
 */

require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/Entity/Account.php';

if (isset($_SESSION[USER_INFO]))
{
	$user = getUserInfo();
}
//$role = $user->getRole();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $title; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="../Css/bootstrap.css" rel="stylesheet">

     <!-- Bootstrap Core CSS -->
    <link href="../Css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../Css/style.css" rel="stylesheet">

     <!-- Custom CSS -->
    <link href="../Css/styleouter.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../Css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!--<script type="text/javascript" src="../js/jquery.js"></script>-->

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="../js/dataTables.bootstrap.js"></script>

    <link rel="stylesheet" href="../Css/bootstrapValidator.min.css"/>
    <script type="text/javascript" src="../js/bootstrapValidator.min.js"></script>
</head>

<body>
   <div id="wrapper" style="padding: 0;">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">VU Library</a>
            </div>
            <ul>
<?php
if ( isset($_SESSION[USER_INFO])) {
?>
                <li class="dropdown" style="float: right; margin-top: 13px; margin-right: 50px">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-user"></i><?php $user->getName(); ?><b class="care"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i>Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i>Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i>Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="./Logout.php"><i class="fa fa-fw fa-power-off"></i>Log Out</a>
                        </li>
                    </ul>
                </li>
<?php
}
else
{
?>
                <li class="dropdown" style="float: right; margin-top: 13px; margin-right: 50px">
                    <a href="./index.php"><i class="fa fa-fw fa-power-off"></i>Log in</a>
                </li>
<?php
}
?>
            </ul>
            <!-- /.nav   bar-collapse -->
        </nav>
<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
?>
        <div id="page">
            <div class="emteyHeader">
            </div>
            <nav class="main-Navigation" role="navigation">
                <ul id="secondary-links" class="navClass menu secondary-links">
                    <li class="item-1 dropdown  mlid-13688 menu-study-with-us dropdown-standard first" id="dropdown-li-study-with-us">
                        <a href="./MainDashBoard.php">Book Search</a>
                    </li>
                    <li class="item-2 dropdown  mlid-13790 menu-student-life dropdown-standard" id="dropdown-li-student-life">
                        <a href="./MyAccount.php">My Account</a>
                    </li>
                    <li class="item-3 dropdown  mlid-13894 menu-research dropdown-standard" id="dropdown-li-research">
                        <a href="./aboutus.php">About us</a> <div class="dropdown-menu mega-menu open" id="dropdown-menu-research">
                    </li>
                    <!--<li class="item-4 dropdown  mlid-14008 menu-industry-community dropdown-standard" id="dropdown-li-industry-community">
                        <a href="/industry-community">Industry &amp; community</a>
                    </li>
                    <li class="item-5 dropdown  mlid-14020 menu-success-stories last" id="dropdown-li-success-stories">
                        <a href="/success-stories">Success stories</a>
                    </li>-->
                </ul>
            </nav>
