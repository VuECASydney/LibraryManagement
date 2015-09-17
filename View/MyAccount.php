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
                             My Account
                        </h1>

                    </div>
                </div>
                <!-- /.row -->

                <div class="row">

                    <div class="col-lg-12">

                           <form class="form-horizontal" role="form">
                               <div class="form-group">

                                <label class="control-label col-sm-2"> ID</label>

                                <div class="col-sm-10">
                                         <p class="form-control-static">4511875</p>
                                </div>


                            </div>
                            <div class="form-group">

                                <label class="control-label col-sm-2"> Name</label>

                                <div class="col-sm-10">
                                         <p class="form-control-static">Brijender Partap Rana</p>
                                </div>


                            </div>

                              <div class="form-group">

                                <label class="control-label col-sm-2"> Address</label>

                                <div class="col-sm-10">
                                         <p class="form-control-static">#545 Kent Street, CBD NSW 2000</p>
                                </div>


                            </div>
                            <div class="form-group">

                                <label class="control-label col-sm-2"> Phone</label>

                                <div class="col-sm-10">
                                         <p class="form-control-static">046611111</p>
                                </div>


                            </div>
                             <div class="form-group">

                                <label class="control-label col-sm-2"> Email</label>

                                <div class="col-sm-10">
                                         <p class="form-control-static">test@test.com</p>
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