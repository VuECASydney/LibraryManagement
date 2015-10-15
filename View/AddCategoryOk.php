<?php
/**
 * Author : Choongyeol Kim
 * Date Created : 15 October 2015
 * Date Modified : 
 */

require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/Entity/Account.php';
redirectPageWithoutSession();

const CATEGORY_NAME = 'categoryName';
const SECTION_ID = 'sectionId';
const PARENT_CATEGORY_ID = 'parentCategoryId';

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
?>