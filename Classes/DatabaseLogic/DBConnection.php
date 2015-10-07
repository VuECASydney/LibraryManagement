<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/View/Shared/Account.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/DatabaseLogic/DBConfig.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/Globel/Collection.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/Entity/User.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/Entity/Section.php';

abstract class DBInterface
{
	/* Database config */
	const HOST_NAME		= 'localhost';
	const DATABASE_NAME	= 'library';
	private $db_connect_name;
	private $db_connect_pass;
	protected $conn;

	function __construct($user, $pass)
	{
		$this->db_connect_name = $user;
		$this->db_connect_pass = $pass;
	}

	function __destruct()
	{
		$this->close();
		//echo '~DBInterface<br />';
	}

	function connect()
	{
		// Connection Test Code
		$this->conn = new mysqli(DbInterface::HOST_NAME, $this->db_connect_name, $this->db_connect_pass, DbInterface::DATABASE_NAME);
		// Check Connection
		if ($this->conn->connect_errno)
		{
			//echo 'Connection Error' . $this->conn->connect_errno . '<br />';
			printf("Connect Failed: %s<br />", $this->conn->connect_errno);
			exit();
		}
	}

	function close()
	{
		if ($this->conn)
		{
			$this->conn->close();
			$this->conn = NULL;
		}
	}
}

class DBConn_User extends DBInterface
{
	function __construct()
	{
		parent::__construct(USER_NAME, USER_PASS);
	}

	function __destruct()
	{
		echo '~DBConn_User<br />';
	}
}

class DBConn_Librarian extends DBConn_User
{
	function __construct()
	{
		parent::__construct(LIBRARIAN_NAME, LIBRARIAN_PASS);
	}

	function __destruct()
	{
		echo '~DBConn_Librarian<br />';
	}

	function getAllSection()
	{
		$this->connect();
		$result = $this->conn->query("CALL sp_get_all_section()");

		$collection = NULL;
		if ($result)
		{
			//var_dump($result);
			//$row = $result->fetch_assoc();
			while ($obj = $result->fetch_object())
			{
				echo '<br /><br />';
				var_dump($obj);
				if (!$collection)
				{
					$collection = new Collection();
				}

				$section = new Section();
				$section->setId($obj->Section_id);
				$section->setName($obj->Section_name);
				$collection->addItem($obj, $obj->getId());
				echo '<br /><br />';
			}
			var_dump($collection);
			/*
			if ($obj)
			{
				//var_dump($obj);
				$retVal = $obj->result;
				switch ($obj->result)
				{
					case 0:
						$user = new User();
						$user->setId($obj->Account_id);
						$user->setName($obj->Name);
						$user->setRole($obj->Account_type);
						$user->setAddress($obj->Address);
						$user->setPhone($obj->Phone);
						$user->setEmail($obj->Email);
						$user->setEnrollYear($obj->Enroll_year);
						//echo 'Before<br /><br />'; var_dump($user); echo 'After<br /><br />';
						break;
					case 1:
						break;
					case 2:
						break;
				}
			}
			*/
			$result->close(); // for fetch_object()
		}
		else
		{
			echo 'Result NULL<br /><br />';
		}
		//$result->free_result(); // for fetch_assoc()
		$this->close();
	}
}

class DbConn_Admin extends DBConn_Librarian
{
	function __construct()
	{
		parent::__construct(ADMIN_NAME, ADMIN_PASS);
	}

	function __destruct()
	{
		echo '~DbConn_Admin<br />';
	}
}

class DBConn_Login extends DBInterface
{
	function __construct()
	{
		parent::__construct(GUEST_NAME, GUEST_PASS);
	}

	function __destruct()
	{
		parent::__destruct();
	}

	function login($user_id, $user_pass, &$retVal)
	{
		$user = NULL;
		$retVal = -1;
		$this->connect();
		$result = $this->conn->query("CALL sp_login_account('$user_id', '$user_pass')");
		if ($result)
		{
			//var_dump($result);
			//$row = $result->fetch_assoc();
			$obj = $result->fetch_object();
			if ($obj)
			{
				//var_dump($obj);
				$retVal = $obj->result;
				switch ($obj->result)
				{
					case 0:
						$user = new User();
						$user->setId($obj->Account_id);
						$user->setName($obj->Name);
						$user->setRole($obj->Account_type);
						$user->setAddress($obj->Address);
						$user->setPhone($obj->Phone);
						$user->setEmail($obj->Email);
						$user->setEnrollYear($obj->Enroll_year);
						//echo 'Before<br /><br />'; var_dump($user); echo 'After<br /><br />';
						break;
					case 1:
						break;
					case 2:
						break;
				}
			}
			$result->close(); // for fetch_object()
		}
		//$result->free_result(); // for fetch_assoc()
		$this->close();
		return $user;
	}
}

class DBConnection
{
	public static function login($user_id, $user_pass, &$result)
	{
		$result = -1;
		$conn = new DBConn_Login();
		$user = $conn->login($user_id, $user_pass, $result);
		//echo 'RESULT : ' . $result . '<br /><br />';
		//var_dump($user);
		return $user;
	}

	public static function getConnection($role)
	{
		$conn = NULL;
		switch ($role)
		{
			case 'Admin':
				//$conn = new DBConn_Admin();
				$conn = new DBConn_Librarian();
				break;
			case 'Librarian':
				$conn = new DBConn_Librarian();
				break;
			case 'Faculty':
				$conn = new DBConn_User();
				break;
			case 'Student':
				$conn = new DBConn_User();
				break;
			default:
				break;
		}
		return $conn;
	}

	public static function getInstance($user_id, $user_pass)
	{
		$result = NULL;
		$user = NULL;
		$conn = new DBConn_Login();
		$conn->connect();
		$conn->login($user_id, $user_pass, $result, $user);
		if (!is_null($user))
		{
			var_dump($user);
			switch ($user->type)
			{
				case 'Admin':
					$conn = new DBConn_Admin();
					break;
				case 'Librarian':
					$conn = new DBConn_Librarian();
					break;
				case 'Faculty':
					$conn = new DBConn_User();
					break;
				case 'Student':
					$conn = new DBConn_User();
					break;
				default:
					$conn->close();
					$conn = NULL;
					break;
			}
		}
		else
		{
			$conn->close();
			$conn = NULL;
		}
		return $conn;
	}
}
?>