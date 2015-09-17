<!DOCTYPE html>
<html lang="en">

<head>
<?php

	$role="Admin";

    ?>
   
     <title> <?php echo( $tital) ?> </title>


    <!-- Bootstrap Core CSS -->
    <link href="../Css/bootstrap.css" rel="stylesheet">

     <!-- Bootstrap Core CSS -->
    <link href="../Css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../Css/style.css" rel="stylesheet">

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

  <!--  <script type="text/javascript" src="../js/jquery.js"></script>-->



  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="../js/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="../js/highcharts.js"></script>

    <script type="text/javascript" src="../js/exporting.js"></script>
</head>

<body>

    <div id="wrapper">

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
                <a class="navbar-brand" href="index.html">VU Library </a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>Brijender P Rana</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>Brijender P Rana</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>Brijender P Rana</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>  Brijender P rana <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
				  <?php

                   if($role=="Admin" or $role=="Lib"){

                    	echo("
							<li class=\"active\">
								<a href=\"maindashboard.php\"><i class=\"fa fa-fw fa-dashboard\"></i> Dashboard</a>
							</li>


							<li>
								<a href=\"CategoryList.php\"><i class=\"fa fa-fw fa-bar-chart-o\"></i> Categories</a>
							</li>

							 <li>
								<a href=\"Authorlist.php\"><i class=\"fa fa-edit\"></i> Author</a>
							</li>
                             <li>
								<a href=\"Publisherlist.php\"><i class=\"fa fa-share-square-o\"></i> Publisher</a>
							</li>
							 <li>
								<a href=\"SectionList.php\"><i class=\"fa fa-fw fa-wrench\"></i>Section</a>
							</li>
							<li>
								 <a href=\"javascript:;\" data-toggle=\"collapse\" data-target=\"#books\"><i class=\"fa fa-fw fa-arrows-v\"></i> Books <i class=\"fa fa-fw fa-caret-down\"></i></a>
								<ul id=\"books\" class=\"collapse\">
									<li>
										<a href=\"BookList.php\">Books</a>
									</li>
									<li>
										<a href=\"#\">Issue Books</a>
									</li>
									<li>
										<a href=\"bookreturn.php\">Return Books</a>
									</li>
									<li>
										<a href=\"#\">Reserve Books</a>
									</li>
								</ul>
							</li>
							 
								".(($role=="Admin")?(
										"<li>
											<a href=\"userlist.php\"><i class=\"fa fa-fw fa-edit\"></i> User</a>
										</li>"
								):""
								)."
							
							<li>
								<a href=\"bootstrap-elements.html\"><i class=\"fa fa-fw fa-desktop\"></i> Fines</a>
							</li>
						
										".(($role=="Admin")?(
											"<li>
												<a href=\"javascript:;\" data-toggle=\"collapse\" data-target=\"#fine\"><i class=\"fa fa-fw fa-arrows-v\"></i> Reports <i class=\"fa fa-fw fa-caret-down\"></i></a>
												<ul id=\"fine\" class=\"collapse\">
													<li>
														<a href=\"#\">Fine Report</a>
													</li>
													<li>
														<a href=\"#\">Books Report</a>
													</li>
												</ul>
										   </li>"
									):"" 
								)."


                    ");
                   } else{

                    	echo("
							<li class=\"active\">
								<a href=\"myaccount.php\"><i class=\"fa fa-fw fa-dashboard\"></i> My Account</a>
							</li>


							<li>
								<a href=\"myBook.php\"><i class=\"fa fa-fw fa-bar-chart-o\"></i> My Books</a>
							</li>

							 <li>
								<a href=\"myFine.php\"><i class=\"fa fa-edit\"></i> My Fine Dues</a>
							</li>

							</li>





                    ");
                   }
                   ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
        <?php
               ini_set('display_errors',1);
            ini_set('display_startup_errors',1);
            error_reporting(-1);
            ?>
        <div id="page-wrapper">