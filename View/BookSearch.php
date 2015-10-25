<?php
/**
 * Author : Brijender Parta Rana, Choongyeol Kim
 * Date Created : 21 August 2015
 * Date Modified : 
 */

$title = 'Books';
require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/View/Shared/AnonymousHeader.php';
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
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Books
						</h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i><a href="DashBoard.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Books
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="col-lg-12">
                    <a href="AddBook.php" class="confirm-delete btn mini red-stripe" role="button" data-title="johnny" data-id="1">Add New Book</a>
                </div>
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Book Search</legend>
                    <div class="row">
                        <div class="col-lg-12">
                            <form class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label class="control-label col-sm-2">Book Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="email" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2">Publisher Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="email" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2">Category Name</label>
                                    <div class="col-sm-10">
                                        <select class="form-control">
<?php
if ($category)
{
	$iter = $category->iterator();
	foreach ($iter as $key => $value) {
?>
                                            <option value="<?php echo $value->getId(); ?>"><?php echo $value->getSubject(); ?></option>
<?php
	}
}
?>
                                        </select>
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
                                    <th>Book Number</th>
                                    <th>Book Name</th>
                                    <th>Isbn</th>
                                    <th>Publisher Name</th>
                                    <th>Category Name</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
<?php
if ($book)
{
	$iter = $book->iterator();
	foreach ($iter as $key => $value) {
?>
                                <tr>
                                    <td><?php echo $value->getBookId(); ?></td>
                                    <td><?php echo $value->getTitle(); ?></td>
                                    <td><?php echo $value->getIsbn(); ?></td>
                                    <td><?php echo $value->getPublisherName(); ?></td>
                                    <td><?php echo $value->getCategoryName(); ?></td>
                                    <td><a class="btn mini blue-stripe" href="addbook.php?Book_id=<?php echo $value->getBookId(); ?>">Edit</a></td>
                                    <td><a href="#" class="confirm-delete btn_delete mini red-stripe" role="button" data-title="johnny" data-id="1">Delete</a></td>
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
            <!-- /.container-fluid -->
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/View/Shared/Footer.php';
?>