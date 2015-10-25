<?php
/**
 * Author : Choongyeol Kim
 * Date Created : 16 October 2015
 * Date Modified : 
 */

require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/Entity/Account.php';
redirectPageWithoutSession();

/*
const ACCOUNT_ID = 'userId';
const ACCOUNT_NAME = 'userName';
const ACCOUNT_TYPE = 'userType';
const ACCOUNT_ADDRESS = 'address';
const ACCOUNT_PHONE = 'phone';
const ACCOUNT_EMAIL = 'email';
const ACCOUNT_ENROLL_YEAR = 'enrollYear';
const ACCOUNT_PASSWORD = 'userPassword';
*/

require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/Global/PreDefinedConstants.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/Global/CommonFunctions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/DatabaseLogic/DBConnection.php';

$actionType = ACTION_ADD; // Default Action
if (isset($_POST[ACTION_TYPE]) && $_POST[ACTION_TYPE] != NULL)
{
	switch ($_POST[ACTION_TYPE])
	{
		case ACTION_EDIT:
			$actionType = $_POST[ACTION_TYPE];
			// ["act"]=>"edit" ["userId"]=>"3000000" ["userName"]=>"" ["address"]=>"" ["phone"]=>"" ["email"]=>"" ["enrollYear"]=>"" ["userPassword"]=>""

			//checkNullwithRedirect(ADD_USER_PAGE, $_POST[CATEGORY_ID]);
			//checkNullwithRedirect(ADD_USER_PAGE, $_POST[CATEGORY_NAME]);
			//checkNullwithRedirect(ADD_USER_PAGE, $_POST[SECTION_ID]);
			//checkNullwithRedirect(ADD_USER_PAGE, $_POST[PARENT_CATEGORY_ID]);
			editUser();
			exit();
			break;
		case ACTION_DEL:
			$actionType = $_POST[ACTION_TYPE];
			//checkNullwithRedirect(ADD_USER_PAGE, $_POST[CATEGORY_ID]);
			delUser();
			exit();
			break;
		case ACTION_ADD:
		default:
			break;
	}
}

/*
const ACCOUNT_ID = 'userId';
const ACCOUNT_NAME = 'userName';
const ACCOUNT_TYPE = 'userType';
const ACCOUNT_ADDRESS = 'address';
const ACCOUNT_PHONE = 'phone';
const ACCOUNT_EMAIL = 'email';
const ACCOUNT_ENROLL_YEAR = 'enrollYear';
const ACCOUNT_PASSWORD = 'userPassword';
*/

checkNullwithRedirect(ADD_USER_PAGE, $_POST[ACCOUNT_TYPE]);
checkNullwithRedirect(ADD_USER_PAGE, $_POST[ACCOUNT_NAME]);
checkNullwithRedirect(ADD_USER_PAGE, $_POST[ACCOUNT_ADDRESS]);
checkNullwithRedirect(ADD_USER_PAGE, $_POST[ACCOUNT_PHONE]);
checkNullwithRedirect(ADD_USER_PAGE, $_POST[ACCOUNT_EMAIL]);
//checkNullwithRedirect(ADD_USER_PAGE, $_POST[ACCOUNT_ENROLL_YEAR]);
checkNullwithRedirect(ADD_USER_PAGE, $_POST[ACCOUNT_PASSWORD]);
switch ($_POST[ACCOUNT_TYPE])
{
	case 'Student':
	case 'Faculty':
	case 'Librarian':
		break;
	default:
		header('Location: ' . ADD_USER_PAGE);
		exit();
}

if (!isset($_POST[ACCOUNT_ENROLL_YEAR])) {
	header('Location: ' . ADD_USER_PAGE);
	exit();
}

$userYear = $_POST[ACCOUNT_ENROLL_YEAR];
if ($userYear == NULL)
{
	$userYear = 0;
}

if ($_POST[ACCOUNT_TYPE] == 'Student' && $userYear == 0)
{
	header('Location: ' . ADD_USER_PAGE);
	exit();
}
addUser();

function addUser()
{
	global $userYear;

// ["act"]=>"add" ["userId"]=> "" ["userType"]=>"Student" ["userName"]=>"" ["address"]=>"" ["phone"]=>"" ["email"]=> "" ["enrollYear"]=>"" ["userPassword"]=>""
/*
	// TODO : Escape String for SQL Statement
	$categoryName = $_GET[CATEGORY_NAME];
	$sectionId = $_GET[SECTION_ID];
	$parentCategoryId = $_GET[PARENT_CATEGORY_ID];
	$redirectPage = CATEGORY_LIST_PAGE;

	$user = getUserInfo();
	$role = $user->getRole();
	$conn = DBConnection::getConnection($role);
	if ($conn)
	{
		$result = $conn->insertCategory($categoryName, $sectionId, $parentCategoryId);
		header("Location: $redirectPage");
		exit();
	}
*/

	// TODO : Escape String for SQL Statement
	$userType = $_POST[ACCOUNT_TYPE];
	$userName = $_POST[ACCOUNT_NAME];
	$userAddress = $_POST[ACCOUNT_ADDRESS];
	$userPhone = $_POST[ACCOUNT_PHONE];
	$userEmail = $_POST[ACCOUNT_EMAIL];
	$userPassword = $_POST[ACCOUNT_PASSWORD];

	$user = getUserInfo();
	$role = $user->getRole();
	$conn = DBConnection::getConnection($role);
	if ($conn)
	{
		$result = $conn->insertUser($userType, $userName, $userAddress, $userPhone, $userEmail, $userYear, $userPassword);
		header('Location: ' . USER_LIST_PAGE);
		exit();
	}
}

function editUser()
{
/*
	// TODO : Escape String for SQL Statement
	$categoryId = $_GET[CATEGORY_ID];
	$categoryName = $_GET[CATEGORY_NAME];
	$sectionId = $_GET[SECTION_ID];
	$parentCategoryId = $_GET[PARENT_CATEGORY_ID];
	$redirectPage = CATEGORY_LIST_PAGE;

	$user = getUserInfo();
	$role = $user->getRole();
	$conn = DBConnection::getConnection($role);
	if ($conn)
	{
		$result = $conn->updateCategory($categoryId, $categoryName, $sectionId, $parentCategoryId);
		header("Location: $redirectPage");
		exit();
	}
*/
}

function delUser()
{
/*
	// TODO : Escape String for SQL Statement
	$categoryId = $_GET[CATEGORY_ID];
	$redirectPage = CATEGORY_LIST_PAGE;

	$user = getUserInfo();
	$role = $user->getRole();
	$conn = DBConnection::getConnection($role);
	if ($conn)
	{
		$result = $conn->deleteCategory($categoryId);
		header("Location: $redirectPage");
		exit();
	}
*/
}

/*
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
*/
?>