<!--
Author : Brijender Parta Rana
Date Created:21 August 2015
Date Modified :

-->


<?php
		$tital="Category List";
		include("./shared/Header.php");
?>

  <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                             Add Category
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                             <li>
                                <i class="fa fa-fw fa-bar-chart-o"></i>  <a href="categorylist.php">Category</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i>  Add Category
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">

                    <div class="col-lg-12">

                           <form class="form-horizontal" role="form">

                            <div class="form-group">

                                <label class="control-label col-sm-2">Category Name</label>

                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" >
                                </div>


                            </div>
                            <div class="form-group">
                             <label class="control-label col-sm-2">Section Name</label>

                                <div class="col-sm-10">
                                     <select class="form-control">
                                        <option>C-1</option>
                                        <option>C-2</option>
                                        <option>C-3</option>
                                        <option>C-4</option>
                                        <option>C-5</option>
                                    </select>
                                </div>

                            </div>
                             <div class="form-group">

                                <label class="control-label col-sm-2">Is Parent</label>


                                <div class="checkbox col-sm-10">
                                    <label>
                                        <input type="checkbox" value="">
                                    </label>
                                </div>


                            </div>

                             <div class="form-group">
                             <label class="control-label col-sm-2">Parent Category</label>

                                <div class="col-sm-10">
                                     <select class="form-control">
                                        <option>Computer</option>
                                       <option>Computer</option>
                                       <option>Computer</option>
                                        <option>Computer</option>
                                        <option>Computer</option>
                                    </select>
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
	include("./shared/Footer.php");
?>