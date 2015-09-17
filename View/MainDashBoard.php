
<!-- 
Author : Brijender Parta Rana
Date Created:21 August 2015
Date Modified :

-->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<?php
		$tital="Home Page";
		//if($role="staff")
		//{
			include("./shared/Header.php");
		//}
		//if else($role="Lib")
		//{
		//	include("./shared/libHeader.php");
		//}
		//else
		//{
		//	include("./shared/StudentHeader.php");
		//}
?>                   	  <?php

                         if($role=="Admin"  ){
                             	include("dashboard.php");
                       }    else if   ($role=="Lib")
                       {
                             	include("booklist.php");

                       }     else{

                          // 	include("./shared/Header.php");
                       }

                       ?>


<?php
	include("./shared/Footer.php");
?>