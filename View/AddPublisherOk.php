<?php
/**
 * Author : Choongyeol Kim
 * Date Created : 15 October 2015
 * Date Modified : 
 */

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
?>