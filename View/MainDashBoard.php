<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<?php
/**
 * Author : Brijender Parta Rana
 * Date Created : 21 August 2015
 * Date Modified : 
 */
	$title = 'Home Page';
	//if($role="staff")
	//{
		require_once './Shared/Header.php';
	//}
	//if else($role="Lib")
	//{
	//require_once './Shared/libHeader.php';
	//}
	//else
	//{
	//require_once './Shared/StudentHeader.php';
	//}

	if ($role=="Admin") {
		require_once 'dashboard.php';
	} else if ($role=="Lib") {
		require_once 'booklist.php';
	} else {
	//require_once './shared/Header.php';
	}
	require_once './Shared/Footer.php';
?>