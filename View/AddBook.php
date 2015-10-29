<?php
/**
 * Author : Brijender Parta Rana, Choongyeol Kim
 * Date Created : 21 August 2015
 * Date Modified : 
 */

$title = 'Add Book';
require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/Global/PreDefinedConstants.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/Global/CommonFunctions.php';

$actionType = ACTION_ADD; // Default Action
$editable = TRUE;
$bookId = NULL;
$bookBarcodeId = NULL;
if (isset($_GET[ACTION_TYPE]) && $_GET[ACTION_TYPE] != NULL) {
	switch ($_GET[ACTION_TYPE]) {
		case ACTION_ADD_BOOK_COPY:
			checkNullwithRedirect(BOOK_LIST_PAGE, $_GET[ITEM_ID]);
			$actionType = ACTION_ADD_BOOK_COPY;
			$bookId = $_GET[ITEM_ID];
			$title = 'Add Book Copy';
			$editable = FALSE;
			break;
		case ACTION_DEL_BOOK_COPY:
			checkNullwithRedirect(BOOK_LIST_PAGE, $_GET[ITEM_ID]);
			checkNullwithRedirect(BOOK_LIST_PAGE, $_GET[BOOK_BARCODE]);
			$actionType = ACTION_DEL_BOOK_COPY;
			$bookId = $_GET[ITEM_ID];
			$bookBarcodeId = $_GET[BOOK_BARCODE];
			$title = 'Del Book Copy';
			$editable = FALSE;
			break;
		case ACTION_EDIT:
			checkNullwithRedirect(BOOK_LIST_PAGE, $_GET[ITEM_ID]);
			$actionType = ACTION_EDIT;
			$bookId = $_GET[ITEM_ID];
			$title = 'Edit Book';
			break;
		case ACTION_DEL:
			checkNullwithRedirect(BOOK_LIST_PAGE, $_GET[ITEM_ID]);
			$actionType = ACTION_DEL;
			$bookId = $_GET[ITEM_ID];
			$title = 'Del Book';
			$editable = FALSE;
			break;
		case ACTION_ADD:
		default:
			break;
	}
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/View/Shared/Header.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/DatabaseLogic/DBConnection.php';

$user = getUserInfo();
$role = $user->getRole();
$conn = DBConnection::getConnection($role);
$publisher = NULL;
$category = NULL;
$instance = NULL;
$bookName = NULL;
$bookIsbn = NULL;
$publisherName = NULL;
$categoryName = NULL;
$publisherId = NULL;
$categoryId = NULL;
$publisherId = NULL;
$categoryId = NULL;

if ($conn)
{
	$publisher = $conn->getAllPublisher();
	$category = $conn->getAllCategory();

	switch ($actionType)
	{
		case ACTION_EDIT:
		case ACTION_DEL:
		case ACTION_ADD_BOOK_COPY:
		case ACTION_DEL_BOOK_COPY:
			$instance = $conn->getBookById($bookId);
			$bookName = $instance->getTitle();
			$bookIsbn = $instance->getIsbn();
			$publisherName = $instance->getPublisherName();
			$publisherId = $instance->getPublisherId();
			$categoryName = $instance->getCategoryName();
			$categoryId = $instance->getCategoryId();
			break;
		case ACTION_ADD:
		default:
			break;
	}
}
?>
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <?php echo "$title\n"; ?>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i><a href="DashBoard.php">Dashboard</a>
                            </li>
                             <li>
                                <i class="fa fa-fw fa-bar-chart-o"></i><a href="<?php echo BOOK_LIST_PAGE; ?>">Book</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i>Add Book
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <form class="form-horizontal" id="BookForm" role="form" action="<?php echo OK_BOOK_PAGE; ?>" method="get">
                            <div class="form-group">
                                <label class="control-label col-sm-2">Book Name</label>
                                <div class="col-sm-10">
                                    <input type="hidden" name="<?php echo ACTION_TYPE; ?>" value="<?php echo $actionType; ?>">
                                    <input type="hidden" name="<?php echo BOOK_ID; ?>" value="<?php echo $bookId; ?>" />
                                    <input type="text" class="form-control" name="<?php echo BOOK_NAME; ?>" value="<?php echo $bookName; ?>"<?php echo ($editable ? '': ' disabled'); ?> />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Isbn</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="<?php echo BOOK_ISBN; ?>" value="<?php echo $bookIsbn; ?>"<?php echo ($editable ? '': ' disabled'); ?> />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Publisher Name</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="<?php echo PUBLISHER_ID; ?>"<?php echo ($editable ? '': ' disabled'); ?>>
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
                                    <select class="form-control" name="<?php echo CATEGORY_ID; ?>"<?php echo ($editable ? '': ' disabled'); ?>>
<?php
if ($category)
{
	$iter = $category->iterator();
	foreach ($iter as $key => $value) {
		$id = $value->getId();
?>
                                        <option value="<?php echo $id; ?>"<?php echo($id == $categoryId ? ' selected' : ''); ?>><?php echo $value->getSubject(); ?></option>
<?php
	}
}
?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2">Barcode Number</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="<?php echo BOOK_BARCODE; ?>" value="<?php echo $bookBarcodeId; ?>" readonly />
                                </div>
                            </div>
                            <!-- #messages is where the messages are placed inside -->
                            <div class="form-group">
                                <div class="col-md-9 col-md-offset-3">
                                    <div id="messages"></div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-default">Submit Button</button>
                            <button type="reset" class="btn btn-default">Reset Button</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                            <h4 class="modal-title custom_align" id="Heading">Book Copy Detail</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="12345678" />
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="20/09/2015" />
                            </div>
                            <div class="form-group">
                                <select class="form-control">
                                    <option>Available</option>
                                    <option>Not Available</option>
                                    <option>Hold</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                            <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span>Are you sure you want to delete this Record?
                            </div>
                        </div>
                        <div class="modal-footer ">
                            <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/View/Shared/Footer.php';
?>

<script type="text/javascript">
$(document).ready(function() {
    $('#BookForm').bootstrapValidator({
        container: '#messages',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            bookName: {
                validators: {
                    notEmpty: {
                        message: 'The book Name is required and cannot be empty'
                    }
                }
            },
             bookIsbn: {
                validators: {
                    notEmpty: {
                        message: 'The book Isbn is required and cannot be empty'
                    }
                }
            }

         }

    });
});
</script>