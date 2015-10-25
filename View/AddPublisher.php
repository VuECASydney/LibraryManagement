<?php
/**
 * Author : Brijender Parta Rana
 * Date Created : 21 August 2015
 * Date Modified : 
 */

$title = 'Add Publisher';
require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/Global/PreDefinedConstants.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/Global/CommonFunctions.php';
$actionType = ACTION_ADD; // Default Action
$editable = TRUE;
$publisherId = NULL;
if (isset($_GET[ACTION_TYPE]) && $_GET[ACTION_TYPE] != NULL) {
	switch ($_GET[ACTION_TYPE]) {
		case ACTION_EDIT:
			checkNullwithRedirect(PUBLISHER_LIST_PAGE, $_GET[ITEM_ID]);
			$actionType = ACTION_EDIT;
			$publisherId = $_GET[ITEM_ID];
			$title = 'Edit Publisher';
			break;
		case ACTION_DEL:
			checkNullwithRedirect(PUBLISHER_LIST_PAGE, $_GET[ITEM_ID]);
			$actionType = ACTION_DEL;
			$publisherId = $_GET[ITEM_ID];
			$title = 'Del Publisher';
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
;
     if ($conn)
{
	$publisher = $conn->getAllPublisher();

}
$instance = NULL;
$publisherName = NULL;
$publisherAddress = NULL;
$publisherPhone = NULL;


switch ($actionType)
{
	case ACTION_EDIT:
	case ACTION_DEL:
		$instance = $publisher->getItem($publisherId);
		//var_dump($instance);

        $publisherName = $instance->getName();
        $publisherAddress = $instance->getAddress();
        $publisherPhone =$instance->getPhone();

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
                                <i class="fa fa-share-square-o"></i><a href="PublisherList.php">Publisher</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i>Add Publisher
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <form class="form-horizontal" role="form" action="<?php echo OK_PUBLISHER_PAGE; ?>" method="get">
                            <div class="form-group">
                                <label class="control-label col-sm-2">Publisher Name</label>
                                <div class="col-sm-10">
                                    <input type="hidden" name="act" value="<?php echo $actionType; ?>">
                                    <input type="hidden" name="<?php echo PUBLISHER_ID; ?>" value="<?php echo $publisherId; ?>">
                                    <input type="text" class="form-control" name="<?php echo PUBLISHER_NAME; ?>" value="<?php echo $publisherName; ?>"<?php echo ($editable ? '': ' disabled');?> />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Address</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="<?php echo PUBLISHER_ADDRESS; ?>" value="<?php echo $publisherAddress; ?>"<?php echo ($editable ? '': ' disabled');?>/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Phone Number</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="<?php echo PUBLISHER_PHONE; ?>" value="<?php echo $publisherPhone; ?>"<?php echo ($editable ? '': ' disabled');?> />
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