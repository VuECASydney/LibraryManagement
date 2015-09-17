<!--
Author : Brijender Parta Rana
Date Created:21 August 2015
Date Modified :

-->


<?php
		$tital="Books ";
		include("./shared/Header.php");
?>
     <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                             Book Report                         </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Books
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->


                <div class="row">

                    <div class="col-lg-12">

                           <table id="tblbook" class="table table-striped table-hover table-users" cellspacing="0" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>Book Number</th>
                                        <th>Book Name</th>
                                            <th>Publisher Name</th>
                                        <th>Category Name</th>
                                        <th>Total Copies</th>
                                        <th>Copies Issue</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Let Us C</td>

                                         <td>Test </td>
                                         <td>Computer </td>

                                        <td>20 </td>
                                         <td>5 </td>
                                    </tr>

                                    <tr>
                                        <td>2</td>
                                        <td>Asp.net 4.5</td>

                                        <td>WROX </td>
                                         <td>Object Orineted Programing </td>
                                         <td>50 </td>
                                         <td>5 </td>
                                    </tr>

                                    <tr>
                                        <td>3</td>
                                       <td>Asp.net 4.5</td>

                                        <td>WROX </td>
                                         <td>Object Orineted Programing </td>
                                        <td>50 </td>
                                         <td>5 </td>
                                    </tr>

                                    <tr>
                                        <td>4</td>
                                      <td>Asp.net 4.5</td>

                                        <td>WROX </td>
                                         <td>Object Orineted Programing </td>
                                         <td>50 </td>
                                         <td>5 </td>
                                    </tr>

                                    <tr>
                                        <td>5</td>
                                        <td>Asp.net 4.5</td>

                                        <td>WROX </td>
                                         <td>Object Orineted Programing </td>
                                         <td>50 </td>
                                         <td>5 </td>
                                    </tr>

                                    <tr>
                                       <td>6</td>
                                       <td>Asp.net 4.5</td>

                                        <td>WROX </td>
                                         <td>Object Orineted Programing </td>
                                        <td>50 </td>
                                         <td>5 </td>
                                    </tr>

                                     <tr>
                                        <td>5</td>
                                        <td>Asp.net 4.5</td>

                                        <td>WROX </td>
                                         <td>Object Orineted Programing </td>
                                         <td>50 </td>
                                         <td>5 </td>
                                    </tr>

                                    <tr>
                                       <td>6</td>
                                       <td>Asp.net 4.5</td>
                                       
                                        <td>WROX </td>
                                         <td>Object Orineted Programing </td>
                                        <td>50 </td>
                                         <td>5 </td>
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