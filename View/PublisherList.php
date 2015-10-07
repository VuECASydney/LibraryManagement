<?php
/**
 * Author : Brijender Parta Rana
 * Date Created : 21 August 2015
 * Date Modified : 
 */

	$title = 'Publisher List';
	require_once './Shared/Header.php';
?>

  <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                             Publisher List
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Publisher List
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                 <div class="col-lg-12">
                    <a href="AddPublisher.php" class="confirm-delete btn mini red-stripe" role="button" data-title="johnny" data-id="1">Add New Publisher</a>
                 </div>
                    <div class="col-lg-12">

                           <table id="tblpublisher" class="table table-striped table-hover table-users" cellspacing="0" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>Publsiher Number</th>
                                        <th>Publsiher Name</th>
                                        <th>Address</th>
                                        <th>Phone Number</th>
                                        <th>Edit  </th>
                                        <th>Delete </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>abc</td>
                                           <td>545 kent street, CBD NSW 2000</td>
                                        <td>4544444</td>
                                        <td><a class="btn mini blue-stripe" href="{site_url()}admin/editFront/1">Edit</a></td>

                        <td><a href="#" class="confirm-delete btn_delete mini red-stripe" role="button" data-title="johnny" data-id="1">Delete</a></td>
                                    </tr>

                                    <tr>
                                        <td>2</td>
                                        <td>xyz</td>
                                        <td>545 kent street, CBD NSW 2000</td>
                                        <td>4544444</td>
                                        <td><a class="btn mini blue-stripe" href="{site_url()}admin/editFront/1">Edit</a></td>

                        <td><a href="#" class="confirm-delete btn_delete mini red-stripe" role="button" data-title="johnny" data-id="1">Delete</a></td>
                                    </tr>

                                    <tr>
                                        <td>3</td>
                                        <td>aaa</td>
                                          <td>545 kent street, CBD NSW 2000</td>
                                        <td>4544444</td>
                                        <td><a class="btn mini blue-stripe" href="{site_url()}admin/editFront/1">Edit</a></td>

                        <td><a href="#" class="confirm-delete btn_delete mini red-stripe" role="button" data-title="johnny" data-id="1">Delete</a></td>
                                    </tr>

                                    <tr>
                                        <td>4</td>
                                        <td>ZZZ</td>
                                            <td>545 kent street, CBD NSW 2000</td>
                                        <td>4544444</td>
                                         <td><a class="btn mini blue-stripe" href="{site_url()}admin/editFront/1">Edit</a></td>

                        <td><a href="#" class="confirm-delete btn_delete mini red-stripe" role="button" data-title="johnny" data-id="1">Delete</a></td>
                                    </tr>

                                    <tr>
                                        <td>5</td>
                                        <td>TEST</td>
                                          <td>545 kent street, CBD NSW 2000</td>
                                        <td>4544444</td>
                                        <td><a class="btn mini blue-stripe" href="{site_url()}admin/editFront/1">Edit</a></td>

                        <td><a href="#" class="confirm-delete btn_delete mini red-stripe" role="button" data-title="johnny" data-id="1">Delete</a></td>
                                    </tr>

                                    <tr>
                                       <td>6</td>
                                        <td>BBB</td>
                                           <td>545 kent street, CBD NSW 2000</td>
                                        <td>4544444</td>
                                       <td><a class="btn mini blue-stripe" href="{site_url()}admin/editFront/1">Edit</a></td>

                        <td><a href="#" class="confirm-delete btn mini red-stripe" role="button" data-title="johnny" data-id="1">Delete</a></td>
                                    </tr>

                                    <tr>
                                        <td>7</td>
                                        <td>Java</td>
                                            <td>545 kent street, CBD NSW 2000</td>
                                        <td>4544444</td>
                                        <td><a class="btn mini blue-stripe" href="{site_url()}admin/editFront/1">Edit</a></td>

                        <td><a href="#" class="confirm-delete btn mini red-stripe" role="button" data-title="johnny" data-id="1">Delete</a></td>
                                    </tr>




                                </tbody>
                            </table>
                              <script type="text/javascript">
                                  $(document).ready(function () {
                                      $('#tblpublisher').dataTable({
                                          "iDisplayLength": 5,

                                              "lengthMenu": [5,10, 25, 50, 100]

                                      });
                                  });


                            </script>
                    </div>

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->



<?php
	require_once './Shared/Footer.php';
?>