<?php
/**
 * Author : Choongyeol Kim
 * Date Created : 25 October 2015
 * Date Modified : 
 */

function checkNullwithRedirect($redirectPage, $str)
{
	if (!isset($str) || $str == NULL)
	{
		if (isset($redirectPage) && $redirectPage != NULL)
		{
			header("Location: $redirectPage");
		}
		exit;
	}
}
?>