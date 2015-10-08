<?php
/**
 * Author : Brijender Parta Rana
 * Date Created : 21 August 2015
 * Date Modified : 
 */

	$title = 'Edit Book';
	require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/View/Shared/Header.php';
?>

  <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                             Edit Book
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                             <li>
                                <i class="fa fa-fw fa-bar-chart-o"></i>  <a href="BookList.php">Book</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i>  Add Book
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">

                    <div class="col-lg-12">

                           <form class="form-horizontal" role="form">

                            <div class="form-group">

                                <label class="control-label col-sm-2">Book Name</label>

                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" placeholder="Asp.net 4.5" >
                                </div>


                            </div>
                             <div class="form-group">

                                <label class="control-label col-sm-2">Isbn</label>

                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" placeholder="12345" >
                                </div>


                            </div>
                            <div class="form-group">

                                <label class="control-label col-sm-2">Publisher Name</label>

                                <div class="col-sm-10">
                                    <select class="form-control">
                                        <option>Test</option>
                                        <option>Wrox</option>
                                        <option>ABC</option>
                                        <option>Test1</option>
                                        <option>Test1</option>
                                    </select>
                                </div>


                            </div>
                            <div class="form-group">
                             <label class="control-label col-sm-2">Category Name</label>

                                <div class="col-sm-10">
                                     <select class="form-control">
                                        <option>Computer</option>
                                        <option>Netwroking</option>
                                        <option>Object Oriendted Programing</option>
                                        <option>Java</option>
                                        <option>C</option>
                                    </select>
                                </div>

                            </div>



                            <button type="submit" class="btn btn-default">Submit Button</button>
                            <button type="reset" class="btn btn-default">Reset Button</button>

                        </form>


                    </div>

                </div>
                 <fieldset class="scheduler-border">
                        <legend class="scheduler-border">Book Copies</legend>
                               <div class="row">

                                    <div class="col-lg-12">

                                           <table id="tblbookcopies" class="table table-striped table-hover table-users" cellspacing="0" style="width:100%;">
                                                <thead>
                                                    <tr>
                                                        <th>Book Copy Number</th>
                                                        <th>Stock Date</th>
                                                        <th>Available</th>

                                                        <th>Edit  </th>
                                                        <th>Delete </th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <tr>
                                                        <td>12345678</td>
                                                        <td>20/09/2015</td>
                                                       <td><span class="label label-warning">Not Avaible</span></td>


                                                        <td><a href="#" class="btn mini blue-stripe"   role="button" data-id="1" data-title="Edit" data-toggle="modal" data-target="#edit">Edit</a></td>

                                                        <td><a href="#" class="confirm-delete btn_delete mini red-stripe" role="button"  data-id="1" data-title="Delete" data-toggle="modal" data-target="#delete">Delete</a></td>
                                                    </tr>

                                                    <tr>
                                                        <td>12345678</td>
                                                        <td>20/09/2015</td>
                                                       <td>Avaible</td>
                                                         <td><a href="#" class="btn mini blue-stripe"   role="button" data-id="1" data-title="Edit" data-toggle="modal" data-target="#edit">Edit</a></td>

                                                        <td><a href="#" class="confirm-delete btn_delete mini red-stripe" role="button"  data-id="1" data-title="Delete" data-toggle="modal" data-target="#delete">Delete</a></td>
                                                    </tr>

                                                    <tr>
                                                      <td>12345678</td>
                                                        <td>20/09/2015</td>
                                                       <td><span class="label label-warning">Hold</span></td>
                                                     <td><a href="#" class="btn mini blue-stripe"   role="button" data-id="1" data-title="Edit" data-toggle="modal" data-target="#edit">Edit</a></td>

                                                        <td><a href="#" class="confirm-delete btn_delete mini red-stripe" role="button"  data-id="1" data-title="Delete" data-toggle="modal" data-target="#delete">Delete</a></td>
                                                    </tr>

                                                               <tr>
                                                        <td>12345678</td>
                                                        <td>20/09/2015</td>
                                                       <td><span class="label label-warning">Not Avaible</span></td>


                                                        <td><a href="#" class="btn mini blue-stripe"   role="button" data-id="1" data-title="Edit" data-toggle="modal" data-target="#edit">Edit</a></td>

                                                        <td><a href="#" class="confirm-delete btn_delete mini red-stripe" role="button"  data-id="1" data-title="Delete" data-toggle="modal" data-target="#delete">Delete</a></td>
                                                    </tr>

                                                    <tr>
                                                        <td>12345678</td>
                                                        <td>20/09/2015</td>
                                                       <td>Avaible</td>
                                                      

                                                        <td><a href="#" class="btn mini blue-stripe"   role="button" data-id="1" data-title="Edit" data-toggle="modal" data-target="#edit">Edit</a></td>

                                                        <td><a href="#" class="confirm-delete btn_delete mini red-stripe" role="button"  data-id="1" data-title="Delete" data-toggle="modal" data-target="#delete">Delete</a></td>
                                                    </tr>

                                                    <tr>
                                                      <td>12345678</td>
                                                        <td>20/09/2015</td>
                                                       <td><span class="label label-warning">Hold</span></td>
                                                         <td><a href="#" class="btn mini blue-stripe"   role="button" data-id="1" data-title="Edit" data-toggle="modal" data-target="#edit">Edit</a></td>

                                                        <td><a href="#" class="confirm-delete btn_delete mini red-stripe" role="button"  data-id="1" data-title="Delete" data-toggle="modal" data-target="#delete">Delete</a></td>
                                                    </tr>


                                                               <tr>
                                                        <td>12345678</td>
                                                        <td>20/09/2015</td>
                                                       <td><span class="label label-warning">Not Avaible</span></td>


                                                         <td><a href="#" class="btn mini blue-stripe"   role="button" data-id="1" data-title="Edit" data-toggle="modal" data-target="#edit">Edit</a></td>

                                                        <td><a href="#" class="confirm-delete btn_delete mini red-stripe" role="button"  data-id="1" data-title="Delete" data-toggle="modal" data-target="#delete">Delete</a></td>
                                                    </tr>

                                                    <tr>
                                                        <td>12345678</td>
                                                        <td>20/09/2015</td>
                                                       <td>Avaible</td>
                                                         <td><a href="#" class="btn mini blue-stripe"   role="button" data-id="1" data-title="Edit" data-toggle="modal" data-target="#edit">Edit</a></td>

                                                        <td><a href="#" class="confirm-delete btn_delete mini red-stripe" role="button"  data-id="1" data-title="Delete" data-toggle="modal" data-target="#delete">Delete</a></td>
                                                    </tr>

                                                    <tr>
                                                      <td>12345678</td>
                                                        <td>20/09/2015</td>
                                                       <td><span class="label label-warning">Hold</span></td>
                                                        <td><a href="#" class="btn mini blue-stripe"   role="button" data-id="1" data-title="Edit" data-toggle="modal" data-target="#edit">Edit</a></td>

                                                        <td><a href="#" class="confirm-delete btn_delete mini red-stripe" role="button"  data-id="1" data-title="Delete" data-toggle="modal" data-target="#delete">Delete</a></td>
                                                    </tr>


                                                </tbody>
                                            </table>
                                              <script type="text/javascript">
                                                  $(document).ready(function () {
                                                      $('#tblbookcopies').dataTable({
                                                          "iDisplayLength": 5,

                                                              "lengthMenu": [5,10, 25, 50, 100]

                                                      });
                                                  });
                                                  $('#tblContact_length').visible=false;

                                            </script>
                                    </div>

                                </div>
                                <!-- /.row -->
                    </fieldset>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->


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



    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
      </div>
          <div class="modal-body">

       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>

      </div>
        <div class="modal-footer ">
        <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
      </div>
        </div>
    <!-- /.modal-content -->
  </div>
      <!-- /.modal-dialog -->
    </div>


<?php
	require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/View/Shared/Footer.php';
?>