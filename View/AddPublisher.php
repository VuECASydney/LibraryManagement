<?php
/**
 * Author : Brijender Parta Rana
 * Date Created : 21 August 2015
 * Date Modified : 
 */

$title = 'Add Publisher';
require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/View/Shared/Header.php';
?>
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Add Publisher
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i><a href="DashBoard.php">Dashboard</a>
                            </li>
                            <li>
                                <i class="fa fa-share-square-o"></i><a href="PublisherList.php">Publisher</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i>Add Publisher
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <form class="form-horizontal" role="form" action="AddPublisherOk.php" method="get">
                            <div class="form-group">
                                <label class="control-label col-sm-2">Publisher Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="publisherName" />
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