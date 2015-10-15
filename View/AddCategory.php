<?php
/**
 * Author : Brijender Parta Rana, Choongyeol Kim
 * Date Created : 21 August 2015
 * Date Modified : 
 */

$title = 'Add Category';
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
?>
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Add Category
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i><a href="DashBoard.php">Dashboard</a>
                            </li>
                             <li>
                                <i class="fa fa-fw fa-bar-chart-o"></i><a href="CategoryList.php">Category</a>
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
                        <form class="form-horizontal" role="form" action="AddCategoryOk.php" method="get">
                            <div class="form-group">
                                <label class="control-label col-sm-2">Category Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="categoryName" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Section Name</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="sectionId">
<?php
if ($section)
{
	$iter = $section->iterator();
	foreach ($iter as $key => $value) {
?>
                                        <option value="<?php echo $value->getId(); ?>"><?php echo $value->getName(); ?></option>
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
                                    <select class="form-control" name="parentCategoryId">
                                        <option value="0">No Parent Subject</option>
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