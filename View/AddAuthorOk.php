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
			$actionType = ACTION_EDIT;
			checkNullwithRedirect(ADD_AUTHOR_PAGE, $_GET[AUTHOR_ID]);
			checkNullwithRedirect(ADD_AUTHOR_PAGE, $_GET[AUTHOR_NAME]);
			editAuthor();
			exit();
			break;
		case ACTION_DEL:
			$actionType = ACTION_DEL;
			checkNullwithRedirect(ADD_AUTHOR_PAGE, $_GET[AUTHOR_ID]);
			delAuthor();
			exit();
			break;
		case ACTION_ADD:
		default:
			break;
	}
}

checkNullwithRedirect(ADD_AUTHOR_PAGE, $_GET[AUTHOR_NAME]);
addAuthor();

function addAuthor()
{
	// TODO : Escape String for SQL Statement
	$authorName = $_GET[AUTHOR_NAME];
	$redirectPage = AUTHOR_LIST_PAGE;

	$user = getUserInfo();
	$role = $user->getRole();
	$conn = DBConnection::getConnection($role);
	if ($conn)
	{
		$result = $conn->insertAuthor($authorName);
		header("Location: $redirectPage");
		exit();
	}
}

function editAuthor()
{
	// TODO : Escape String for SQL Statement
	$authorId = $_GET[AUTHOR_ID];
	$authorName = $_GET[AUTHOR_NAME];
	$redirectPage = AUTHOR_LIST_PAGE;

	$user = getUserInfo();
	$role = $user->getRole();
	$conn = DBConnection::getConnection($role);
	if ($conn)
	{
		$result = $conn->updateAuthor($authorId, $authorName);
		header("Location: $redirectPage");
		exit();
	}
}

function delAuthor()
{
	// TODO : Escape String for SQL Statement
	$authorId = $_GET[AUTHOR_ID];
	$redirectPage = AUTHOR_LIST_PAGE;

	$user = getUserInfo();
	$role = $user->getRole();
	$conn = DBConnection::getConnection($role);
	if ($conn)
	{
		$result = $conn->deleteAuthor($authorId);
		header("Location: $redirectPage");
		exit();
	}
}

/*
const AUTHOR_NAME = 'authorName';

if (!isset($_GET[AUTHOR_NAME]))
{
	header("Location: AddAuthor.php");
	exit();
}

if ($_GET[AUTHOR_NAME] == NULL)
{
	header("Location: AddAuthor.php");
	exit();
}

// TODO : Escape String for SQL Statement
$authorName = $_GET[AUTHOR_NAME];

require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/DatabaseLogic/DBConnection.php';

$user = getUserInfo();
$role = $user->getRole();
$conn = DBConnection::getConnection($role);
if ($conn)
{
	$result = $conn->insertAuthor($authorName);
	header("Location: AuthorList.php");
	exit();
}
*/
?>