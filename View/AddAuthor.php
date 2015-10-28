<?php
/**
 * Author : Brijender Parta Rana
 * Date Created : 21 August 2015
 * Date Modified : 
 */

$title = 'Add Author';
require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/Global/PreDefinedConstants.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/Global/CommonFunctions.php';

$actionType = ACTION_ADD; // Default Action
$editable = TRUE;
$authorId = NULL;
if (isset($_GET[ACTION_TYPE]) && $_GET[ACTION_TYPE] != NULL) {
	switch ($_GET[ACTION_TYPE]) {
		case ACTION_EDIT:
			checkNullwithRedirect(AUTHOR_LIST_PAGE, $_GET[ITEM_ID]);
			$actionType = ACTION_EDIT;
			$authorId = $_GET[ITEM_ID];
			$title = 'Edit Author';
			break;
		case ACTION_DEL:
			checkNullwithRedirect(AUTHOR_LIST_PAGE, $_GET[ITEM_ID]);
			$actionType = ACTION_DEL;
			$authorId = $_GET[ITEM_ID];
			$title = 'Del Author';
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
$collection = NULL;
if ($conn)
{
	$collection = $conn->getAllAuthor();
}

$instance = NULL;
$authorName = NULL;

switch ($actionType)
{
	case ACTION_EDIT:
	case ACTION_DEL:
		$instance = $collection->getItem($authorId);
		$authorName = $instance->getName();
		break;
	case ACTION_ADD:
	default:
		break;
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
                                <i class="fa fa-fw fa-wrench"></i><a href="<?php echo AUTHOR_LIST_PAGE; ?>">Author</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i>Add Author
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <form class="form-horizontal" id="AuthorForm" role="form" action="<?php echo OK_AUTHOR_PAGE; ?>" method="get">
                            <div class="form-group">
                                <label class="control-label col-sm-2">Author Name</label>
                                <div class="col-sm-10">
                                    <input type="hidden" name="<?php echo ACTION_TYPE; ?>" value="<?php echo $actionType; ?>">
                                    <input type="hidden" name="<?php echo AUTHOR_ID; ?>" value="<?php echo $authorId; ?>">
                                    <input type="text" class="form-control" name="<?php echo AUTHOR_NAME; ?>" value="<?php echo $authorName; ?>"<?php echo ($editable ? '': ' disabled'); ?> />
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
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/View/Shared/Footer.php';
?>

<script type="text/javascript">
$(document).ready(function() {
    $('#AuthorForm').bootstrapValidator({
        container: '#messages',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            authorName: {
                validators: {
                    notEmpty: {
                        message: 'The Author Name is required and cannot be empty'
                    }
                }
            }

         }

    });
});
</script>