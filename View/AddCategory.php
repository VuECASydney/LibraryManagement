<?php
/**
 * Author : Brijender Parta Rana, Choongyeol Kim
 * Date Created : 21 August 2015
 * Date Modified : 
 */

$title = 'Add Category';
require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/Global/PreDefinedConstants.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/Global/CommonFunctions.php';
$actionType = ACTION_ADD; // Default Action
$editable = TRUE;
$categoryId = NULL;
if (isset($_GET[ACTION_TYPE]) && $_GET[ACTION_TYPE] != NULL) {
	switch ($_GET[ACTION_TYPE]) {
		case ACTION_EDIT:
			checkNullwithRedirect(CATEGORY_LIST_PAGE, $_GET[ITEM_ID]);
			$actionType = ACTION_EDIT;
			$categoryId = $_GET[ITEM_ID];
			$title = 'Edit Category';
			break;
		case ACTION_DEL:
			checkNullwithRedirect(CATEGORY_LIST_PAGE, $_GET[ITEM_ID]);
			$actionType = ACTION_DEL;
			$categoryId = $_GET[ITEM_ID];
			$title = 'Del Category';
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
$category = NULL;
$section = NULL;
if ($conn)
{
	$category = $conn->getAllCategory();
	$section = $conn->getAllSection();
}

$instance = NULL;
$subjectName = NULL;
$sectionName = NULL;
$parentName = NULL;
$sectionId = NULL;
$parentId = NULL;

switch ($actionType)
{
	case ACTION_EDIT:
	case ACTION_DEL:
		$instance = $category->getItem($categoryId);
		//var_dump($instance);

		$subjectName = $instance->getSubject();
		$sectionName = $instance->getSectionName();
		$parentName = $instance->getParentSubject();
		$sectionId = $instance->getSectionId();
		$parentId = $instance->getParentId();
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
                                <i class="fa fa-fw fa-bar-chart-o"></i><a href="<?php echo CATEGORY_LIST_PAGE; ?>">Category</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i>Add Category
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <form class="form-horizontal" role="form" action="<?php echo OK_CATEGORY_PAGE; ?>" method="get">
                            <div class="form-group">
                                <label class="control-label col-sm-2">Category Name</label>
                                <div class="col-sm-10">
                                    <input type="hidden" name="act" value="<?php echo $actionType; ?>">
                                    <input type="hidden" name="categoryId" value="<?php echo $categoryId; ?>">
                                    <input type="text" class="form-control" name="categoryName" value="<?php echo $subjectName; ?>"<?php echo ($editable ? '': ' disabled'); ?> />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Section Name</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="sectionId"<?php echo ($editable ? '': ' disabled'); ?>>
<?php
if ($section)
{
	$iter = $section->iterator();
	foreach ($iter as $key => $value) {
?>
                                        <option value="<?php echo $value->getId(); ?>"<?php echo ($value->getId() == $sectionId ? ' selected' : ''); ?>><?php echo $value->getName(); ?></option>
<?php
	}
}
?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Is Parent</label>
                                <div class="checkbox col-sm-10">
                                    <label>
                                        <input type="checkbox" value="" />
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Parent Category</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="parentCategoryId"<?php echo ($editable ? '': ' disabled'); ?>>
                                        <option value="0">No Parent Subject</option>
<?php
if ($category)
{
	$iter = $category->iterator();
	foreach ($iter as $key => $value) {
?>
                                        <option value="<?php echo $value->getId(); ?>"<?php echo ($value->getId() == $parentId ? ' selected' : ''); ?>><?php echo $value->getSubject(); ?></option>
<?php
	}
}
?>
                                    </select>
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