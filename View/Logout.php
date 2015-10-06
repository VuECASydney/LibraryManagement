<!-- 
Author : Choongyeol Kim
Date Created : 7 October 2015
Date Modified : 
-->
<?php
require_once './Shared/Account.php';
logout();

function logout()
{
	if (isset($_SESSION[USER_INFO]))
	{
		session_destroy();
	}
	header('Location: index.php');
	exit();
}
?>