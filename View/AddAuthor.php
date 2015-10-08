<?php
/**
 * Author : Brijender Parta Rana
 * Date Created : 21 August 2015
 * Date Modified : 
 */

	$title = 'Category List';
	require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/View/Shared/Header.php';
?>

  <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                             Add Author
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                             <li>
                                <i class="fa fa-edit"></i>  <a href="Authorlist.php">Author</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i>  Add Author
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">

                    <div class="col-lg-12">

                           <form class="form-horizontal" role="form">

                            <div class="form-group">

                                <label class="control-label col-sm-2">Author Name</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="Author Name" >
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