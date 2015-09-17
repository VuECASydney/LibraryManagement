<!--
Author : Brijender Parta Rana
Date Created:21 August 2015
Date Modified :

-->


<?php
		$tital="User List";
		include("./shared/Header.php");
?>

  <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                             User List
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> User List
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                 <div class="col-lg-12">
            <a href="AddUser.php" class="confirm-delete btn mini red-stripe" role="button" data-title="johnny" data-id="1">Add New User</a>
                 </div>
                    <div class="col-lg-12">

                           <table id="tblContact" class="table table-striped table-hover table-users" cellspacing="0" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>User Name</th>
                                        <th>Type</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Email</th>
                                          <th>Phone</th>
                                        <th>Edit  </th>
                                        <th>Delete </th>
                                    </tr>
                                </thead>

                                <tbody>
                                <tr>
                                        <td>Rachid</td>
                                        <td>Staff</td>
                                        <td>Dr. Rachid Hamadi </td>
                                        <td>545 Kent Street,CBD NSW 2000</td>
                                        <td>Test@test.com</td>
                                        <td>111111111</td>
                                        <td><a class="btn mini blue-stripe" href="{site_url()}admin/editFront/1">Edit</a></td>

                        <td><a href="#" class="confirm-delete btn_delete mini red-stripe" role="button" data-title="johnny" data-id="1">Delete</a></td>
                                    </tr>

                                    <tr>
                                        <td>Brij</td>
                                        <td>Student</td>
                                        <td>Brijender Partap Rana </td>
                                        <td>545 Kent Street,CBD NSW 2000</td>
                                        <td>Test@test.com</td>
                                        <td>111111111</td>
                                        <td><a class="btn mini blue-stripe" href="{site_url()}admin/editFront/1">Edit</a></td>

                        <td><a href="#" class="confirm-delete btn_delete mini red-stripe" role="button" data-title="johnny" data-id="1">Delete</a></td>
                                    </tr>

                                    <tr>
                                        <td>Kim</td>
                                        <td>Student</td>
                                        <td>Choongyaol Kim </td>
                                        <td>545 Kent Street,CBD NSW 2000</td>
                                        <td>Test@test.com</td>
                                        <td>111111111</td>
                                        <td><a class="btn mini blue-stripe" href="{site_url()}admin/editFront/1">Edit</a></td>

                        <td><a href="#" class="confirm-delete btn_delete mini red-stripe" role="button" data-title="johnny" data-id="1">Delete</a></td>
                                    </tr>

                                    <tr>
                                         <td>Pia</td>
                                        <td>Student</td>
                                        <td>Priyanka Sharma </td>
                                        <td>545 Kent Street,CBD NSW 2000</td>
                                        <td>Test@test.com</td>
                                        <td>111111111</td>
                                        <td><a class="btn mini blue-stripe" href="{site_url()}admin/editFront/1">Edit</a></td>

                        <td><a href="#" class="confirm-delete btn_delete mini red-stripe" role="button" data-title="johnny" data-id="1">Delete</a></td>
                                    </tr>

                                   <tr>
                                        <td>Rachid</td>
                                        <td>Staff</td>
                                        <td>Dr. Rachid Hamadi </td>
                                        <td>545 Kent Street,CBD NSW 2000</td>
                                        <td>Test@test.com</td>
                                        <td>111111111</td>
                                        <td><a class="btn mini blue-stripe" href="{site_url()}admin/editFront/1">Edit</a></td>

                        <td><a href="#" class="confirm-delete btn_delete mini red-stripe" role="button" data-title="johnny" data-id="1">Delete</a></td>
                                    </tr>

                                    <tr>
                                        <td>Brij</td>
                                        <td>Student</td>
                                        <td>Brijender Partap Rana </td>
                                        <td>545 Kent Street,CBD NSW 2000</td>
                                        <td>Test@test.com</td>
                                        <td>111111111</td>
                                        <td><a class="btn mini blue-stripe" href="{site_url()}admin/editFront/1">Edit</a></td>

                        <td><a href="#" class="confirm-delete btn_delete mini red-stripe" role="button" data-title="johnny" data-id="1">Delete</a></td>
                                    </tr>

                                    <tr>
                                        <td>Kim</td>
                                        <td>Student</td>
                                        <td>Choongyaol Kim </td>
                                        <td>545 Kent Street,CBD NSW 2000</td>
                                        <td>Test@test.com</td>
                                        <td>111111111</td>
                                        <td><a class="btn mini blue-stripe" href="{site_url()}admin/editFront/1">Edit</a></td>

                        <td><a href="#" class="confirm-delete btn_delete mini red-stripe" role="button" data-title="johnny" data-id="1">Delete</a></td>
                                    </tr>

                                    <tr>
                                         <td>Pia</td>
                                        <td>Student</td>
                                        <td>Priyanka Sharma </td>
                                        <td>545 Kent Street,CBD NSW 2000</td>
                                        <td>Test@test.com</td>
                                        <td>111111111</td>
                                        <td><a class="btn mini blue-stripe" href="{site_url()}admin/editFront/1">Edit</a></td>

                        <td><a href="#" class="confirm-delete btn_delete mini red-stripe" role="button" data-title="johnny" data-id="1">Delete</a></td>
                                    </tr>



                                </tbody>
                            </table>
                              <script type="text/javascript">
                                  $(document).ready(function () {
                                      $('#tblContact').dataTable({
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
	include("./shared/Footer.php");
?>