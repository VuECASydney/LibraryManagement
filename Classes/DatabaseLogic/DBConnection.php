<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/DatabaseLogic/DBConfig.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/Global/Collection.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/Global/CacheManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/Entity/User.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/Entity/Section.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/Entity/Category.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/Entity/Publisher.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/Entity/Author.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/Entity/Book.php';

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
		//echo '~DBConn_Librarian<br />';
	}

	function getAllSection()
	{
		$key = 'section';
		$collection = CacheManager::get($key, TRUE);
		if ($collection)
			return $collection;

		$this->connect();
		$result = $this->conn->query("CALL sp_get_all_section()");

		$collection = new Collection();
		if ($result)
		{
			//$row = $result->fetch_assoc();
			while ($obj = $result->fetch_object())
			{
				$section = new Section();
				$section->setId($obj->Section_id);
				$section->setName($obj->Section_name);
				$collection->addItem($section, $obj->Section_id);
			}
			$result->close(); // for fetch_object()
		}
		//$result->free_result(); // for fetch_assoc()
		$this->close();

		CacheManager::set($key, $collection, TRUE);
		return $collection;
	}

	function getAllCategory()
	{
		$key = 'category';
		$collection = CacheManager::get($key, TRUE);
		if ($collection)
			return $collection;

		$this->connect();
		$result = $this->conn->query("CALL sp_get_all_category()");

		$collection = new Collection();
		if ($result)
		{
			//$row = $result->fetch_assoc();
			while ($obj = $result->fetch_object())
			{
				$category = new Category();
				$category->setId($obj->Category_id);
				$category->setSubject($obj->Subject);
				$category->setParentId($obj->Parent_id);
				$category->setSectionId($obj->Section_id);
				$category->setParentSubject($obj->Parent_subject);
				$category->setSectionName($obj->Section_name);
				$collection->addItem($category, $obj->Category_id);
			}
			$result->close(); // for fetch_object()
		}
		//$result->free_result(); // for fetch_assoc()
		$this->close();

		CacheManager::set($key, $collection, TRUE);
		return $collection;
	}

	function getAllPublisher()
	{
		$key = 'publisher';
		$collection = CacheManager::get($key, TRUE);
		if ($collection)
			return $collection;
	
		$this->connect();
		$result = $this->conn->query("CALL sp_get_all_publisher()");

		$collection = new Collection();
		if ($result)
		{
			//$row = $result->fetch_assoc();
			while ($obj = $result->fetch_object())
			{
				$publisher = new Publisher();
				$publisher->setId($obj->Publisher_id);
				$publisher->setName($obj->Name);
				$publisher->setAddress($obj->Address);
				$publisher->setPhone($obj->Phone);
				$collection->addItem($publisher, $obj->Publisher_id);
			}
			$result->close(); // for fetch_object()
		}
		//$result->free_result(); // for fetch_assoc()
		$this->close();

		CacheManager::set($key, $collection, TRUE);
		return $collection;
	}

	function getAllAuthor()
	{
		$key = 'author';
		$collection = CacheManager::get($key, TRUE);
		if ($collection)
			return $collection;

		$this->connect();
		$result = $this->conn->query("CALL sp_get_all_author()");

		$collection = new Collection();
		if ($result)
		{
			//$row = $result->fetch_assoc();
			while ($obj = $result->fetch_object())
			{
				$author = new Author();
				$author->setId($obj->Author_id);
				$author->setName($obj->Author_name);
				$collection->addItem($author, $obj->Author_id);
			}
			$result->close(); // for fetch_object()
		}
		//$result->free_result(); // for fetch_assoc()
		$this->close();

		CacheManager::set($key, $collection, TRUE);
		return $collection;
	}

	function getAllUser()
	{
		$key = 'user';
		$collection = CacheManager::get($key, TRUE);
		if ($collection)
			return $collection;

		$this->connect();
		$result = $this->conn->query("CALL sp_get_all_user()");

		$collection = new Collection();
		if ($result)
		{
			//$row = $result->fetch_assoc();
			while ($obj = $result->fetch_object())
			{
				$user = new User();
				$user->setId($obj->Account_id);
				$user->setName($obj->Name);
				$user->setRole($obj->Account_type);
				$user->setAddress($obj->Address);
				$user->setPhone($obj->Phone);
				$user->setEmail($obj->Email);
				$user->setEnrollYear($obj->Enroll_year);
				$collection->addItem($user, $obj->Account_id);
			}
			$result->close(); // for fetch_object()
		}
		//$result->free_result(); // for fetch_assoc()
		$this->close();

		CacheManager::set($key, $collection, TRUE);
		return $collection;
	}

	function getAllBook()
	{
		$key = 'book';
		$collection = CacheManager::get($key, TRUE);
		if ($collection)
			return $collection;

		$this->connect();
		$result = $this->conn->query("CALL sp_get_all_book()");

		$collection = new Collection();
		if ($result)
		{
			//$row = $result->fetch_assoc();
			while ($obj = $result->fetch_object())
			{
				$book = new Book();
				$book->setBookId($obj->Book_id);
				$book->setTitle($obj->Title);
				$book->setPublisherId($obj->Publisher_id);
				$book->setIsbn($obj->Isbn);
				$book->setCategoryId($obj->Category_id);
				$book->setPublisherName($obj->Publisher_name);
				$book->setCategoryName($obj->Subject);
				$collection->addItem($book, $obj->Book_id);
			}
			$result->close(); // for fetch_object()
		}
		//$result->free_result(); // for fetch_assoc()
		$this->close();

		CacheManager::set($key, $collection, TRUE);
		return $collection;
	}

	function insertSection($sectionName)
	{
		$retVal = NULL;
		$user = getUserInfo();
		$user_id = $user->getId();

		$this->connect();
		$result = $this->conn->query("SELECT sf_create_section('$user_id', '$sectionName') AS ret");

		if ($result)
		{
			$obj = $result->fetch_object();
			$retVal = $obj->ret;
			//echo $retVal . '<br /><br />';
			$result->close();
		}
		$this->close();

		if ($retVal == 1)
		{
			//echo $retVal . ' Success<br /><br />';
			CacheManager::del('section');
			return TRUE;
		}
		else
		{
			//echo $retVal . ' Failure<br /><br />';
			return FALSE;
		}
	}

	function insertCategory($categoryName, $sectionId, $parentCategoryId)
	{
		$retVal = NULL;
		$user = getUserInfo();
		$user_id = $user->getId();

		$this->connect();
		if ($parentCategoryId == 0)
		{
			//$parentCategoryId = 'NULL';
			$result = $this->conn->query("SELECT sf_create_category('$user_id', '$categoryName', NULL, '$sectionId') AS ret");
		}
		else
		{
			$result = $this->conn->query("SELECT sf_create_category('$user_id', '$categoryName', '$parentCategoryId', '$sectionId') AS ret");
		}

		if ($result)
		{
			$obj = $result->fetch_object();
			$retVal = $obj->ret;
			//echo $retVal . '<br /><br />';
			$result->close();
		}
		$this->close();

		if ($retVal == 1)
		{
			//echo $retVal . ' Success<br /><br />';
			CacheManager::del('category');
			return TRUE;
		}
		else
		{
			//echo $retVal . ' Failure<br /><br />';
			return FALSE;
		}
	}

	function insertPublisher($publisherName, $publisherAddress, $publisherPhone)
	{
		$retVal = NULL;
		$user = getUserInfo();
		$user_id = $user->getId();

		$sqlStr = "SELECT sf_create_publisher('$user_id', '$publisherName', ";
		if ($publisherAddress == NULL)
		{
			$sqlStr = $sqlStr . "NULL, ";
		}
		else
		{
			$sqlStr = $sqlStr . "'$publisherAddress', ";
		}

		if ($publisherPhone == NULL)
		{
			$sqlStr = $sqlStr . "NULL) AS ret";
		}
		else
		{
			$sqlStr = $sqlStr . "'$publisherPhone') AS ret";
		}

		$this->connect();
		$result = $this->conn->query($sqlStr);

		if ($result)
		{
			$obj = $result->fetch_object();
			$retVal = $obj->ret;
			//echo $retVal . '<br /><br />';
			$result->close();
		}
		$this->close();

		if ($retVal == 1)
		{
			//echo $retVal . ' Success<br /><br />';
			CacheManager::del('publisher');
			return TRUE;
		}
		else
		{
			//echo $retVal . ' Failure<br /><br />';
			return FALSE;
		}
	}

	function insertAuthor($authorName)
	{
		$retVal = NULL;
		$user = getUserInfo();
		$user_id = $user->getId();

		$this->connect();
		$result = $this->conn->query("SELECT sf_create_author('$user_id', '$authorName') AS ret");

		if ($result)
		{
			$obj = $result->fetch_object();
			$retVal = $obj->ret;
			//echo $retVal . '<br /><br />';
			$result->close();
		}
		$this->close();

		if ($retVal == 1)
		{
			//echo $retVal . ' Success<br /><br />';
			CacheManager::del('author');
			return TRUE;
		}
		else
		{
			//echo $retVal . ' Failure<br /><br />';
			return FALSE;
		}
	}

	function insertUser($userType, $userName, $userAddress, $userPhone, $userEmail, $userYear, $userPassword)
	{
		$retVal = NULL;
		$user = getUserInfo();
		$user_id = $user->getId();

		$this->connect();
		$result = $this->conn->query("CALL sp_create_account('$user_id', '$userType', '$userName', '$userAddress', '$userPhone', '$userEmail', '$userPassword', '$userYear')");

		if ($result)
		{
			$obj = $result->fetch_object();
			//$retVal = $obj->result;
			//echo $retVal . '<br /><br />';
			$result->close();
		}
		$this->close();

		if ($retVal == 1)
		{
			//echo $retVal . ' Success<br /><br />';
			CacheManager::del('user');
			return TRUE;
		}
		else
		{
			//echo $retVal . ' Failure<br /><br />';
			return FALSE;
		}
	}

	function insertBook($bookName, $bookIsbn, $publisherId, $categoryId)
	{
		$retVal = NULL;
		$user = getUserInfo();
		$user_id = $user->getId();

		$this->connect();
		$result = $this->conn->query("SELECT sf_create_book('$user_id', '$bookName', '$publisherId', '$bookIsbn', '$categoryId') AS ret");

		if ($result)
		{
			$obj = $result->fetch_object();
			$retVal = $obj->ret;
			//echo $retVal . '<br /><br />';
			$result->close();
		}
		$this->close();

		if ($retVal == 1)
		{
			//echo $retVal . ' Success<br /><br />';
			CacheManager::del('book');
			return TRUE;
		}
		else
		{
			//echo $retVal . ' Failure<br /><br />';
			return FALSE;
		}
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