<?php
/**
 * Author : Brijender Parta Rana, Choongyeol Kim
 * Date Created : 21 August 2015
 * Date Modified : 
 */

$title = 'Author List';
require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/View/Shared/Header.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/DatabaseLogic/DBConnection.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/Global/PreDefinedConstants.php';
const PREFIX_PAREMETERS_ADD = ADD_AUTHOR_PAGE . '?' . ACTION_TYPE . '=' . ACTION_ADD;
const PREFIX_PAREMETERS_EDIT = ADD_AUTHOR_PAGE . '?' . ACTION_TYPE . '=' . ACTION_EDIT . '&' . ITEM_ID . '=';
const PREFIX_PAREMETERS_DEL = ADD_AUTHOR_PAGE . '?' . ACTION_TYPE . '=' . ACTION_DEL . '&' . ITEM_ID . '=';
const PREFIX_PAREMETERS_VIEW_ALL = AUTHOR_LIST_PAGE . '?' . ACTION_TYPE . '=' . ACTION_VIEW_ALL;

$user = getUserInfo();
$role = $user->getRole();
$conn = DBConnection::getConnection($role);
$collection = NULL;
if ($conn && isset($_GET[ACTION_TYPE]) && $_GET[ACTION_TYPE] == ACTION_VIEW_ALL)
{
	$collection = $conn->getAllAuthor();
}
?>
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Author List
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i><a href="DashBoard.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i><a href="<?php echo PREFIX_PAREMETERS_VIEW_ALL; ?>">View All Author</a>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <a href="<?php echo PREFIX_PAREMETERS_ADD; ?>" class="confirm-delete btn mini red-stripe" role="button" data-title="johnny" data-id="1">Add New Author</a>
                    </div>
                    <div class="col-lg-12">
                        <table id="tblAuthor" class="table table-striped table-hover table-users" cellspacing="0" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>Author Number</th>
                                    <th>Author Name</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
<?php
if ($collection)
{
	$iter = $collection->iterator();
	foreach ($iter as $key => $value) {
		$id = $value->getId();
?>
                                <tr>
                                    <td><?php echo $id; ?></td>
                                    <td><?php echo $value->getName(); ?></td>
                                    <td><a href="<?php echo PREFIX_PAREMETERS_EDIT . $id; ?>" class="btn mini blue-stripe">Edit</a></td>
                                    <td><a href="<?php echo PREFIX_PAREMETERS_DEL . $id; ?>" class="confirm-delete btn_delete mini red-stripe" role="button" data-title="johnny" data-id="1">Delete</a></td>
                                </tr>
<?php
	}
}
?>
                            </tbody>
                        </table>
                        <script type="text/javascript">
                            $(document).ready(function () {
                                $('#tblAuthor').dataTable({
                                    "iDisplayLength": 10,
                                    "lengthMenu": [10, 25, 50, 100]
                                });
                            });
                        </script>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/View/Shared/Footer.php';
?>