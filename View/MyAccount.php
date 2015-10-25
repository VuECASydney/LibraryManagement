<?php /**
 * Author : Brijender Parta Rana
 * Date Created : 21 August 2015
 * Date Modified :
 */
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title> <?php echo($title) ?> </title>

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


    <?php
     require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/DatabaseLogic/DBConnection.php';

    // this is bcz same header using by login page and account page
    //Just quick fix



      require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/Entity/Account.php';
    if (!isset($_SESSION[USER_INFO]))
	{
		header('Location: index.php');
		exit();
	}
      ?>
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
                <a class="navbar-brand" href="index.html">VU Library </a>
            </div>

             <ul>
             <?php







             $user = getUserInfo();
            $role = $user->getRole();
            $conn = DBConnection::getConnection($role);
            $book = NULL;
            if ($conn)
            {
                $id = $user->getId();
            	$Loanbooks = $conn->getBookByBorrowerid($id);
                $fineLog=$conn->getFineByBorrowerid($id);

            }



             if( isset($_SESSION[USER_INFO])){
                   echo("   <li class=\"dropdown\" style=\"float: right;margin-top: 13px;margin-right: 50px\">
                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"><i class=\"fa fa-user\"></i>
                    ".  ($user->getName()) ."<b class=\"care\"></b></a>
                    <ul class=\"dropdown-menu\">
                        <li>
                            <a href=\"#\"><i class=\"fa fa-fw fa-user\"></i>Profile</a>
                        </li>
                        <li>
                            <a href=\"#\"><i class=\"fa fa-fw fa-envelope\"></i>Inbox</a>
                        </li>
                        <li>
                            <a href=\"#\"><i class=\"fa fa-fw fa-gear\"></i>Settings</a>
                        </li>
                        <li class=\"divider\"></li>
                        <li>
                            <a href=\"./Logout.php\"><i class=\"fa fa-fw fa-power-off\"></i>Log Out</a>
                        </li>
                    </ul>
                </li>  ")     ;


                }
                else
                {
                   echo("   <li class=\"dropdown\" style=\"float: right;margin-top: 13px;margin-right: 50px\">
                                   <a href=\"./index.php\"><i class=\"fa fa-fw fa-power-off\"></i>Log in</a>
                        </li>");

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
                                 <a href="./mainDashBoard.php">Book Search</a>

                        </li>
                        <li class="item-2 dropdown  mlid-13790 menu-student-life dropdown-standard" id="dropdown-li-student-life">
                                <a href="./myaccount.php">My Accounts</a>

                        </li>
                        <li class="item-3 dropdown  mlid-13894 menu-research dropdown-standard" id="dropdown-li-research">
                                <a href="./aboutus.php">About us</a> <div class="dropdown-menu mega-menu open" id="dropdown-menu-research">

                        </li>
                    <!--    <li class="item-4 dropdown  mlid-14008 menu-industry-community dropdown-standard" id="dropdown-li-industry-community">
                                <a href="/industry-community">Industry &amp; community</a>

                        </li>
                        <li class="item-5 dropdown  mlid-14020 menu-success-stories last" id="dropdown-li-success-stories">
                                <a href="/success-stories">Success stories</a>
                        </li> -->
                    </ul>
                </nav>


    <script type="text/javascript" src="../js/dataTables.bootstrap.js"></script>
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                             My Account
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                <ul class="nav nav-tabs">
                      <li class="active"><a href="#myaccount"  data-toggle="tab">My Account</a></li>
                      <li >
                        <a  href="#books"  data-toggle="tab">My Books    </a>

                      </li>
                      <li><a href="#fines"  data-toggle="tab">My Fines</a></li>

                </ul>
                 <div class="tab-content">
                        <div id="myaccount" class="tab-pane fade in active">
                          <h3>My Account</h3>
                          <p>
                          <div class="row">
                            <div class="col-lg-12">
                                <form class="form-horizontal" role="form">
                                    <div class="form-group">
                                        <label class="control-label col-sm-2">ID</label>
                                        <div class="col-sm-10">
                                            <p class="form-control-static"><?php echo $user->getId(); ?></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2">Name</label>
                                        <div class="col-sm-10">
                                            <p class="form-control-static"><?php echo $user->getName(); ?></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
        							    <label class="control-label col-sm-2">Address</label>
                                        <div class="col-sm-10">
                                            <p class="form-control-static"><?php echo $user->getAddress(); ?></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2">Phone</label>
                                        <div class="col-sm-10">
                                            <p class="form-control-static"><?php echo $user->getPhone(); ?></p>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="control-label col-sm-2">Email</label>
                                        <div class="col-sm-10">
                                            <p class="form-control-static"><?php echo $user->getEmail(); ?></p>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-default">Submit Button</button>
                                    <button type="reset" class="btn btn-default">Reset Button</button>
                                </form>
                            </div>
                        </div>
                        </p>
                        <!-- /.row -->
                        </div>
                           <div id="books" class="tab-pane fade">
                           <div class="row">
                    <div class="col-lg-12">
                        <table id="tblbook" class="table table-striped table-hover table-users" cellspacing="0" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>Book Number</th>
                                    <th>Book Name</th>
                                    <th>Isbn</th>
                                    <th>Publisher Name</th>
                                    <th>Category Name</th>
                                    <th>Date Issue</th>
                                    <th>Due Date</th>
                                </tr>
                            </thead>
                            <tbody>
<?php
if ($Loanbooks)
{
	$iter = $Loanbooks->iterator();
	foreach ($iter as $key => $value) {
?>
                                <tr>
                                    <td><?php echo $value->getlogId(); ?></td>
                                    <td><?php echo $value->getTitle(); ?></td>
                                    <td><?php echo $value->getIsbn(); ?></td>
                                    <td><?php echo $value->getPublisherName(); ?></td>
                                    <td><?php echo $value->getCategoryName(); ?></td>
                                     <td><?php echo $value->getDateIssue(); ?></td>
                                    <td><?php echo $value->getDateDue(); ?></td>
                                </tr>
<?php
	}
}
?>
                            </tbody>
                        </table>
                        <script type="text/javascript">
                            $(document).ready(function () {
                                $('#tblbook').dataTable({
                                    "iDisplayLength": 10,
                                    "lengthMenu": [10, 25, 50, 100]
                                });
                            });
                            $('#tblContact_length').visible=false;
                        </script>
                    </div>
                </div>
                <!-- /.row -->
                           </div>
                            <div id="fines" class="tab-pane fade">
                             <div class="row">
                    <div class="col-lg-12">
                        <table id="tblfine" class="table table-striped table-hover table-users" cellspacing="0" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>Fine Id</th>
                                    <th>Book Name</th>
                                    <th>Amount</th>
                                    <th>Due Date</th>
                                    <th>Return Date</th>
                                    <th>Payment Date</th>

                                </tr>
                            </thead>
                            <tbody>
<?php
if ($fineLog)
{
	$iter = $fineLog->iterator();
	foreach ($iter as $key => $value) {
?>
                                <tr>
                                    <td><?php echo $value->getFineId(); ?></td>
                                    <td><?php echo $value->getBookTitle(); ?></td>
                                    <td><?php echo $value->getAmount(); ?></td>
                                    <td><?php echo $value->getDueDate(); ?></td>
                                    <td><?php echo $value->getReturnDate(); ?></td>
                                     <td><?php echo $value->getPaymentDate(); ?></td>

                                </tr>
<?php
	}
}
?>
                            </tbody>
                        </table>
                        <script type="text/javascript">
                            $(document).ready(function () {
                                $('#tblfine').dataTable({
                                    "iDisplayLength": 10,
                                    "lengthMenu": [10, 25, 50, 100]
                                });
                            });
                            $('#tblContact_length').visible=false;
                        </script>
                    </div>
                </div>
                <!-- /.row -->
                           </div>
                     </div>



                 </div>

            </div>
            <!-- /.container-fluid -->
<?php
	require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/View/Shared/Footer.php';
?>