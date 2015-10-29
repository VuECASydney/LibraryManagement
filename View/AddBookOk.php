<?php
/**
 * Author : Choongyeol Kim
 * Date Created : 16 October 2015
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
			checkNullwithRedirect(ADD_BOOK_PAGE, $_GET[BOOK_ID]);
			checkNullwithRedirect(ADD_BOOK_PAGE, $_GET[BOOK_NAME]);
			checkNullwithRedirect(ADD_BOOK_PAGE, $_GET[BOOK_ISBN]);
			checkNullwithRedirect(ADD_BOOK_PAGE, $_GET[PUBLISHER_ID]);
			checkNullwithRedirect(ADD_BOOK_PAGE, $_GET[CATEGORY_ID]);
			editBook();
			exit();
			break;
		case ACTION_DEL:
			$actionType = ACTION_DEL;
			checkNullwithRedirect(ADD_BOOK_PAGE, $_GET[BOOK_ID]);
			delBook();
			exit();
			break;
		case ACTION_ADD_BOOK_COPY:
			$actionType = ACTION_ADD_BOOK_COPY;
			checkNullwithRedirect(ADD_BOOK_PAGE, $_GET[BOOK_ID]);
			addBookCopy();
			exit();
			break;
		case ACTION_DEL_BOOK_COPY:
			$actionType = ACTION_DEL_BOOK_COPY;
			checkNullwithRedirect(ADD_BOOK_PAGE, $_GET[BOOK_BARCODE]);
			delBookCopy();
			exit();
			break;
		case ACTION_ADD:
		default:
			break;
	}
}

checkNullwithRedirect(ADD_BOOK_PAGE, $_GET[BOOK_NAME]);
checkNullwithRedirect(ADD_BOOK_PAGE, $_GET[BOOK_ISBN]);
checkNullwithRedirect(ADD_BOOK_PAGE, $_GET[PUBLISHER_ID]);
checkNullwithRedirect(ADD_BOOK_PAGE, $_GET[CATEGORY_ID]);
addBook();

function addBook()
{
	// TODO : Escape String for SQL Statement
	$bookName = $_GET[BOOK_NAME];
	$bookIsbn = $_GET[BOOK_ISBN];
	$publisherId = $_GET[PUBLISHER_ID];
	$categoryId = $_GET[CATEGORY_ID];
	$redirectPage = BOOK_LIST_PAGE;

	$user = getUserInfo();
	$role = $user->getRole();
	$conn = DBConnection::getConnection($role);
	if ($conn)
	{
		$result = $conn->insertBook($bookName, $bookIsbn, $publisherId, $categoryId);
		header("Location: $redirectPage");
		exit();
	}
}

function editBook()
{
	// TODO : Escape String for SQL Statement
	$bookId = $_GET[BOOK_ID];
	$bookName = $_GET[BOOK_NAME];
	$bookIsbn = $_GET[BOOK_ISBN];
	$publisherId = $_GET[PUBLISHER_ID];
	$categoryId = $_GET[CATEGORY_ID];
	$redirectPage = BOOK_LIST_PAGE;

	$user = getUserInfo();
	$role = $user->getRole();
	$conn = DBConnection::getConnection($role);
	if ($conn)
	{
		$result = $conn->updateBook($bookId, $bookName, $bookIsbn, $publisherId, $categoryId);
		header("Location: $redirectPage");
		exit();
	}
}

function delBook()
{
	// TODO : Escape String for SQL Statement
	$bookId = $_GET[BOOK_ID];
	$redirectPage = BOOK_LIST_PAGE;

	$user = getUserInfo();
	$role = $user->getRole();
	$conn = DBConnection::getConnection($role);
	if ($conn)
	{
		$result = $conn->deleteBook($bookId);
		header("Location: $redirectPage");
		exit();
	}
}

function addBookCopy()
{
	date_default_timezone_set('Australia/Sydney');
	$date = date("Y-m-d H:i:s");

	// TODO : Escape String for SQL Statement
	$bookId = $_GET[BOOK_ID];
	$redirectPage = BOOK_LIST_PAGE;

	$user = getUserInfo();
	$role = $user->getRole();
	$conn = DBConnection::getConnection($role);
	if ($conn)
	{
		$result = $conn->insertBookCopy($bookId, $date);
		header("Location: $redirectPage");
		exit();
	}
}

function delBookCopy()
{
	// TODO : Escape String for SQL Statement
	$barcodeId = $_GET[BOOK_BARCODE];
	$redirectPage = BOOK_LIST_PAGE;

	$user = getUserInfo();
	$role = $user->getRole();
	$conn = DBConnection::getConnection($role);
	if ($conn)
	{
		$result = $conn->deleteBookCopy($barcodeId);
		header("Location: $redirectPage");
		exit();
	}
}

/*
const BOOK_NAME = 'bookName';
const BOOK_ISBN = 'bookIsbn';
const PUBLISHER_ID = 'publisherId';
const CATEGORY_ID = 'categoryId';
const BOOK_ID = 'bookId';
      if($_GET[BOOK_ID]==NULL)  {

        if (!isset($_GET[BOOK_NAME]) || !isset($_GET[BOOK_ISBN]) || !isset($_GET[PUBLISHER_ID]) || !isset($_GET[CATEGORY_ID]))
        {
        	header("Location: AddBook.php");
        	exit();
        }

        if ($_GET[BOOK_NAME] == NULL || $_GET[BOOK_ISBN] == NULL || $_GET[PUBLISHER_ID] == NULL || $_GET[CATEGORY_ID] == NULL)
        {
        	header("Location: AddBook.php");
        	exit();
        }
}    else{

        if ( !isset($_GET[PUBLISHER_ID]) || !isset($_GET[CATEGORY_ID]))
        {
        	header("Location: AddBook.php");
        	exit();
        }

        if ( $_GET[PUBLISHER_ID] == NULL || $_GET[CATEGORY_ID] == NULL)
        {
        	header("Location: AddBook.php");
        	exit();
        }

}

// TODO : Escape String for SQL Statement
$bookName = $_GET[BOOK_NAME];
$bookIsbn = $_GET[BOOK_ISBN];
$publisherId = $_GET[PUBLISHER_ID];
$categoryId = $_GET[CATEGORY_ID];
$bookId=$_GET[BOOK_ID];

require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/DatabaseLogic/DBConnection.php';

$user = getUserInfo();
$role = $user->getRole();
$conn = DBConnection::getConnection($role);
if ($conn)
{
         if($bookId>0)  {

            echo($bookId);

           	$result = $conn->editBook($bookId, $publisherId, $categoryId);
        	header("Location: BookList.php");
        	exit();
         }
         else{
        	$result = $conn->insertBook($bookName, $bookIsbn, $publisherId, $categoryId);
        	header("Location: BookList.php");
        	exit();
    }
}
*/
?>