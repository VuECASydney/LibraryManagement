<?php
/**
 * Author : Brijender Parta Rana
 * Date Created : 21 August 2015
 * Date Modified : 
 */

   $title = 'Books Report';
require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/View/Shared/Header.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/DatabaseLogic/DBConnection.php';

$user = getUserInfo();
$role = $user->getRole();
$conn = DBConnection::getConnection($role);
$book = NULL;
if ($conn)
{
	$book = $conn->getAllBook();
	$category = $conn->getAllCategory();
}
?>
     <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
     <script src=" //cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
      <script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>


  <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                             Fine Report                         </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Fine Report
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Fine Search</legend>
                    <div class="row">
                        <div class="col-lg-12">
                            <form class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label class="control-label col-sm-2">Fine </label>
                                    <div class="col-sm-10">
                                        <select class="form-control">
                                             <option value="All">All</option>
                                              <option value="Due to pay">Due to pay</option>
                                               <option value="Recivied Fine">Recivied Fine</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2">Period </label>
                                    <div class="col-sm-10">
                                        <select class="form-control">
                                             <option value="One month">One month</option>
                                              <option value="Two Month">Two Month</option>
                                               <option value="Six Month">Six Month</option>
                                        </select>
                                    </div>
                                </div>
                                    <div class="form-group">
                                    <label class="control-label col-sm-2">Start Date</label>
                                    <div class="col-sm-10">
                                      <div class='input-group date' id='datetimepicker1'>
                                            <input type='text' class="form-control" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                      </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2">End Date</label>
                                    <div class="col-sm-10">
                                       <div class='input-group date' id='datetimepicker2'>
                                            <input type='text' class="form-control" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                      </div>
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

                           <table id="tblbook" class="table table-striped table-hover table-users" cellspacing="0" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>Number</th>
                                        <th>Month</th>
                                            <th>Fine</th>


                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>April</td>

                                         <td>$200 </td>

                                    </tr>

                                    <tr>
                                        <td>2</td>
                                        <td>June</td>

                                        <td>$500 </td>

                                    </tr>

                                    <tr>
                                        <td>3</td>
                                       <td>July</td>

                                        <td>$300 </td>

                                    </tr>

                                    <tr>
                                        <td>4</td>
                                       <td>July</td>

                                        <td>$300 </td>

                                    </tr>

                                    <tr>
                                        <td>5</td>
                                         <td>July</td>

                                        <td>$300 </td>

                                    </tr>

                                   


                                </tbody>
                            </table>
                              <script type="text/javascript">

                              $(document).ready(function () {
                                         $('#datetimepicker1').datetimepicker();
                                         $('#datetimepicker2').datetimepicker();
                                  });

                                  $(document).ready(function () {

                                      $('#tblbook').dataTable({
                                          "iDisplayLength": 5,

                                              "lengthMenu": [5,10, 25, 50, 100]

                                      });

                                  });
                                  $('#tblContact_length').visible=false;

                            </script>
                    </div>

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->



<?php
	require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/View/Shared/Footer.php';
?>