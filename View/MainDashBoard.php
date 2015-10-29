<?php
/**
 * Author : Brijender Parta Rana
 * Date Created : 21 August 2015
 * Date Modified : 
 */

$title = 'Home Page';

require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/View/Shared/AnonymousHeader.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/DatabaseLogic/DBConnection.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/Global/PreDefinedConstants.php';
const PREFIX_PAREMETERS_SEARCH_BOOK_NAME = 'MainDashBoard.php' . '?' . BOOK_NAME . '=';
const PREFIX_PAREMETERS_VIEW_COPY = 'MainDashBoard.php' . '?' . ACTION_TYPE . '=' . ACTION_VIEW_BOOK_COPY . '&';

$role = 'Guest';
$conn = DBConnection::getConnection($role);
$book = NULL;
$publisher = NULL;
$category = NULL;
$bookName = NULL;
$publisherId = NULL;
$categoryId = NULL;
$bookId = NULL;
$bookCopy = NULL;
if ($conn)
{
	$publisher = $conn->getAllPublisher();
	$category = $conn->getAllCategory();

	if (isset($_GET[BOOK_NAME]))
	{
		$bookName = $_GET[BOOK_NAME];
	}

	if (isset($_GET[PUBLISHER_ID]))
	{
		$publisherId = $_GET[PUBLISHER_ID];
	}

	if (isset($_GET[CATEGORY_ID]))
	{
		$categoryId = $_GET[CATEGORY_ID];
	}

	if (isset($_GET[BOOK_ID]) && $_GET[BOOK_ID] != NULL)
	{
		
		$bookId = $_GET[BOOK_ID];
		$book = $conn->getBookByBookId($bookId);
		$bookCopy = $conn->getBookCopyByBookId($bookId);
	}
	else
	{
		if ($bookName != NULL || $publisherId != NULL || $categoryId != NULL)
		{
			$book = $conn->getSearchBook($bookName, $publisherId, $categoryId);
		}
	}
}
?>
            <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>-->
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Home
						</h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i><a href="DashBoard.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i><a href="<?php echo PREFIX_PAREMETERS_VIEW_ALL; ?>">View All Book</a>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="col-lg-12">
                    <a href="<?php echo ADD_BOOK_PAGE; ?>" class="confirm-delete btn mini red-stripe" role="button" data-title="johnny" data-id="1">Add New Book</a>
                </div>
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Book Search</legend>
                    <div class="row">
                        <div class="col-lg-12">
                            <form class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label class="control-label col-sm-2">Book Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="email" name="<?php echo BOOK_NAME; ?>" value="<?php echo $bookName;?>" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2">Publisher Name</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="<?php echo PUBLISHER_ID; ?>">
                                            <option value="0"<?php echo ($publisherId == NULL ? ' selected' : ''); ?>>No Publisher Selected</option>
<?php
if ($publisher)
{
	$iter = $publisher->iterator();
	foreach ($iter as $key => $value) {
		$id = $value->getId();
?>
                                            <option value="<?php echo $id; ?>"<?php echo ($id == $publisherId ? ' selected' : ''); ?>><?php echo $value->getName(); ?></option>
<?php
	}
}
?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2">Category Name</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="<?php echo CATEGORY_ID; ?>">
                                            <option value="0"<?php echo ($categoryId == NULL ? ' selected' : ''); ?>>No Category Selected</option>
<?php
if ($category)
{
	$iter = $category->iterator();
	foreach ($iter as $key => $value) {
		$id = $value->getId();
?>
                                            <option value="<?php echo $value->getId(); ?>"<?php echo ($id == $categoryId ? ' selected' : ''); ?>><?php echo $value->getSubject(); ?></option>
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
				<hr />
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Book</legend>
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
                                        <th>View Copy</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
if ($book)
{
	$iter = $book->iterator();
	foreach ($iter as $key => $value) {
		$id = $value->getBookId();
?>
                                    <tr>
                                        <td><?php echo $id; ?></td>
                                        <td><?php echo $value->getTitle(); ?></td>
                                        <td><?php echo $value->getIsbn(); ?></td>
                                        <td><?php echo $value->getPublisherName(); ?></td>
                                        <td><?php echo $value->getCategoryName(); ?></td>
                                        <td><a href="<?php echo PREFIX_PAREMETERS_VIEW_COPY . BOOK_NAME . '=' . $bookName . '&' . PUBLISHER_ID . '=' . $publisherId . '&' . CATEGORY_ID . '=' . $categoryId . '&' . BOOK_ID . '=' . $id; ?>" class="btn mini blue-stripe">View</a></td>
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
				</fieldset>
				<hr />
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Book Copies</legend>
                    <div class="row">
                        <div class="col-lg-12">
                            <table id="tblbookcopies" class="table table-striped table-hover table-users" cellspacing="0" style="width:100%;">
                                 <thead>
                                    <tr>
                                        <th>Book Barcode</th>
                                        <th>Book Number</th>
                                        <th>Title</th>
                                        <th>Available</th>
                                        <th>Return Date</th>
                                        <th>Reserve</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
if ($bookCopy)
{
	$iter = $bookCopy->iterator();
	foreach ($iter as $key => $value) {
		$barcodeId = $value->getBarcodeId();
		$bookId = $value->getBookId();
		$bookTitle = $value->getTitle();
		$logId = $value->getLogId();
		$returnDate = $value->getReturnDate();

?>
                                    <tr>
                                        <td><?php echo $barcodeId; ?></td>
                                        <td><?php echo $bookId; ?></td>
                                        <td><?php echo $bookTitle; ?></td>
                                        <td><span class="label label-warning"><?php echo ($logId ? 'Not Available' : 'Available'); ?></span></td>
                                        <td><?php echo $returnDate; ?></td>
                                        <td><a href="index.php" class="btn mini blue-stripe">Reserve</a></td>
                                    </tr>
<?php
	}
}
?>
                                </tbody>
                            </table>
                            <script type="text/javascript">
                                $(document).ready(function () {
                                    $('#tblbookcopies').dataTable({
                                        "iDisplayLength": 10,
                                        "lengthMenu": [10, 25, 50, 100]
                                    });
                                });
                                $('#tblContact_length').visible=false;
                            </script>
                        </div>
                    </div>
                    <!-- /.row -->
                </fieldset>
            </div>
            <!-- /.container-fluid -->
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/View/Shared/Footer.php';
?>