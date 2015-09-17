<!--
Author : Brijender Parta Rana
Date Created:21 August 2015
Date Modified :

-->


<?php
		$tital="Books Return ";
		include("./shared/Header.php");
?>

  <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                             Books Return                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                             <li>
                                <i class="fa fa-dashboard"></i>  <a href="booklist.php">Book</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Book Return
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                 <fieldset class="scheduler-border">
                        <legend class="scheduler-border">Book Copy Search</legend>
                 <div class="row">

                    <div class="col-lg-12">

                           <form class="form-horizontal" role="form">

                            <div class="form-group">

                                <label class="control-label col-sm-2">Book Copy Bar Code</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="email" placeholder="12345678" >
                                </div>


                            </div>

                            <button type="submit" class="btn btn-default">Search Button</button>
                            <button type="reset" class="btn btn-default">Reset Search</button>

                        </form>


                    </div>

                </div>
                <!-- /.row -->
                    </fieldset>

                               <div class="row">

                                    <div class="col-lg-12">

                                           <table id="tblbookcopies" class="table table-striped table-hover table-users" cellspacing="0" style="width:100%;">
                                                <thead>
                                                    <tr>
                                                        <th>Book Copy Number</th>
                                                        <th>Stock Date</th>
                                                        <th>Available</th>

                                                        <th>  </th>

                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <tr>
                                                        <td>12345678</td>
                                                        <td>20/09/2015</td>
                                                       <td><span class="label label-warning">Not Avaible</span></td>


                                                        <td><a href="#" class="btn mini blue-stripe"   role="button" data-id="1" data-title="Return" data-toggle="modal" data-target="#edit">Return</a></td>


                                                    </tr>



                                                </tbody>
                                            </table>

                                    </div>

                                </div>
                                <!-- /.row -->




            </div>
            <!-- /.container-fluid -->



<?php
	include("./shared/Footer.php");
?>
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Book Copy Detail</h4>
      </div>
          <div class="modal-body">
          <div class="form-group">
                <input class="form-control " type="text" placeholder="12345678">
        </div>
        <div class="form-group">

        <input class="form-control " type="text" placeholder="20/09/2015">
        </div>
        <div class="form-group">
       <select class="form-control">
                                        <option>Available</option>
                                        <option>Not Available</option>
                                        <option>Hold</option>

                                    </select>


        </div>
      </div>
          <div class="modal-footer ">
        <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
      </div>
        </div>
    <!-- /.modal-content -->
  </div>
      <!-- /.modal-dialog -->
    </div>
