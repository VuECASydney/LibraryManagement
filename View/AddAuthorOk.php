<?php
/**
 * Author : Choongyeol Kim
 * Date Created : 15 October 2015
 * Date Modified : 
 */

require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/Entity/Account.php';
redirectPageWithoutSession();

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
?>