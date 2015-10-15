<?php
/**
 * Author : Brijender Parta Rana, Choongyeol Kim
 * Date Created : 21 August 2015
 * Date Modified : 
 */

$title = 'Add User';
require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/View/Shared/Header.php';
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
                                <i class="fa fa-dashboard"></i><a href="DashBoard.php">Dashboard</a>
                            </li>
                            <li>
                                <i class="fa fa-fw fa-bar-chart-o"></i><a href="UserList.php">User</a>
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
                        <form class="form-horizontal" role="form" action="AddUserOk.php" method="post">
                            <div class="form-group">
                                <label class="control-label col-sm-2">Student/Staff</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="userType">
                                        <option>Student</option>
                                        <option>Faculty</option>
										<option>Librarian</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="userName" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Address</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="address" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Phone Number</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="phone" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="email" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Year</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="enrollYear" />
                                </div>
                            </div>
                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border">User Information</legend>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">Password</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="userPassword" />
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
require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/View/Shared/Footer.php';
?>