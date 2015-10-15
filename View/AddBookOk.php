<?php
/**
 * Author : Choongyeol Kim
 * Date Created : 16 October 2015
 * Date Modified : 
 */

require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/Entity/Account.php';
redirectPageWithoutSession();

const BOOK_NAME = 'bookName';
const BOOK_ISBN = 'bookIsbn';
const PUBLISHER_ID = 'publisherId';
const CATEGORY_ID = 'categoryId';

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

// TODO : Escape String for SQL Statement
$bookName = $_GET[BOOK_NAME];
$bookIsbn = $_GET[BOOK_ISBN];
$publisherId = $_GET[PUBLISHER_ID];
$categoryId = $_GET[CATEGORY_ID];

require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/DatabaseLogic/DBConnection.php';

$user = getUserInfo();
$role = $user->getRole();
$conn = DBConnection::getConnection($role);
if ($conn)
{
	$result = $conn->insertBook($bookName, $bookIsbn, $publisherId, $categoryId);
	header("Location: BookList.php");
	exit();
}
?>