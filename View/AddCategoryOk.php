<?php
/**
 * Author : Choongyeol Kim
 * Date Created : 15 October 2015
 * Date Modified : 
 */

require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/Entity/Account.php';
redirectPageWithoutSession();

require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/Global/PreDefinedConstants.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/Global/CommonFunctions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/DatabaseLogic/DBConnection.php';

$actionType = ACTION_ADD; // Default Action
if (isset($_GET[ACTION_TYPE]) && $_GET[ACTION_TYPE] != NULL)
{
	switch ($_GET[ACTION_TYPE])
	{
		case ACTION_EDIT:
			$actionType = $_GET[ACTION_TYPE];
			checkNullwithRedirect(ADD_CATEGORY_PAGE, $_GET[CATEGORY_ID]);
			checkNullwithRedirect(ADD_CATEGORY_PAGE, $_GET[CATEGORY_NAME]);
			checkNullwithRedirect(ADD_CATEGORY_PAGE, $_GET[SECTION_ID]);
			checkNullwithRedirect(ADD_CATEGORY_PAGE, $_GET[PARENT_CATEGORY_ID]);
			editCategory();
			exit();
			break;
		case ACTION_DEL:
			$actionType = $_GET[ACTION_TYPE];
			checkNullwithRedirect(ADD_CATEGORY_PAGE, $_GET[CATEGORY_ID]);
			delCategory();
			exit();
			break;
		case ACTION_ADD:
		default:
			break;
	}
}

checkNullwithRedirect(ADD_CATEGORY_PAGE, $_GET[CATEGORY_NAME]);
checkNullwithRedirect(ADD_CATEGORY_PAGE, $_GET[SECTION_ID]);
checkNullwithRedirect(ADD_CATEGORY_PAGE, $_GET[PARENT_CATEGORY_ID]);
addCategory();

function addCategory()
{
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
}

function editCategory()
{
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
}

function delCategory()
{
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
}

/*
if (!isset($_GET[CATEGORY_NAME]) || !isset($_GET[SECTION_ID]) || !isset($_GET[PARENT_CATEGORY_ID]))
{
	header("Location: AddCategory.php");
	exit();
}

if ($_GET[CATEGORY_NAME] == NULL || $_GET[SECTION_ID] == NULL || $_GET[PARENT_CATEGORY_ID] == NULL)
{
	header("Location: AddCategory.php");
	exit();
}

// TODO : Escape String for SQL Statement
$categoryName = $_GET[CATEGORY_NAME];
$sectionId = $_GET[SECTION_ID];
$parentCategoryId = $_GET[PARENT_CATEGORY_ID];

require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/DatabaseLogic/DBConnection.php';

$user = getUserInfo();
$role = $user->getRole();
$conn = DBConnection::getConnection($role);
if ($conn)
{
	$result = $conn->insertCategory($categoryName, $sectionId, $parentCategoryId);
	header("Location: AddCategory.php");
	exit();
}
*/
?>