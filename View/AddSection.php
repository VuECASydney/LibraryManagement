<?php
/**
 * Author : Brijender Parta Rana, Choongyeol Kim
 * Date Created : 21 August 2015
 * Date Modified : 
 */

$title = 'Add Section';
require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/Global/PreDefinedConstants.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/Global/CommonFunctions.php';

$actionType = ACTION_ADD; // Default Action
$editable = TRUE;
$sectionId = NULL;
if (isset($_GET[ACTION_TYPE]) && $_GET[ACTION_TYPE] != NULL) {
	switch ($_GET[ACTION_TYPE]) {
		case ACTION_EDIT:
			checkNullwithRedirect(SECTION_LIST_PAGE, $_GET[ITEM_ID]);
			$actionType = ACTION_EDIT;
			$sectionId = $_GET[ITEM_ID];
			$title = 'Edit Section';
			break;
		case ACTION_DEL:
			checkNullwithRedirect(SECTION_LIST_PAGE, $_GET[ITEM_ID]);
			$actionType = ACTION_DEL;
			$sectionId = $_GET[ITEM_ID];
			$title = 'Del Section';
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
$section = NULL;
if ($conn)
{
	$section = $conn->getAllSection();
}

$instance = NULL;
$sectionName = NULL;

switch ($actionType)
{
	case ACTION_EDIT:
	case ACTION_DEL:
		$instance = $section->getItem($sectionId);

		$sectionName = $instance->getName();
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
                                <i class="fa fa-fw fa-wrench"></i><a href="<?php echo SECTION_LIST_PAGE; ?>">Section</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i>Add Section
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <form class="form-horizontal" role="form" action="<?php echo OK_SECTION_PAGE; ?>" method="get">
                            <div class="form-group">
                                <label class="control-label col-sm-2">Section Name</label>
                                <div class="col-sm-10">
                                    <input type="hidden" name="<?php echo ACTION_TYPE; ?>" value="<?php echo $actionType; ?>">
                                    <input type="hidden" name="<?php echo SECTION_ID; ?>" value="<?php echo $sectionId; ?>">
                                    <input type="text" class="form-control" name="<?php echo SECTION_NAME; ?>" value="<?php echo $sectionName; ?>"<?php echo ($editable ? '': ' disabled'); ?> />
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