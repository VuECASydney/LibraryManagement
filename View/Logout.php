<?php
/**
 * Author : Choongyeol Kim
 * Date Created : 7 October 2015
 * Date Modified : 
 */

require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/Entity/Account.php';
logout();

function logout()
{
	if (isset($_SESSION[USER_INFO]))
	{
	    unset($_SESSION[USER_INFO]);
        session_destroy();


	}
	header('Location: index.php');
	exit();
}
?>