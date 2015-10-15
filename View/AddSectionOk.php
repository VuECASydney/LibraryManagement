<?php
/**
 * Author : Choongyeol Kim
 * Date Created : 15 October 2015
 * Date Modified : 
 */

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
?>