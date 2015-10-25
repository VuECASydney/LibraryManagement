<?php
/**
 * Author : Brijender Parta Rana, Choongyeol Kim
 * Date Created : 21 August 2015
 * Date Modified : 
 */

$title = 'Add User';
require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/Global/PreDefinedConstants.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/Global/CommonFunctions.php';
$actionType = ACTION_ADD; // Default Action
$editable = TRUE;
$accountId = NULL;
if (isset($_GET[ACTION_TYPE]) && $_GET[ACTION_TYPE] != NULL) {
	switch ($_GET[ACTION_TYPE]) {
		case ACTION_EDIT:
			checkNullwithRedirect(USER_LIST_PAGE, $_GET[ITEM_ID]);
			$actionType = ACTION_EDIT;
			$accountId = $_GET[ITEM_ID];
			$title = 'Edit User';
			break;
		case ACTION_DEL:
			checkNullwithRedirect(USER_LIST_PAGE, $_GET[ITEM_ID]);
			$actionType = ACTION_DEL;
			$accountId = $_GET[ITEM_ID];
			$title = 'Del User';
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
$account = NULL;
if ($conn)
{
	$account = $conn->getAllUser();
}

$instance = NULL;
$accountName = NULL;
$accountRole = NULL;
$accountAddress = NULL;
$accountPhone = NULL;
$accountEmail = NULL;
$accountYear = NULL;

switch ($actionType)
{
	case ACTION_EDIT:
	case ACTION_DEL:
		$instance = $account->getItem($accountId);
		//var_dump($instance);

		$accountName = $instance->getName();
		// Role cannot be changed
		$accountRole = $instance->getRole();
		$accountAddress = $instance->getAddress();
		$accountPhone = $instance->getPhone();
		$accountEmail = $instance->getEmail();
		$accountYear = $instance->getEnrollYear();
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
                                <i class="fa fa-fw fa-bar-chart-o"></i><a href="<?php echo USER_LIST_PAGE; ?>">User</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i>Add User
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <form class="form-horizontal" role="form" action="AddUserOk.php" method="post">
                            <div class="form-group">
                                <label class="control-label col-sm-2">Student/Staff</label>
                                <div class="col-sm-10">
                                    <input type="hidden" name="<?php echo ACTION_TYPE; ?>" value="<?php echo $actionType; ?>">
                                    <input type="hidden" name="<?php echo ACCOUNT_ID; ?>" value="<?php echo $accountId; ?>">
                                    <select class="form-control" name="<?php echo ACCOUNT_TYPE; ?>"<?php echo ($actionType == ACTION_ADD ? '': ' disabled'); ?> >
                                        <option<?php echo ($accountRole == 'Student' ? ' selected': ''); ?>>Student</option>
                                        <option<?php echo ($accountRole == 'Faculty' ? ' selected': ''); ?>>Faculty</option>
										<option<?php echo ($accountRole == 'Librarian' ? ' selected': ''); ?>>Librarian</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="<?php echo ACCOUNT_NAME; ?>" value="<?php echo $accountName; ?>"<?php echo ($editable ? '': ' disabled'); ?> />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Address</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="<?php echo ACCOUNT_ADDRESS; ?>" value="<?php echo $accountAddress; ?>"<?php echo ($editable ? '': ' disabled'); ?> />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Phone Number</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="<?php echo ACCOUNT_PHONE; ?>" value="<?php echo $accountPhone; ?>"<?php echo ($editable ? '': ' disabled'); ?> />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="<?php echo ACCOUNT_EMAIL; ?>" value="<?php echo $accountEmail; ?>"<?php echo ($editable ? '': ' disabled'); ?> />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Year</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="<?php echo ACCOUNT_ENROLL_YEAR; ?>" value="<?php echo $accountYear; ?>"<?php echo ($editable ? '': ' disabled'); ?> />
                                </div>
                            </div>
                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border">User Information</legend>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">Password</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="<?php echo ACCOUNT_PASSWORD; ?>"<?php echo ($editable ? '': ' disabled'); ?> />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </fieldset>
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