<!-- 
Author : Choongyeol Kim
Date Created : 7 October 2015
Date Modified : 
-->
<?php
session_start();
const USER_INFO = 'userinfo';

require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/Entity/User.php';
use LibraryManagement\Entity\User;

function getRedirectPageByRole($role)
{
	$redirect_page = NULL;
	switch ($role)
	{
		case 'Admin':
			$redirect_page = 'DashBoard.php';
			break;
		case 'Librarian':
			$redirect_page = 'BookList.php';
			break;
		case 'Faculty':
			$redirect_page = 'MyAccount.php';
			break;
		case 'Student':
			$redirect_page = 'MyAccount.php';
			break;
		default:
			$redirect_page = 'MyAccount.php';
			break;
	}
	return $redirect_page;
}

function getUserInfo()
{
	$user = unserialize($_SESSION[USER_INFO]);
	return $user;
}

function redirectPageWithSession()
{
	if (isset($_SESSION[USER_INFO]))
	{
		$user = getUserInfo();
		$redirect_page = getRedirectPageByRole($user->getRole());
		header("Location: $redirect_page");
		exit();
	}
}

function redirectPageWithoutSession()
{
	if (!isset($_SESSION[USER_INFO]))
	{
		header('Location: index.php');
		exit();
	}
}
?>