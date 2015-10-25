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
			checkNullwithRedirect(ADD_PUBLISHER_PAGE, $_GET[PUBLISHER_ID]);
			checkNullwithRedirect(ADD_PUBLISHER_PAGE, $_GET[PUBLISHER_NAME]);
			checkNullwithRedirect(ADD_PUBLISHER_PAGE, $_GET[PUBLISHER_ADDRESS]);
			checkNullwithRedirect(ADD_PUBLISHER_PAGE, $_GET[PUBLISHER_PHONE]);
			editPublisher();
			exit();
			break;
		case ACTION_DEL:
			$actionType = $_GET[ACTION_TYPE];
			checkNullwithRedirect(ADD_PUBLISHER_PAGE, $_GET[PUBLISHER_ID]);
			delPublisher();
			exit();
			break;
		case ACTION_ADD:
		default:
			break;
	}
}

checkNullwithRedirect(ADD_PUBLISHER_PAGE, $_GET[PUBLISHER_NAME]);
checkNullwithRedirect(ADD_PUBLISHER_PAGE, $_GET[PUBLISHER_ADDRESS]);
checkNullwithRedirect(ADD_PUBLISHER_PAGE, $_GET[PUBLISHER_PHONE]);
addPublisher();

function addPublisher()
{
	// TODO : Escape String for SQL Statement
	$publisherName = $_GET[PUBLISHER_NAME];
	$publisherAddress = $_GET[PUBLISHER_ADDRESS];
	$publsiherPhone = $_GET[PUBLISHER_PHONE];
	$redirectPage = PUBLISHER_LIST_PAGE;

	$user = getUserInfo();
	$role = $user->getRole();
	$conn = DBConnection::getConnection($role);
	if ($conn)
	{
		$result = $conn->insertPublisher($publisherName, $publisherAddress, $publsiherPhone);
		header("Location: $redirectPage");
		exit();
	}
}

function editPublisher()
{
	// TODO : Escape String for SQL Statement
	$publisherId = $_GET[PUBLISHER_ID];
   	$publisherName = $_GET[PUBLISHER_NAME];
	$publisherAddress = $_GET[PUBLISHER_ADDRESS];
	$publsiherPhone = $_GET[PUBLISHER_PHONE];
	$redirectPage = PUBLISHER_LIST_PAGE;

	$user = getUserInfo();
	$role = $user->getRole();
	$conn = DBConnection::getConnection($role);
	if ($conn)
	{
		$result = $conn->updatePublisher($publisherId, $publisherName, $publisherAddress, $publsiherPhone);
		header("Location: $redirectPage");
		exit();
	}
}

function delPublisher()
{
	// TODO : Escape String for SQL Statement
  	$publisherId = $_GET[PUBLISHER_ID];
	$redirectPage = PUBLISHER_LIST_PAGE;

	$user = getUserInfo();
	$role = $user->getRole();
	$conn = DBConnection::getConnection($role);
	if ($conn)
	{
		//var_dump($_POST);
		$result = $conn->deletePublisher($publisherId);
		header("Location: $redirectPage");
		exit();
	}
}

/*
require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/Entity/Account.php';
redirectPageWithoutSession();

const PUBLISHER_NAME = 'publisherName';
const PUBLISHER_ADDRESS = 'address';
const PUBLISHER_PHONE = 'phone';

if (!isset($_GET[PUBLISHER_NAME]) || !isset($_GET[PUBLISHER_ADDRESS]) || !isset($_GET[PUBLISHER_ADDRESS]) )
{
	header("Location: AddPublisher.php");
	exit();
}

if ($_GET[PUBLISHER_NAME] == NULL)
{
	header("Location: AddPublisher.php");
	exit();
}

// TODO : Escape String for SQL Statement
$publisherName = $_GET[PUBLISHER_NAME];
$publisherAddress = $_GET[PUBLISHER_ADDRESS];
$publisherPhone = $_GET[PUBLISHER_PHONE];

require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/DatabaseLogic/DBConnection.php';

$user = getUserInfo();
$role = $user->getRole();
$conn = DBConnection::getConnection($role);
if ($conn)
{
	$result = $conn->insertPublisher($publisherName, $publisherAddress, $publisherPhone);
	header("Location: PublisherList.php");
	exit();
}
*/
?>