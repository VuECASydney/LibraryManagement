<?php
/**
 * Author : Choongyeol Kim
 * Date Created : 7 October 2015
 * Date Modified : 
 */

require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/Entity/Account.php';
redirectPageWithSession();

require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/DatabaseLogic/DBConnection.php';

$user = login('index.php');
$redirect_page = getRedirectPageByRole($user->getRole());
header("Location: $redirect_page");
exit();

function login($redirect_page)
{
	if (!isset($_POST["user_id"]) || !isset($_POST["user_password"]))
	{
		header("Location: $redirect_page");
		exit();
	}

	$user_id = $_POST["user_id"];
	$user_pass = $_POST["user_password"];
	$result = -1;
	$user = DBConnection::login($user_id, $user_pass, $result);

	if (!$user)
	{
		//sleep(5);
		header("Location: $redirect_page");
		exit();
	}

	$_SESSION[USER_INFO] = serialize($user);
	return $user;
}
?>