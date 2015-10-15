<?php
/**
 * Author : Choongyeol Kim
 * Date Created : 16 October 2015
 * Date Modified : 
 */

require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/Entity/Account.php';
redirectPageWithoutSession();

const NEW_USER_TYPE = 'userType';
const NEW_USER_NAME = 'userName';
const NEW_USER_ADDRESS = 'address';
const NEW_USER_PHONE = 'phone';
const NEW_USER_EMAIL = 'email';
const NEW_USER_YEAR = 'enrollYear';
const NEW_USER_PASSWORD = 'userPassword';

if (!isset($_POST[NEW_USER_TYPE]) || !isset($_POST[NEW_USER_NAME]) || !isset($_POST[NEW_USER_ADDRESS]) || !isset($_POST[NEW_USER_PHONE]) || !isset($_POST[NEW_USER_EMAIL]) || !isset($_POST[NEW_USER_YEAR]) || !isset($_POST[NEW_USER_PASSWORD]))
{
	header("Location: AddUser.php");
	exit();
}

if ($_POST[NEW_USER_TYPE] == NULL || $_POST[NEW_USER_NAME] == NULL || $_POST[NEW_USER_ADDRESS] == NULL || $_POST[NEW_USER_PHONE] == NULL || $_POST[NEW_USER_EMAIL] == NULL || $_POST[NEW_USER_PASSWORD] == NULL)
{
	header("Location: AddUser.php");
	exit();
}

switch ($_POST[NEW_USER_TYPE])
{
	case 'Student':
	case 'Faculty':
	case 'Librarian':
		break;
	default:
		header("Location: AddUser.php");
		exit();
}

$userYear = $_POST[NEW_USER_YEAR];
if ($userYear == NULL)
{
	$userYear = 0;
}

if ($_POST[NEW_USER_TYPE] == 'Student' && $userYear == 0)
{
	header("Location: AddUser.php");
	exit();
}

// TODO : Escape String for SQL Statement
$userType = $_POST[NEW_USER_TYPE];
$userName = $_POST[NEW_USER_NAME];
$userAddress = $_POST[NEW_USER_ADDRESS];
$userPhone = $_POST[NEW_USER_PHONE];
$userEmail = $_POST[NEW_USER_EMAIL];
$userPassword = $_POST[NEW_USER_PASSWORD];

require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/DatabaseLogic/DBConnection.php';

$user = getUserInfo();
$role = $user->getRole();
$conn = DBConnection::getConnection($role);
if ($conn)
{
	$result = $conn->insertUser($userType, $userName, $userAddress, $userPhone, $userEmail, $userYear, $userPassword);
	header("Location: UserList.php");
	exit();
}
?>