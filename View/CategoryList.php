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
                             Category List
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Category List
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                 <div class="col-lg-12">
            <a href="AddCategory.php" class="confirm-delete btn mini red-stripe" role="button" data-title="johnny" data-id="1">Add New Category</a>
                 </div>
                    <div class="col-lg-12">

                           <table id="tblContact" class="table table-striped table-hover table-users" cellspacing="0" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>Category Number</th>
                                        <th>Category Name</th>
                                        <th>Section Name</th>
                                        <th>Parent Category Name</th>
                                        <th>Edit  </th>
                                        <th>Delete </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Computer</td>
                                        <td>C </td>
                                        <td></td>
                                        <td><a class="btn mini blue-stripe" href="{site_url()}admin/editFront/1">Edit</a></td>

                        <td><a href="#" class="confirm-delete btn_delete mini red-stripe" role="button" data-title="johnny" data-id="1">Delete</a></td>
                                    </tr>

                                    <tr>
                                        <td>2</td>
                                        <td>Networking</td>
                                        <td>C-4</td>
                                        <td>Computer</td>
                                        <td><a class="btn mini blue-stripe" href="{site_url()}admin/editFront/1">Edit</a></td>

                        <td><a href="#" class="confirm-delete btn_delete mini red-stripe" role="button" data-title="johnny" data-id="1">Delete</a></td>
                                    </tr>

                                    <tr>
                                        <td>3</td>
                                        <td>CCNA</td>
                                        <td>C-5</td>
                                        <td>Networking</td>
                                        <td><a class="btn mini blue-stripe" href="{site_url()}admin/editFront/1">Edit</a></td>

                        <td><a href="#" class="confirm-delete btn_delete mini red-stripe" role="button" data-title="johnny" data-id="1">Delete</a></td>
                                    </tr>

                                    <tr>
                                        <td>4</td>
                                        <td>Object Oriented Programing</td>
                                        <td>C-1</td>
                                        <td>Computer</td>
                                         <td><a class="btn mini blue-stripe" href="{site_url()}admin/editFront/1">Edit</a></td>

                        <td><a href="#" class="confirm-delete btn_delete mini red-stripe" role="button" data-title="johnny" data-id="1">Delete</a></td>
                                    </tr>

                                    <tr>
                                        <td>5</td>
                                        <td>Programing in C</td>
                                        <td>C-1</td>
                                        <td>Object Oriented Programing</td>
                                        <td><a class="btn mini blue-stripe" href="{site_url()}admin/editFront/1">Edit</a></td>

                        <td><a href="#" class="confirm-delete btn_delete mini red-stripe" role="button" data-title="johnny" data-id="1">Delete</a></td>
                                    </tr>

                                    <tr>
                                       <td>6</td>
                                        <td>Programing in C#</td>
                                        <td>C-1</td>
                                        <td>Object Oriented Programing</td>
                                       <td><a class="btn mini blue-stripe" href="{site_url()}admin/editFront/1">Edit</a></td>

                        <td><a href="#" class="confirm-delete btn mini red-stripe" role="button" data-title="johnny" data-id="1">Delete</a></td>
                                    </tr>

                                    <tr>
                                        <td>7</td>
                                        <td>Java</td>
                                        <td>C-1</td>
                                        <td>Object Oriented Programing</td>
                                        <td><a class="btn mini blue-stripe" href="{site_url()}admin/editFront/1">Edit</a></td>

                        <td><a href="#" class="confirm-delete btn mini red-stripe" role="button" data-title="johnny" data-id="1">Delete</a></td>
                                    </tr>

                                    <tr>
                                        <td>8</td>
                                        <td>PHP</td>
                                        <td>C-1</td>
                                        <td>Object Oriented Programing</td>
                                         <td><a class="btn mini blue-stripe" href="{site_url()}admin/editFront/1">Edit</a></td>

                        <td><a href="#" class="confirm-delete btn mini red-stripe" role="button" data-title="johnny" data-id="1">Delete</a></td>
                                    </tr>

                                    <tr>
                                        <td>9</td>
                                        <td>Mahesh</td>
                                        <td>Kumar</td>
                                        <td><a class="btn mini blue-stripe" href="{site_url()}admin/editFront/1">Edit</a></td>

                        <td><a href="#" class="confirm-delete btn mini red-stripe" role="button" data-title="johnny" data-id="1">Delete</a></td>
                                    </tr>

                                    <tr>
                                        <td>10</td>
                                        <td>Ajay</td>
                                        <td>Bansal</td>
                                         <td><a class="btn mini blue-stripe" href="{site_url()}admin/editFront/1">Edit</a></td>

                        <td><a href="#" class="confirm-delete btn mini red-stripe" role="button" data-title="johnny" data-id="1">Delete</a></td>
                                    </tr>

                                    <tr>
                                        <td>11</td>
                                        <td>Rahul</td>
                                        <td>Jha</td>
                                       <td><a class="btn mini blue-stripe" href="{site_url()}admin/editFront/1">Edit</a></td>

                        <td><a href="#" class="confirm-delete btn mini red-stripe" role="button" data-title="johnny" data-id="1">Delete</a></td>
                                    </tr>

                                    <tr>
                                        <td>12</td>
                                        <td>Sudhir</td>
                                        <td>Kumar</td>
                                        <td><a class="btn mini blue-stripe" href="{site_url()}admin/editFront/1">Edit</a></td>

                        <td><a href="#" class="confirm-delete btn mini red-stripe" role="button" data-title="johnny" data-id="1">Delete</a></td>
                                    </tr>

                                    <tr>
                                        <td>13</td>
                                        <td>Anil</td>
                                        <td>Arora</td>
                                       <td><a class="btn mini blue-stripe" href="{site_url()}admin/editFront/1">Edit</a></td>

                        <td><a href="#" class="confirm-delete btn mini red-stripe" role="button" data-title="johnny" data-id="1">Delete</a></td>
                                    </tr>

                                    <tr>
                                        <td>14</td>
                                        <td>Sunil</td>
                                        <td>Srivastav</td>
                                        <td>24</td>
                                        <td>India</td>
                                    </tr>

                                    <tr>
                                        <td>15</td>
                                        <td>Jack</td>
                                        <td>John</td>
                                        <td>36</td>
                                        <td><a class="btn mini blue-stripe" href="{site_url()}admin/editFront/1">Edit</a></td>

                        <td><a href="#" class="confirm-delete btn mini red-stripe" role="button" data-title="johnny" data-id="1">Delete</a></td>
                                    </tr>

                                    <tr>
                                        <td>16</td>
                                        <td>Merry</td>
                                        <td>John</td>
                                        <td>31</td>
                                        <td>United State</td>
                                    </tr>

                                    <tr>
                                        <td>17</td>
                                        <td>Maria</td>
                                        <td>Sin</td>
                                        <td>36</td>
                                        <td>United State</td>
                                    </tr>

                                    <tr>
                                        <td>18</td>
                                        <td>Robert</td>
                                        <td>Pass</td>
                                        <td>35</td>
                                        <td>UK</td>
                                    </tr>

                                    <tr>
                                        <td>19</td>
                                        <td>Debi</td>
                                        <td>Uel</td>
                                        <td>36</td>
                                        <td>UK</td>
                                    </tr>

                                    <tr>
                                        <td>20</td>
                                        <td>Yan</td>
                                        <td>John</td>
                                        <td>45</td>
                                        <td><a class="btn mini blue-stripe" href="{site_url()}admin/editFront/1">Edit</a></td>

                        <td><a href="#" class="confirm-delete btn mini red-stripe" role="button" data-title="johnny" data-id="1">Delete</a></td>
                                    </tr>

                                    <tr>
                                        <td>21</td>
                                        <td>Jai</td>
                                        <td>Vardhan</td>
                                        <td>36</td>
                                       <td><a class="btn mini blue-stripe" href="{site_url()}admin/editFront/1">Edit</a></td>

                        <td><a href="#" class="confirm-delete btn mini red-stripe" role="button" data-title="johnny" data-id="1">Delete</a></td>
                                    </tr>

                                    <tr>
                                        <td>22</td>
                                        <td>Pranay</td>
                                        <td>Kumar</td>
                                        <td>23</td>
                                        <td><a class="btn mini blue-stripe" href="{site_url()}admin/editFront/1">Edit</a></td>

                        <td><a href="#" class="confirm-delete btn_delete mini red-stripe" role="button" data-title="johnny" data-id="1">Delete</a></td>
                                    </tr>

                                    <tr>
                                        <td>23</td>
                                        <td>Tehra</td>
                                        <td>Parera</td>
                                        <td>32</td>
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