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
var_dump($_GET);

$actionType = ACTION_ADD; // Default Action
if (isset($_GET[ACTION_TYPE]) && $_GET[ACTION_TYPE] != NULL)
{
	switch ($_GET[ACTION_TYPE])
	{
		case ACTION_EDIT:
			$actionType = $_GET[ACTION_TYPE];
			checkNullwithRedirect(ADD_SECTION_PAGE, $_GET[SECTION_ID]);
			checkNullwithRedirect(ADD_SECTION_PAGE, $_GET[SECTION_NAME]);
			editSection();
			break;
		case ACTION_DEL:
			$actionType = $_GET[ACTION_TYPE];
			checkNullwithRedirect(ADD_SECTION_PAGE, $_GET[SECTION_ID]);
			delSection();
			break;
		case ACTION_ADD:
		default:
			checkNullwithRedirect(ADD_SECTION_PAGE, $_GET[SECTION_NAME]);
			addSection();
			break;
	}
	exit;
}
else
{
	checkNullwithRedirect(ADD_SECTION_PAGE, $_GET[SECTION_NAME]);
	addSection();
	exit;
}

function addSection()
{
	// TODO : Escape String for SQL Statement
	$sectionName = $_GET[SECTION_NAME];
	$redirectPage = SECTION_LIST_PAGE;

	$user = getUserInfo();
	$role = $user->getRole();
	$conn = DBConnection::getConnection($role);
	if ($conn)
	{
		$result = $conn->insertSection($sectionName);
		header("Location: $redirectPage");
		exit();
	}
}

function editSection()
{
	// TODO : Escape String for SQL Statement
	$sectionId = $_GET[SECTION_ID];
	$sectionName = $_GET[SECTION_NAME];
	$redirectPage = SECTION_LIST_PAGE;

	$user = getUserInfo();
	$role = $user->getRole();
	$conn = DBConnection::getConnection($role);
	if ($conn)
	{
		$result = $conn->updateSection($sectionId, $sectionName);
		header("Location: $redirectPage");
		exit();
	}
}

function delSection()
{
	// TODO : Escape String for SQL Statement
	$sectionId = $_GET[SECTION_ID];
	$redirectPage = SECTION_LIST_PAGE;

	$user = getUserInfo();
	$role = $user->getRole();
	$conn = DBConnection::getConnection($role);
	if ($conn)
	{
		$result = $conn->deleteSection($sectionId);
		header("Location: $redirectPage");
		exit();
	}
}

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