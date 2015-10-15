<?php
/**
 * Author : Brijender Parta Rana
 * Date Created : 21 August 2015
 * Date Modified : 
 */
	$title = 'Home Page';
	//if($role="staff")
	//{
		require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/View/Shared/Header.php';
	//}
	//if else($role="Lib")
	//{
	//require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/View/Shared/LibHeader.php';
	//}
	//else
	//{
	//require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/View/Shared/StudentHeader.php';
	//}
?>
			<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<?php
	if ($role=="Admin") {
		require_once './DashBoard.php';
	} else if ($role=="Lib") {
		require_once './BookList.php';
	} else {
	//require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/View/Shared/Header.php';
	}
	require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/View/Shared/Footer.php';
?>