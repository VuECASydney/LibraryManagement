<?php
// admin (password : admin1) can execute - sp_create_account, sp_reset_password
// library_user (password : user1) can execute - sf_check_account
// sf_check_account - check user id with password
// sp_reset_password - reset user's password
// sp_create_account - create user account

function testFunc1()
{
	// Connection Test Code
	$conn = new mysqli('localhost', 'admin', 'admin1', 'auth');
	/* check connection */
	if ($conn->connect_errno) {
		printf("Connect failed: %s\n", $conn->mysqli_connect_error);
		exit();
	}
	// Stored Procedure Usage
	$result = $conn->query('CALL sp_reset_password(0, \'e25558\', \'0000\')');
	$result->mysqli_free_result();

	$conn->close();
}

function testFunc2()
{
	// Connection Test Code
	$conn = new mysqli('localhost', 'library_user', 'user1', 'auth');
	/* check connection */
	if ($conn->connect_errno) {
		printf("Connect failed: %s\n", $conn->mysqli_connect_errno);
		exit();
	}
	// Stored Function Usage
	$result = $conn->query('SELECT sf_check_account(0, \'e25558\', \'0000\') AS ret');
	if (!$result) {
		die('Could not query:' . mysql_error());
	}

	$row = $result->fetch_assoc();

	//var_dump($row['ret']);
	if ($row['ret'] == '0') {
		echo '<br />Login Fail<br />';
	} else {
		echo '<br />Login Success<br />';
	}

	$result->mysqli_free_result();
	$conn->close();
}

//testFunc1();

testFunc2();

?>