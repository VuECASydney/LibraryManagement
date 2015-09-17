<!--
Author : Brijender Parta Rana
Date Created:21 August 2015
Date Modified :

-->


<?php
		$tital="Add User";
		include("./shared/Header.php");
?>

  <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                             Add User
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                             <li>
                                <i class="fa fa-fw fa-bar-chart-o"></i>  <a href="Userlist.php">User</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i>  Add User
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">

                    <div class="col-lg-12">

                           <form class="form-horizontal" role="form">
                              <div class="form-group">

                                <label class="control-label col-sm-2">Staff/Student </label>

                                 <div class="col-sm-10">
                                     <select class="form-control">
                                        <option>Student</option>
                                        <option>Staff</option>

                                    </select>
                                </div>


                            </div>
                            <div class="form-group">

                                <label class="control-label col-sm-2">Barcode </label>

                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" >
                                </div>


                            </div>
                            <div class="form-group">
                             <label class="control-label col-sm-2">Virtual id</label>

                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" >
                                </div>

                            </div>
                             <div class="form-group">
                             <label class="control-label col-sm-2">Name</label>

                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" >
                                </div>

                            </div>
                             <div class="form-group">
                             <label class="control-label col-sm-2">Address</label>

                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" >
                                </div>

                            </div>
                              <div class="form-group">
                             <label class="control-label col-sm-2">Phone Number</label>

                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" >
                                </div>

                            </div>
                              <div class="form-group">
                             <label class="control-label col-sm-2">Email</label>

                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" >
                                </div>

                            </div>
                             <fieldset class="scheduler-border">
                        <legend class="scheduler-border">User Information</legend>
                 <div class="row">

                    <div class="col-lg-12">



                            <div class="form-group">

                                <label class="control-label col-sm-2">User Name</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="email" >
                                </div>


                            </div>
                            <div class="form-group">

                                <label class="control-label col-sm-2">Password</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="email" >
                                </div>


                            </div>









                    </div>

                </div>
                <!-- /.row -->
                    </fieldset>

                            <button type="submit" class="btn btn-default">Submit Button</button>
                            <button type="reset" class="btn btn-default">Reset Button</button>

                        </form>


                    </div>

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->



<?php
	include("./shared/Footer.php");
?>