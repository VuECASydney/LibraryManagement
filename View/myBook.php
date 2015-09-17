<!--
Author : Brijender Parta Rana
Date Created:21 August 2015
Date Modified :

-->


<?php
		$tital="Books ";
		include("./shared/Header.php");
?>

  <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            My Books                         </h1>

                    </div>
                </div>
                <!-- /.row -->
                  <div class="col-lg-12">
                 <a href="SearchBook.php" class="confirm-delete btn mini red-stripe" role="button" data-title="johnny" data-id="1">Search Book</a>
                 </div>

                <div class="row">

                    <div class="col-lg-12">

                           <table id="tblbook" class="table table-striped table-hover table-users" cellspacing="0" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>Book Number</th>
                                        <th>Book Name</th>

                                        <th>Publisher Name</th>
                                        <th>Category Name</th>
                                        <th>Issue Date  </th>
                                        <th>Due Date </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Let Us C</td>

                                         <td>Test </td>
                                         <td>Computer </td>

                                        <td>20/07/2015</td>

                                        <td>20/09/2015</td>
                                    </tr>

                                    <tr>
                                        <td>2</td>
                                        <td>Asp.net 4.5</td>
                                        <td>WROX </td>
                                         <td>Object Orineted Programing </td>
                                         <td>20/07/2015</td>

                                        <td>20/09/2015</td>
                                    </tr>




                                </tbody>
                            </table>
                              <script type="text/javascript">
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
	include("./shared/Footer.php");
?>