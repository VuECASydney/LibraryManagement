<?php
/**
 * Author : Brijender Parta Rana
 * Date Created : 21 August 2015
 * Date Modified : 
 */

$title = 'Section List';
require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/View/Shared/Header.php';
?>
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                             Section List
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Section List
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <a href="AddSection.php" class="confirm-delete btn mini red-stripe" role="button" data-title="johnny" data-id="1">Add New Section</a>
                    </div>
                    <div class="col-lg-12">
                        <table id="tblContact" class="table table-striped table-hover table-users" cellspacing="0" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>Section Number</th>
                                    <th>Section Name</th>
                                    <th>Edit  </th>
                                    <th>Delete </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>C </td>
                                    <td><a class="btn mini blue-stripe" href="{site_url()}admin/editFront/1">Edit</a></td>
                                    <td><a href="#" class="confirm-delete btn_delete mini red-stripe" role="button" data-title="johnny" data-id="1">Delete</a></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>C-4</td>
                                    <td><a class="btn mini blue-stripe" href="{site_url()}admin/editFront/1">Edit</a></td>
                                    <td><a href="#" class="confirm-delete btn_delete mini red-stripe" role="button" data-title="johnny" data-id="1">Delete</a></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>C-5</td>
                                    <td><a class="btn mini blue-stripe" href="{site_url()}admin/editFront/1">Edit</a></td>
                                    <td><a href="#" class="confirm-delete btn_delete mini red-stripe" role="button" data-title="johnny" data-id="1">Delete</a></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>C-1</td>
                                    <td><a class="btn mini blue-stripe" href="{site_url()}admin/editFront/1">Edit</a></td>
                                    <td><a href="#" class="confirm-delete btn_delete mini red-stripe" role="button" data-title="johnny" data-id="1">Delete</a></td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>C-1</td>
                                    <td><a class="btn mini blue-stripe" href="{site_url()}admin/editFront/1">Edit</a></td>
                                    <td><a href="#" class="confirm-delete btn_delete mini red-stripe" role="button" data-title="johnny" data-id="1">Delete</a></td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>C-1</td>
                                    <td><a class="btn mini blue-stripe" href="{site_url()}admin/editFront/1">Edit</a></td>
                                    <td><a href="#" class="confirm-delete btn mini red-stripe" role="button" data-title="johnny" data-id="1">Delete</a></td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>C-1</td>
                                    <td><a class="btn mini blue-stripe" href="{site_url()}admin/editFront/1">Edit</a></td>
                                    <td><a href="#" class="confirm-delete btn mini red-stripe" role="button" data-title="johnny" data-id="1">Delete</a></td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>C-1</td>
                                    <td><a class="btn mini blue-stripe" href="{site_url()}admin/editFront/1">Edit</a></td>
                                    <td><a href="#" class="confirm-delete btn mini red-stripe" role="button" data-title="johnny" data-id="1">Delete</a></td>
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
	require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/View/Shared/Footer.php';
?>