<?php
/**
 * Author : Brijender Parta Rana
 * Date Created : 21 August 2015
 * Date Modified : 
 */

    $title = 'My Account';
	require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/View/Shared/AnonymousHeader.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/DatabaseLogic/DBConnection.php';

    // this is bcz same header using by login page and account page
    //Just quick fix
      require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/Entity/Account.php';


             $user = getUserInfo();
            $role = $user->getRole();
            $conn = DBConnection::getConnection($role);
            $book = NULL;
            if ($conn)
            {
                $id = $user->getId();
            	$Loanbooks = $conn->getBookByBorrowerid($id);
                $fineLog=$conn->getFineByBorrowerid($id);

            }
   
?>
    <script type="text/javascript" src="../js/dataTables.bootstrap.js"></script>
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
                <ul class="nav nav-tabs">
                      <li class="active"><a href="#myaccount"  data-toggle="tab">My Account</a></li>
                      <li >
                        <a  href="#books"  data-toggle="tab">My Books    </a>

                      </li>
                      <li><a href="#fines"  data-toggle="tab">My Fines</a></li>

                </ul>
                 <div class="tab-content">
                        <div id="myaccount" class="tab-pane fade in active">
                          <h3>My Account</h3>
                          <p>
                          <div class="row">
                            <div class="col-lg-12">
                                <form class="form-horizontal" role="form">
                                    <div class="form-group">
                                        <label class="control-label col-sm-2">ID</label>
                                        <div class="col-sm-10">
                                            <p class="form-control-static"><?php echo $user->getId(); ?></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2">Name</label>
                                        <div class="col-sm-10">
                                            <p class="form-control-static"><?php echo $user->getName(); ?></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
        							    <label class="control-label col-sm-2">Address</label>
                                        <div class="col-sm-10">
                                            <p class="form-control-static"><?php echo $user->getAddress(); ?></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2">Phone</label>
                                        <div class="col-sm-10">
                                            <p class="form-control-static"><?php echo $user->getPhone(); ?></p>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="control-label col-sm-2">Email</label>
                                        <div class="col-sm-10">
                                            <p class="form-control-static"><?php echo $user->getEmail(); ?></p>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-default">Submit Button</button>
                                    <button type="reset" class="btn btn-default">Reset Button</button>
                                </form>
                            </div>
                        </div>
                        </p>
                        <!-- /.row -->
                        </div>
                           <div id="books" class="tab-pane fade">
                           <div class="row">
                    <div class="col-lg-12">
                        <table id="tblbook" class="table table-striped table-hover table-users" cellspacing="0" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>Book Number</th>
                                    <th>Book Name</th>
                                    <th>Isbn</th>
                                    <th>Publisher Name</th>
                                    <th>Category Name</th>
                                    <th>Date Issue</th>
                                    <th>Due Date</th>
                                </tr>
                            </thead>
                            <tbody>
<?php
if ($Loanbooks)
{
	$iter = $Loanbooks->iterator();
	foreach ($iter as $key => $value) {
?>
                                <tr>
                                    <td><?php echo $value->getlogId(); ?></td>
                                    <td><?php echo $value->getTitle(); ?></td>
                                    <td><?php echo $value->getIsbn(); ?></td>
                                    <td><?php echo $value->getPublisherName(); ?></td>
                                    <td><?php echo $value->getCategoryName(); ?></td>
                                     <td><?php echo $value->getDateIssue(); ?></td>
                                    <td><?php echo $value->getDateDue(); ?></td>
                                </tr>
<?php
	}
}
?>
                            </tbody>
                        </table>
                        <script type="text/javascript">
                            $(document).ready(function () {
                                $('#tblbook').dataTable({
                                    "iDisplayLength": 10,
                                    "lengthMenu": [10, 25, 50, 100]
                                });
                            });
                            $('#tblContact_length').visible=false;
                        </script>
                    </div>
                </div>
                <!-- /.row -->
                           </div>
                            <div id="fines" class="tab-pane fade">
                             <div class="row">
                    <div class="col-lg-12">
                        <table id="tblfine" class="table table-striped table-hover table-users" cellspacing="0" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>Fine Id</th>
                                    <th>Book Name</th>
                                    <th>Amount</th>
                                    <th>Due Date</th>
                                    <th>Return Date</th>
                                    <th>Payment Date</th>

                                </tr>
                            </thead>
                            <tbody>
<?php
if ($fineLog)
{
	$iter = $fineLog->iterator();
	foreach ($iter as $key => $value) {
?>
                                <tr>
                                    <td><?php echo $value->getFineId(); ?></td>
                                    <td><?php echo $value->getBookTitle(); ?></td>
                                    <td><?php echo $value->getAmount(); ?></td>
                                    <td><?php echo $value->getDueDate(); ?></td>
                                    <td><?php echo $value->getReturnDate(); ?></td>
                                     <td><?php echo $value->getPaymentDate(); ?></td>

                                </tr>
<?php
	}
}
?>
                            </tbody>
                        </table>
                        <script type="text/javascript">
                            $(document).ready(function () {
                                $('#tblfine').dataTable({
                                    "iDisplayLength": 10,
                                    "lengthMenu": [10, 25, 50, 100]
                                });
                            });
                            $('#tblContact_length').visible=false;
                        </script>
                    </div>
                </div>
                <!-- /.row -->
                           </div>
                     </div>



                 </div>

            </div>
            <!-- /.container-fluid -->
<?php
	require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/View/Shared/Footer.php';
?>