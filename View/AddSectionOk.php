<?php
/**
 * Author : Choongyeol Kim
 * Date Created : 15 October 2015
 * Date Modified : 
 */

// array(3) { ["act"]=> string(3) "add" ["sectionId"]=> string(0) "" ["sectionName"]=> string(0) "" } 
// array(3) { ["act"]=> string(4) "edit" ["sectionId"]=> string(1) "1" ["sectionName"]=> string(1) "C" } 

// ["act"]=>"add" ["sectionId"]=>"" ["sectionName"]=>""
// ["act"]=>"edit" ["sectionId"]=>"1"
// ["act"]=>"del" ["sectionId"]=>"1"
require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/Entity/Account.php';
redirectPageWithoutSession();

require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/Global/PreDefinedConstants.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/Global/CommonFunctions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/DatabaseLogic/DBConnection.php';
var_dump($_GET);
/*
$actionType = ACTION_ADD; // Default Action
if (isset($_GET[ACTION_TYPE]) && $_GET[ACTION_TYPE] != NULL)
{
	switch ($_GET[ACTION_TYPE])
	{
		case ACTION_EDIT:
			$actionType = $_GET[ACTION_TYPE];
			editSection();
			break;
		case ACTION_DEL:
			$actionType = $_GET[ACTION_TYPE];
			checkNullwithRedirect(ADD_SECTION_PAGE, $_GET[CATEGORY_ID]);
			delSection();
			break;
		case ACTION_ADD:
		default:
			checkNullwithRedirect(ADD_SECTION_PAGE, $_GET[CATEGORY_NAME]);
			checkNullwithRedirect(ADD_SECTION_PAGE, $_GET[SECTION_ID]);
			checkNullwithRedirect(ADD_SECTION_PAGE, $_GET[PARENT_CATEGORY_ID]);
			addSection();
			break;
	}
	exit;
}
else
{
	checkNullwithRedirect(ADD_SECTION_PAGE, $_GET[CATEGORY_NAME]);
	checkNullwithRedirect(ADD_SECTION_PAGE, $_GET[SECTION_ID]);
	checkNullwithRedirect(ADD_SECTION_PAGE, $_GET[PARENT_CATEGORY_ID]);
	addCategory();
	exit;
}

function addSection()
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

function editSection()
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

function delSection()
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
*/

/*
require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/Entity/Account.php';
redirectPageWithoutSession();

const SECTION_NAME = 'sectionName';

if (!isset($_GET[SECTION_NAME]))
{
	header("Location: AddSection.php");
	exit();
}

if ($_GET[SECTION_NAME] == NULL)
{
	header("Location: AddSection.php");
	exit();
}

// TODO : Escape String for SQL Statement
$sectionName = $_GET[SECTION_NAME];

require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/DatabaseLogic/DBConnection.php';

$user = getUserInfo();
$role = $user->getRole();
$conn = DBConnection::getConnection($role);
if ($conn)
{
	$result = $conn->insertSection($sectionName);
	header("Location: SectionList.php");
	exit();
}
*/
?>