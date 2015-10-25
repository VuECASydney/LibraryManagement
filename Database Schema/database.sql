-- database account : admin/librarian/user
-- admin : 

CREATE DATABASE IF NOT EXISTS library;
USE library;

DROP TABLE IF EXISTS publisher CASCADE;

CREATE TABLE publisher
(
	Publisher_id	INT NOT NULL AUTO_INCREMENT,
	Name			VARCHAR(25) NOT NULL,
	Address			VARCHAR(50) DEFAULT NULL,
	Phone			VARCHAR(20) DEFAULT NULL,
	PRIMARY KEY (Publisher_id),
	UNIQUE INDEX idx_publisher_name (Name)
);

CREATE TABLE section
(
	Section_id		INT NOT NULL AUTO_INCREMENT,
	Section_name	VARCHAR(20) NOT NULL,
	PRIMARY KEY (Section_id),
	UNIQUE INDEX idx_section_name (Section_name)
);

CREATE TABLE category
(
	Category_id		INT NOT NULL AUTO_INCREMENT,
	Subject			VARCHAR(50) NOT NULL,
	Parent_id		INT DEFAULT NULL,
	Section_id		INT NOT NULL,
	PRIMARY KEY (Category_id),
	UNIQUE INDEX idx_category_subject (Subject),
	CONSTRAINT fk_parent_category_id FOREIGN KEY (Parent_id) REFERENCES category (Category_id)
		ON UPDATE CASCADE,
	CONSTRAINT fk_section_id FOREIGN KEY (Section_id) REFERENCES section (Section_id)
		ON UPDATE CASCADE
);

CREATE TABLE book
(
	Book_id			INT NOT NULL AUTO_INCREMENT,
	Title			VARCHAR(80) NOT NULL,
	Publisher_id	INT NOT NULL,
	Isbn			BIGINT DEFAULT NULL,
	Category_id		INT NOT NULL,
	PRIMARY KEY (Book_id),
	CONSTRAINT fk_book_publisher_id FOREIGN KEY (Publisher_id) REFERENCES publisher (Publisher_id)
		ON UPDATE CASCADE,
	CONSTRAINT fk_book_category_id FOREIGN KEY (Category_id) REFERENCES category (Category_id)
		ON UPDATE CASCADE,
	INDEX idx_book_title (Title),
	UNIQUE INDEX idx_isbn (Isbn)
);

CREATE TABLE author
(
	Author_id		INT NOT NULL AUTO_INCREMENT,
	Author_name		VARCHAR(50) NOT NULL,
	PRIMARY KEY (Author_id),
	INDEX idx_author_name (Author_name)
);

CREATE TABLE book_author
(
	Book_id			INT NOT NULL,
	Author_id		INT NOT NULL,
	PRIMARY KEY (Book_id, Author_id),
	CONSTRAINT fk_book_author_book_id FOREIGN KEY (Book_id) REFERENCES book (Book_id)
		ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT fk_book_author_author_id FOREIGN KEY (Author_id) REFERENCES author (Author_id)
		ON UPDATE CASCADE,
	INDEX idx_book_author (Author_id)
);

CREATE TABLE book_copy
(
	Barcode_id		INT NOT NULL AUTO_INCREMENT,
	Book_id			INT NOT NULL,
	Stock_date		DATETIME DEFAULT NULL,
	Log_id			BIGINT DEFAULT NULL,
	PRIMARY KEY (Barcode_id),
	CONSTRAINT fk_book_copy_book_id FOREIGN KEY (Book_id) REFERENCES book (Book_id)
		ON DELETE CASCADE ON UPDATE CASCADE,
	INDEX idx_book_copy_book_id (Book_id),
	UNIQUE INDEX idx_book_copy_log_id (Log_id)
);

CREATE TABLE account_property
(
	Account_type	Enum('Student', 'Faculty', 'Librarian', 'Admin') NOT NULL,
	Max_period		INT NOT NULL,			-- Max Borrowing Period (Day)
	Max_book		INT NOT NULL,			-- Max Borrowing Books
	Fine			DECIMAL(5,2) NOT NULL,	-- Daily Fine
	PRIMARY KEY (Account_type)
);

CREATE TABLE account
(
	Virtual_id		INT NOT NULL AUTO_INCREMENT,
	Account_id		INT NOT NULL,
	Passwd			VARCHAR(100) NOT NULL,
	Account_type	Enum('Student', 'Faculty', 'Librarian', 'Admin') NOT NULL,
	PRIMARY KEY (Virtual_id),
	UNIQUE INDEX idx_account_id (Account_id),
	CONSTRAINT fk_account_type FOREIGN KEY (Account_type) REFERENCES account_property (Account_type)
		ON UPDATE CASCADE
);

CREATE TABLE staff
(
	Staff_id		INT NOT NULL AUTO_INCREMENT,
	Barcode_id		BIGINT NOT NULL DEFAULT 0,
	Virtual_id		INT DEFAULT NULL,
	Name			VARCHAR(50) NOT NULL,
	Address			VARCHAR(50) NOT NULL,
	Phone			VARCHAR(20) NOT NULL,
	Email			VARCHAR(50) NOT NULL,
	PRIMARY KEY (Staff_id),
	CONSTRAINT fk_staff_virtual_id FOREIGN KEY (Virtual_id) REFERENCES account (Virtual_id),
	UNIQUE INDEX idx_staff_virtual_id (Virtual_id),
	UNIQUE INDEX idx_staff_barcode_id (Barcode_id),
	INDEX idx_staff_name (Name)
) AUTO_INCREMENT=5000000;

CREATE TABLE student
(
	Student_id		INT NOT NULL AUTO_INCREMENT,
	Barcode_id		BIGINT NOT NULL DEFAULT 0,
	Virtual_id		INT DEFAULT NULL,
	Name			VARCHAR(50) NOT NULL,
	Address			VARCHAR(50) NOT NULL,
	Phone			VARCHAR(20) NOT NULL,
	Email			VARCHAR(50) NOT NULL,
	Enroll_year		INT NOT NULL,
	PRIMARY KEY (Student_id),
	CONSTRAINT fk_student_virtual_id FOREIGN KEY (Virtual_id) REFERENCES account (Virtual_id),
	UNIQUE INDEX idx_student_virtual_id (Virtual_id),
	UNIQUE INDEX idx_student_barcode_id (Barcode_id),
	INDEX idx_student_name (Name),
	INDEX idx_year (Enroll_year)
) AUTO_INCREMENT=3000000;

CREATE TABLE book_loan_log
(
	Log_id			BIGINT NOT NULL AUTO_INCREMENT,
	Barcode_id		INT NOT NULL,
	Borrower_id		INT NOT NULL,
	Date_out		DATETIME NOT NULL,
	Due_date		DATETIME NOT NULL,
	Return_date		DATETIME DEFAULT NULL,
	PRIMARY KEY (Log_id),
	CONSTRAINT fk_book_loan_barcode_id FOREIGN KEY (Barcode_id) REFERENCES book_copy (Barcode_id)
		ON UPDATE CASCADE,
	CONSTRAINT fk_book_loan_borrower_id FOREIGN KEY (Borrower_id) REFERENCES account (Account_id)
		ON UPDATE CASCADE,
	INDEX idx_barcode_id (Barcode_id),
	INDEX idx_borrower_id (Borrower_id)
);

CREATE TABLE book_reservation
(
	Reserve_id		BIGINT NOT NULL AUTO_INCREMENT,
	Barcode_id		INT NOT NULL,
	Reserve_date	DATETIME NOT NULL,
	Account_id		INT NOT NULL,
	Log_id			BIGINT DEFAULT NULL,
	PRIMARY KEY (Reserve_id),
	CONSTRAINT fk_book_reserve_barcode_id FOREIGN KEY (Barcode_id) REFERENCES book_copy (Barcode_id)
		ON UPDATE CASCADE,
	CONSTRAINT fk_book_reserve_account_id FOREIGN KEY (Account_id) REFERENCES account (Account_id)
		ON UPDATE CASCADE,
	CONSTRAINT fk_book_reserve_log_id FOREIGN KEY (Log_id) REFERENCES book_loan_log (Log_id)
		ON UPDATE CASCADE,
	UNIQUE INDEX idx_reserve_barcode_id_date (Barcode_id, Reserve_date),
	INDEX idx_reserve_date (Reserve_date),
	UNIQUE INDEX idx_reserve_log_id (Log_id),
	INDEX idx_reserve_account_id (Account_id)
);

CREATE TABLE fine_log
(
	Fine_id			BIGINT NOT NULL AUTO_INCREMENT,
	Barcode_id		INT NOT NULL,
	Borrower_id		INT NOT NULL,
	Log_id			BIGINT NOT NULL,
	Amount			DECIMAL(5,2) NOT NULL,
	Payment_date	DATETIME NOT NULL,
	PRIMARY KEY (Fine_id),
	CONSTRAINT fk_fine_barcode_id FOREIGN KEY (Barcode_id) REFERENCES book_copy (Barcode_id)
		ON UPDATE CASCADE,
	CONSTRAINT fk_fine_borrower_id FOREIGN KEY (Borrower_id) REFERENCES account (Account_id)
		ON UPDATE CASCADE,
	CONSTRAINT fk_fine_log_id FOREIGN KEY (Log_id) REFERENCES book_loan_log (Log_id)
		ON UPDATE CASCADE,
	INDEX idx_fine_barcode_id (Barcode_id),
	INDEX idx_fine_borrower_id (Borrower_id),
	UNIQUE INDEX idx_fine_log_id (Log_id),
	INDEX idx_fine_payment_date (Payment_date)
);

ALTER TABLE book_copy ADD CONSTRAINT fk_book_copy_log_id FOREIGN KEY (Log_id) REFERENCES book_loan_log (Log_id) ON UPDATE CASCADE;

DELIMITER $$
DROP FUNCTION IF EXISTS sf_get_permission1$$

CREATE FUNCTION sf_get_permission1(executor_id INT) RETURNS INT
BEGIN
	DECLARE result INT DEFAULT 0; -- 0 : failure, 1 : success

	SELECT COUNT(Account_id) INTO result
	FROM account
	WHERE Account_id = executor_id AND
		Account_type = 'Admin';

	RETURN result;
END$$
DELIMITER ;

DELIMITER $$
DROP FUNCTION IF EXISTS sf_get_permission2$$

CREATE FUNCTION sf_get_permission2(executor_id INT) RETURNS INT
BEGIN
	DECLARE result INT DEFAULT 0; -- 0 : failure, 1 : success

	SELECT COUNT(Account_id) INTO result
	FROM account
	WHERE Account_id = executor_id AND
		Account_type IN ('Admin', 'Librarian');

	RETURN result;
END$$
DELIMITER ;

DELIMITER $$
DROP FUNCTION IF EXISTS sf_get_permission3$$

CREATE FUNCTION sf_get_permission3(executor_id INT) RETURNS INT
BEGIN
	DECLARE result INT DEFAULT 0; -- 0 : failure, 1 : success

	SELECT COUNT(Account_id) INTO result
	FROM account
	WHERE Account_id = executor_id AND
		Account_type IN ('Admin', 'Librarian', 'Faculty', 'Student');

	RETURN result;
END$$
DELIMITER ;

-- Setting AUTOCOMMIT is "ONLY" allowed to stored procedure, not stored function.
-- "AUTOCOMMIT" is set for using "transaction" as known as rollback functionality.
DELIMITER $$
DROP PROCEDURE IF EXISTS sp_create_account$$

CREATE PROCEDURE sp_create_account(executor_id INT, _account_type Enum('Student', 'Faculty', 'Librarian'), _name VARCHAR(50), _address VARCHAR(50), _phone VARCHAR(20), _email VARCHAR(30), _password VARCHAR(100), _year INT)
BEGIN
	DECLARE user_id, virtual_pk_id INT;
	DECLARE result INT DEFAULT 0;
	DECLARE db_error INT DEFAULT 0;
	DECLARE EXIT HANDLER FOR SQLEXCEPTION
		BEGIN
			ROLLBACK;
			SET AUTOCOMMIT=1;
			SELECT result;
		END;

	SELECT sf_get_permission1(executor_id) INTO result; -- 0 : failure, 1 : success

	IF result = 1 THEN
		SET result = 0;
		IF _account_type = 'Faculty' OR _account_type = 'Librarian' THEN
			SET AUTOCOMMIT=0;
			START TRANSACTION;
			INSERT INTO staff (Name, Address, Phone, Email) VALUES(_name, _address, _phone, _email);

			SET user_id = (SELECT LAST_INSERT_ID());
			UPDATE staff SET Barcode_id = (user_id * 10 + 20000000000000) WHERE Staff_id = user_id;
			INSERT INTO account (Account_id, Passwd, Account_type) VALUES (user_id, _password, _account_type);

			SET virtual_pk_id = (SELECT LAST_INSERT_ID());
			UPDATE staff SET Virtual_id = virtual_pk_id WHERE Staff_id = user_id;

			COMMIT;
			SET AUTOCOMMIT=1, result = 1;
		ELSEIF _account_type = 'Student' THEN
			SET AUTOCOMMIT=0;
			START TRANSACTION;

			INSERT INTO student (Name, Address, Phone, Email, Enroll_year) VALUES(_name, _address, _phone, _email, _year);

			SET user_id = (SELECT LAST_INSERT_ID());
			UPDATE student SET Barcode_id = (user_id * 10 + 20000000000000) WHERE Student_id = user_id;
			INSERT INTO account (Account_id, Passwd, Account_type) VALUES (user_id, _password, _account_type);

			SET virtual_pk_id = (SELECT LAST_INSERT_ID());
			UPDATE student SET Virtual_id = virtual_pk_id WHERE Student_id = user_id;

			COMMIT;
			SET AUTOCOMMIT=1, result = 1;
		END IF;
	END IF;
	SELECT result;
END$$
DELIMITER ;

DELIMITER $$
DROP FUNCTION IF EXISTS sf_reset_password$$

CREATE FUNCTION sf_reset_password(executor_id INT, user_id INT, new_password VARCHAR(100)) RETURNS INT
BEGIN
	DECLARE result INT DEFAULT 0; -- 0 : failure, 1 : success

	SELECT sf_get_permission1(executor_id) INTO result; -- 0 : failure, 1 : success

	IF result = 1 THEN
		UPDATE account SET Passwd = new_password
		WHERE Account_id = user_id AND
			Account_type <> 'Admin';

		SELECT COUNT(Account_id) INTO result
		FROM account
		WHERE Account_id = user_id AND
			Passwd = BINARY(new_password) AND
			Account_type <> 'Admin';
	END IF;

	RETURN result;
END$$
DELIMITER ;

DELIMITER $$
DROP FUNCTION IF EXISTS sf_change_password$$

CREATE FUNCTION sf_change_password(user_id INT, old_password VARCHAR(100), new_password VARCHAR(100)) RETURNS INT
BEGIN
	DECLARE result INT DEFAULT 0; -- 0 : failure, 1 : success
	-- executor_id is same to user_id

	IF old_password <> new_password THEN
		UPDATE account SET Passwd = new_password
		WHERE Account_id = user_id AND
			Passwd = old_password AND
			Account_type <> 'Admin';

		SELECT COUNT(Account_id) INTO result
		FROM account
		WHERE Account_id = user_id AND
			Passwd = BINARY(new_password) AND
			Account_type <> 'Admin';
	END IF;

	RETURN result;
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_login_account$$

CREATE PROCEDURE sp_login_account(user_id INT, _password VARCHAR(100))
BEGIN
	-- result is 0 if login succeeds, otherwise login fails
	-- 1 : no account or incorrect password
	-- 2 : unknown account type
	-- 3 : the number of consecutive login fail exceeds the limitation
	DECLARE result INT DEFAULT 0;
	DECLARE user_type ENUM('Student', 'Faculty', 'Librarian', 'Admin');
	DECLARE EXIT HANDLER FOR NOT FOUND
	BEGIN
		SET result = 1;
		SELECT result, '0' AS Account_id, '0' AS Account_type, 'N/A' AS Name, 'N/A' AS Address, 'N/A' AS Phone, 'N/A' AS Email, '0' AS Enroll_year;
	END;

	SELECT Account_type INTO user_type FROM account WHERE Account_id = user_id AND Passwd = BINARY(_password);

	IF user_type = 'Admin' OR user_type = 'Librarian' OR user_type = 'Faculty' THEN
		SET result = 0;
		SELECT result, Staff_id AS Account_id, user_type AS Account_type, Name, Address, Phone, Email, 0 AS Enroll_year
		FROM staff
		WHERE Staff_id = user_id;
	ELSEIF user_type = 'Student' THEN
		SET result = 0;
		SELECT result, Student_id AS Account_id, user_type AS Account_type, Name, Address, Phone, Email, Enroll_year
		FROM student
		WHERE Student_id = user_id;
	ELSE
		SET result = 2;
		SELECT result, '0' AS Account_id, '0' AS Account_type, 'N/A' AS Name, 'N/A' AS Address, 'N/A' AS Phone, 'N/A' AS Email, '0' AS Enroll_year;
	END IF;
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_login_account2$$

CREATE PROCEDURE sp_login_account2(user_id INT)
BEGIN
	-- result is 0 if login succeeds, otherwise login fails
	-- 1 : no account
	-- 2 : unknown account type
	-- 3 : the number of consecutive login fail exceeds the limitation
	DECLARE _password VARCHAR(100);
	DECLARE result INT DEFAULT 0;
	DECLARE user_type ENUM('Student', 'Faculty', 'Librarian', 'Admin');
	DECLARE EXIT HANDLER FOR NOT FOUND
	BEGIN
		SET result = 1;
		SELECT result, NULL AS Account_id, NULL AS Account_type, NULL AS Name, NULL AS Address, NULL AS Phone, NULL AS Email, NULL AS Enroll_year, NULL AS Passwd;
	END;

	SELECT Account_type, Passwd INTO user_type, _password FROM account WHERE Account_id = user_id;

	IF user_type = 'Admin' OR user_type = 'Librarian' OR user_type = 'Faculty' THEN
		SET result = 0;
		SELECT result, Staff_id AS Account_id, user_type AS Account_type, Name, Address, Phone, Email, 0 AS Enroll_year, _password AS Passwd
		FROM staff
		WHERE Staff_id = user_id;
	ELSEIF user_type = 'Student' THEN
		SET result = 0;
		SELECT result, Student_id AS Account_id, user_type AS Account_type, Name, Address, Phone, Email, Enroll_year, _password AS Passwd
		FROM student
		WHERE Student_id = user_id;
	ELSE
		SET result = 2;
		SELECT result, NULL AS Account_id, NULL AS Account_type, NULL AS Name, NULL AS Address, NULL AS Phone, NULL AS Email, NULL AS Enroll_year, NULL AS Passwd;
	END IF;
END$$
DELIMITER ;

DELIMITER $$
DROP FUNCTION IF EXISTS sf_create_publisher$$

CREATE FUNCTION sf_create_publisher(executor_id INT, _publisher VARCHAR(25), _address VARCHAR(50), _phone VARCHAR(20)) RETURNS INT
BEGIN
	DECLARE result INT DEFAULT 0; -- 0 : failure, 1 : success

	SELECT sf_get_permission2(executor_id) INTO result; -- 0 : failure, 1 : success

	IF result = 1 THEN
		INSERT INTO publisher (Name, Address, Phone) VALUES (_publisher, _address, _phone);
	END IF;

	RETURN result;
END$$
DELIMITER ;

DELIMITER $$
DROP FUNCTION IF EXISTS sf_create_section$$

CREATE FUNCTION sf_create_section(executor_id INT, _section VARCHAR(20)) RETURNS INT
BEGIN
	DECLARE result INT DEFAULT 0; -- 0 : failure, 1 : success

	SELECT sf_get_permission2(executor_id) INTO result; -- 0 : failure, 1 : success

	IF result = 1 THEN
		INSERT INTO section (Section_name) VALUES (_section);
	END IF;

	RETURN result;
END$$
DELIMITER ;

DELIMITER $$
DROP FUNCTION IF EXISTS sf_create_category$$

CREATE FUNCTION sf_create_category(executor_id INT, _subject VARCHAR(50), _parent INT, _section INT) RETURNS INT
BEGIN
	DECLARE result INT DEFAULT 0; -- 0 : failure, 1 : success

	SELECT sf_get_permission2(executor_id) INTO result; -- 0 : failure, 1 : success

	IF result = 1 THEN
		INSERT INTO category (Subject, Parent_id, Section_id) VALUES (_subject, _parent, _section);
	END IF;

	RETURN result;
END$$
DELIMITER ;

DELIMITER $$
DROP FUNCTION IF EXISTS sf_create_author$$

CREATE FUNCTION sf_create_author(executor_id INT, _author VARCHAR(50)) RETURNS INT
BEGIN
	DECLARE result INT DEFAULT 0; -- 0 : failure, 1 : success

	SELECT sf_get_permission2(executor_id) INTO result; -- 0 : failure, 1 : success

	IF result = 1 THEN
		INSERT INTO author (Author_name) VALUES (_author);
	END IF;

	RETURN result;
END$$
DELIMITER ;

DELIMITER $$
DROP FUNCTION IF EXISTS sf_edit_book$$

CREATE ` FUNCTION sf_edit_book(executor_id INT,book_id int, _publisher INT, _category INT) RETURNS int(11)
BEGIN
	DECLARE result INT DEFAULT 0; -- 0 : failure, 1 : success

	SELECT sf_get_permission2(executor_id) INTO result; -- 0 : failure, 1 : success

	IF result = 1 THEN
		update book as b set  b.Publisher_id=_publisher, b.Category_id=_category where b.Book_id=book_id ;
	END IF;

	RETURN result;
END
DELIMITER ;
DELIMITER $$
DROP FUNCTION IF EXISTS sf_create_book$$

CREATE FUNCTION sf_create_book(executor_id INT, _title VARCHAR(80), _publisher INT, _isbn BIGINT, _category INT) RETURNS INT
BEGIN
	DECLARE result INT DEFAULT 0; -- 0 : failure, 1 : success

	SELECT sf_get_permission2(executor_id) INTO result; -- 0 : failure, 1 : success

	IF result = 1 THEN
		INSERT INTO book (Title, Publisher_id, Isbn, Category_id) VALUES (_title, _publisher, _isbn, _category);
	END IF;

	RETURN result;
END$$
DELIMITER ;

DELIMITER $$
DROP FUNCTION IF EXISTS sf_create_book_author$$

CREATE FUNCTION sf_create_book_author(executor_id INT, _book INT, _author INT) RETURNS INT
BEGIN
	DECLARE result INT DEFAULT 0; -- 0 : failure, 1 : success

	SELECT sf_get_permission2(executor_id) INTO result; -- 0 : failure, 1 : success

	IF result = 1 THEN
		INSERT INTO book_author (Book_id, Author_id) VALUES (_book, _author);
	END IF;

	RETURN result;
END$$
DELIMITER ;

DELIMITER $$
DROP FUNCTION IF EXISTS sf_create_book_copy$$

CREATE FUNCTION sf_create_book_copy(executor_id INT, _book INT, _date DATETIME) RETURNS INT
BEGIN
	DECLARE result INT DEFAULT 0; -- 0 : failure, 1 : success

	SELECT sf_get_permission2(executor_id) INTO result; -- 0 : failure, 1 : success

	IF result = 1 THEN
		INSERT INTO book_copy (Book_id, Stock_date) VALUES (_book, _date);
	END IF;

	RETURN result;
END$$
DELIMITER ;

DELIMITER $$
DROP FUNCTION IF EXISTS sf_create_book_loan_log$$

CREATE FUNCTION sf_create_book_loan_log(executor_id INT, user_id INT, _barcode INT, _issue_date DATETIME, _due_date DATETIME) RETURNS INT
BEGIN
	DECLARE result INT DEFAULT 0; -- 0 : failure, 1 : success

	SELECT sf_get_permission2(executor_id) INTO result;

	IF result = 1 THEN
		-- TODO : Check Maximum Books, CHECK Date_out < Due_date
		INSERT INTO book_loan_log (Barcode_id, Borrower_id, Date_out, Due_date) VALUES (_barcode, user_id, _issue_date, _due_date);
	END IF;

	RETURN result;
END$$
DELIMITER ;

DELIMITER $$
DROP FUNCTION IF EXISTS sf_update_section$$

CREATE FUNCTION sf_update_section(executor_id INT, _section_id INT, _section VARCHAR(20)) RETURNS INT
BEGIN
	DECLARE result INT DEFAULT 0; -- 0 : failure, 1 : success

	SELECT sf_get_permission2(executor_id) INTO result; -- 0 : failure, 1 : success

	IF result = 1 THEN
		UPDATE section
		SET Section_name = _section
		WHERE Section_id = _section_id;
	END IF;

	RETURN result;
END$$
DELIMITER ;

DELIMITER $$
DROP FUNCTION IF EXISTS sf_update_piblisher$$

CREATE FUNCTION sf_update_piblisher(executor_id INT, _publisherId INT, _publisherName VARCHAR(25), _publisherAddress VARCHAR(50), _publsiherPhone VARCHAR(25)) RETURNS INT
BEGIN
	DECLARE result INT DEFAULT 0; -- 0 : failure, 1 : success

	SELECT sf_get_permission2(executor_id) INTO result; -- 0 : failure, 1 : success

	IF result = 1 THEN
		UPDATE publisher
		SET Name = _publisherName, Address = _publisherAddress, Phone = _publsiherPhone
		WHERE Publisher_id = _publisherId;
	END IF;

	RETURN result;
END$$
DELIMITER ;

DELIMITER $$
DROP FUNCTION IF EXISTS sf_update_category$$

CREATE FUNCTION sf_update_category(executor_id INT, _category_id INT, _subject VARCHAR(50), _parent INT, _section INT) RETURNS INT
BEGIN
	DECLARE result INT DEFAULT 0; -- 0 : failure, 1 : success

	SELECT sf_get_permission2(executor_id) INTO result; -- 0 : failure, 1 : success

	IF result = 1 THEN
		UPDATE category
		SET Subject = _subject, Parent_id = _parent, Section_id =  _section
		WHERE Category_id = _category_id AND
				_category_id <> _parent;
	END IF;

	RETURN result;
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_update_account$$

CREATE PROCEDURE sp_update_account(executor_id INT, _account_id INT, _name VARCHAR(50), _address VARCHAR(50), _phone VARCHAR(20), _email VARCHAR(30), _password VARCHAR(100), _year INT)
BEGIN
	DECLARE result INT DEFAULT 0;
	DECLARE _account_type ENUM('Student', 'Faculty', 'Librarian', 'Admin');
	DECLARE EXIT HANDLER FOR SQLEXCEPTION
		BEGIN
			ROLLBACK;
			SET AUTOCOMMIT=1;
			SELECT result;
		END;

	-- _account_type Enum('Student', 'Faculty', 'Librarian')
	SELECT sf_get_permission1(executor_id) INTO result; -- 0 : failure, 1 : success

	IF result = 1 THEN
		SET result = 0;
		SELECT Account_type INTO _account_type FROM account WHERE Account_id = _account_id;

		IF _account_type = 'Faculty' OR _account_type = 'Librarian' THEN
			SET AUTOCOMMIT=0;
			START TRANSACTION;

			UPDATE staff
			SET Name = _name, Address = _address, Phone = _phone, Email = _email
			WHERE Staff_id = _account_id;

			IF _password IS NOT NULL AND _password <> '' THEN
				UPDATE account SET Passwd = _password WHERE Account_id = _account_id;
			END IF;

			COMMIT;
			SET AUTOCOMMIT=1, result = 1;
		ELSEIF _account_type = 'Student' THEN
			SET AUTOCOMMIT=0;
			START TRANSACTION;

			IF _year IS NOT NULL AND _year <> '' THEN
				UPDATE student
				SET Name = _name, Address = _address, Phone = _phone, Email = _email, Enroll_year = _year
				WHERE Student_id = _account_id;
			ELSE
				UPDATE student
				SET Name = _name, Address = _address, Phone = _phone, Email = _email
				WHERE Student_id = _account_id;
			END IF;

			IF _password IS NOT NULL AND _password <> '' THEN
				UPDATE account SET Passwd = _password WHERE Account_id = _account_id;
			END IF;

			COMMIT;
			SET AUTOCOMMIT=1, result = 1;
		END IF;
	END IF;
	SELECT result;
END$$
DELIMITER ;

DELIMITER $$
DROP FUNCTION IF EXISTS sf_delete_section$$

CREATE FUNCTION sf_delete_section(executor_id INT, _section_id INT) RETURNS INT
BEGIN
	DECLARE result INT DEFAULT 0; -- 0 : failure, 1 : success

	SELECT sf_get_permission2(executor_id) INTO result; -- 0 : failure, 1 : success

	IF result = 1 THEN
		DELETE FROM section WHERE Section_id = _section_id;
	END IF;

	RETURN result;
END$$
DELIMITER ;

DELIMITER $$
DROP FUNCTION IF EXISTS sf_delete_pubisher$$

CREATE FUNCTION sf_delete_pubisher(executor_id INT, _publisherId INT) RETURNS INT
BEGIN
	DECLARE result INT DEFAULT 0; -- 0 : failure, 1 : success

	SELECT sf_get_permission2(executor_id) INTO result; -- 0 : failure, 1 : success

	IF result = 1 THEN
		DELETE FROM publisher WHERE Publisher_id = _publisherId;
	END IF;

	RETURN result;
END$$
DELIMITER ;

DELIMITER $$
DROP FUNCTION IF EXISTS sf_delete_category$$

CREATE FUNCTION sf_delete_category(executor_id INT, _category_id INT) RETURNS INT
BEGIN
	DECLARE result INT DEFAULT 0; -- 0 : failure, 1 : success

	SELECT sf_get_permission2(executor_id) INTO result; -- 0 : failure, 1 : success

	IF result = 1 THEN
		DELETE FROM category WHERE Category_id = _category_id;
	END IF;

	RETURN result;
END$$
DELIMITER ;

DELIMITER $$
DROP FUNCTION IF EXISTS sf_delete_account$$

CREATE FUNCTION sf_delete_account(executor_id INT, _account_id INT) RETURNS INT
BEGIN
	DECLARE result INT DEFAULT 0; -- 0 : failure, 1 : success

	SELECT sf_get_permission2(executor_id) INTO result; -- 0 : failure, 1 : success

	IF result = 1 THEN
		-- Note : Student_id range is different from Staff_id range
		DELETE FROM student WHERE Student_id = _account_id;
		DELETE FROM staff WHERE Staff_id = _account_id;
		DELETE FROM account WHERE Account_id = _account_id;
	END IF;

	RETURN result;
END$$
DELIMITER ;

DELIMITER $$
DROP FUNCTION IF EXISTS sf_get_daily_fine$$

CREATE FUNCTION sf_get_daily_fine(executor_id INT, user_id INT) RETURNS DECIMAL(5,2)
BEGIN
	DECLARE result INT DEFAULT 0; -- 0 : failure, 1 : success
	DECLARE _fine DECIMAL(5,2) DEFAULT -1; -- Error : Unknown Account ID or Unknown Account Type
	DECLARE user_type_enum ENUM('Student', 'Faculty', 'Librarian', 'Admin');
	DECLARE EXIT HANDLER FOR NOT FOUND
	BEGIN
		-- Error : Unknown Account ID or Unknown Account Type
		RETURN _fine;
	END;

	SELECT sf_get_permission2(executor_id) INTO result;

	IF result = 1 THEN
		-- SELECT ap.Fine INTO _fine FROM account_property AS ap WHERE ap.Account_type = (
		-- 		SELECT ac.Account_type FROM account AS ac WHERE ac.Account_id = user_id);
		SELECT ap.Fine INTO _fine
		FROM account_property AS ap, account AS ac
		WHERE ac.Account_id = user_id AND
			ac.Account_type = ap.Account_type;
	END IF;

	RETURN _fine;
END$$
DELIMITER ;

DELIMITER $$
DROP FUNCTION IF EXISTS sf_create_fine_log$$

CREATE FUNCTION sf_create_fine_log(executor_id INT, user_id INT, _barcode INT, _log_id BIGINT, _fine DECIMAL(5,2), _date DATETIME) RETURNS INT
BEGIN
	DECLARE result INT DEFAULT 0; -- 0 : failure, 1 : success

	SELECT sf_get_permission2(executor_id) INTO result;

	IF result = 1 THEN
		-- TODO : Un-comment
		-- SELECT COUNT(Log_id) INTO result FROM book_loan_log WHERE Log_id = _log_id AND Return_date IS NULL AND Due_date < NOW();

		-- IF result = 1 THEN
			INSERT INTO fine_log (Barcode_id, Borrower_id, Log_id, Amount, Payment_date) VALUES (_barcode, user_id, _log_id, _fine, _date);
		-- END IF;
	END IF;

	RETURN result;
END$$
DELIMITER ;

DELIMITER $$
DROP FUNCTION IF EXISTS sf_create_reservation$$

CREATE FUNCTION sf_create_reservation(user_id INT, _barcode INT, _date DATETIME) RETURNS INT
BEGIN
	DECLARE result INT DEFAULT 0; -- 0 : failure, 1 : success
	-- executor_id is same to user_id
	-- Check if the book is already reserved
	SELECT COUNT(Barcode_id) INTO result
	FROM book_reservation
	WHERE Barcode_id = _barcode AND
		Log_id IS NULL;

	IF result = 0 THEN
		INSERT INTO book_reservation (Barcode_id, Reserve_date, Account_id) VALUES (_barcode, _date, user_id);
		SET result = 1;
	ELSE
		SET result = 0;
	END IF;

	RETURN result;
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_get_all_section$$

CREATE PROCEDURE sp_get_all_section()
BEGIN
	SELECT * FROM section;
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_get_all_category$$

CREATE PROCEDURE sp_get_all_category()
BEGIN
	SELECT t1.*, s1.Section_name
	FROM (
			SELECT c1.*, c2.Subject AS Parent_subject
			FROM category AS c1 LEFT JOIN category AS c2
			ON c1.Parent_id = c2.Category_id) AS t1, section AS s1
	WHERE t1.Section_id = s1.Section_id;
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_get_all_publisher$$

CREATE PROCEDURE sp_get_all_publisher()
BEGIN
	SELECT * FROM publisher;
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_get_all_author$$

CREATE PROCEDURE sp_get_all_author()
BEGIN
	SELECT * FROM author;
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_get_all_book$$

CREATE PROCEDURE sp_get_all_book()
BEGIN
	-- Performance Issue : Too many book records
	SELECT b1.*, p1.Name AS Publisher_name, c1.Subject
	FROM book AS b1, publisher AS p1, category AS c1
	WHERE b1.Publisher_id = p1.Publisher_id AND
			b1.Category_id = c1.Category_id;
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_search_book_by_book_id$$

CREATE PROCEDURE sp_search_book_by_book_id(_book_id INT)
BEGIN
	SELECT b1.*, p1.Name AS Publisher_name, c1.Subject
	FROM book AS b1, publisher AS p1, category AS c1
	WHERE b1.Book_id = _book_id AND
			b1.Publisher_id = p1.Publisher_id AND
			b1.Category_id = c1.Category_id;
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_search_book_by_author_id$$

CREATE PROCEDURE sp_search_book_by_author_id(_author_id INT)
BEGIN
	-- Performance Issue : "IN" can't search index in MySQL
	SELECT b1.*, p1.Name AS Publisher_name, c1.Subject
	FROM book AS b1, publisher AS p1, category AS c1
	WHERE b1.Book_id IN (
			SELECT Book_id
			FROM book_author
			WHERE Author_id = _author_id) AND
		b1.Publisher_id = p1.Publisher_id AND
		b1.Category_id = c1.Category_id;
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_get_all_book_copy$$

CREATE PROCEDURE sp_get_all_book_copy()
BEGIN
	-- Performance Issue : Too many book_copy records
	SELECT bc.*, b1.Title
	FROM book_copy AS bc, book AS b1
	WHERE bc.Book_id = b1.Book_id;
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_get_all_borrowed_book_copy$$

CREATE PROCEDURE sp_get_all_borrowed_book_copy()
BEGIN
	-- Performance Issue in searching Log_id
	SELECT bc.*, b1.Title
	FROM book_copy AS bc, book AS b1
	WHERE Log_id IS NOT NULL AND
		bc.Book_id = b1.Book_id;
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_search_book_copy_by_book_id$$

CREATE PROCEDURE sp_search_book_copy_by_book_id(_book_id INT)
BEGIN
	SELECT bc.*, b1.Title
	FROM book_copy AS bc, book AS b1
	WHERE bc.Book_id = _book_id AND
		bc.Book_id = b1.Book_id;
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_search_book_copy_by_barcode_id$$

CREATE PROCEDURE sp_search_book_copy_by_barcode_id(_barcode_id INT)
BEGIN
	SELECT bc.*, b1.Title
	FROM book_copy AS bc, book AS b1
	WHERE Barcode_id = _barcode_id AND
		bc.Book_id = b1.Book_id;
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_get_all_user$$

CREATE PROCEDURE sp_get_all_user()
BEGIN
	SELECT ac.Account_type, s1.Staff_id AS Account_id, s1.Name, s1.Address, s1.Phone, s1.Email, '0' AS Enroll_year
	FROM account AS ac, staff AS s1
	WHERE s1.Staff_id = ac.Account_id
	UNION
	SELECT ac.Account_type, s2.Student_id AS Account_id, s2.Name, s2.Address, s2.Phone, s2.Email, s2.Enroll_year
	FROM account AS ac, student AS s2
	WHERE s2.Student_id = ac.Account_id;
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_get_search_book$$

CREATE PROCEDURE sp_get_search_book(_bookName varchar(80), _publisherId int, _categoryId int)
BEGIN
	-- Performance Issue : Too many book records
	SELECT b1.*, p1.Name AS Publisher_name, c1.Subject
	FROM book AS b1
		INNER JOIN publisher AS p1 ON b1.Publisher_id = p1.Publisher_id
		INNER JOIN category AS c1 ON b1.Category_id = c1.Category_id
	WHERE b1.Title LIKE CONCAT('%', _bookName, '%') OR
		(b1.Publisher_id = _publisherId OR
		b1.Category_id = _categoryId);
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_get_fine_borrower_id$$

CREATE PROCEDURE sp_get_fine_borrower_id(_borrower_id INT)
BEGIN
	SELECT fl.*, b.Title, bll.Due_date, bll.Return_date
	FROM fine_log as fl
		INNER JOIN book_copy AS bc ON bc.Barcode_id = fl.Barcode_id
		INNER JOIN book AS b ON b.Book_id = bc.Book_id
		INNER JOIN book_loan_log AS bll ON bll.Log_id = fl.Log_id
	WHERE fl.Borrower_id = _borrower_id;
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_get_loan_books_by_borrower_id$$

CREATE PROCEDURE sp_get_loan_books_by_borrower_id(_borrower_id INT)
BEGIN
	SELECT bl.*, b1.*, p1.Name AS Publisher_name, c1.Subject
	FROM book_loan_log as bl
		INNER JOIN book_copy AS bc ON bc.Barcode_id = bl.Barcode_id
		INNER JOIN book AS b1 ON b1.Book_id = bc.Book_id
		INNER JOIN publisher AS p1 ON b1.Publisher_id = p1.Publisher_id
		INNER JOIN category AS c1 ON b1.Category_id = c1.Category_id
	WHERE bl.Borrower_id = _borrower_id;
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_get_all_fine$$

CREATE PROCEDURE sp_get_all_fine()
BEGIN
	SELECT * FROM fine_log;
END$$
DELIMITER ;

CREATE USER 'admin'@'localhost' IDENTIFIED BY 'G2bOyum7M83o';
GRANT USAGE ON *.* TO 'admin'@'localhost';
FLUSH PRIVILEGES;

CREATE USER 'librarian'@'localhost' IDENTIFIED BY 'BAp6fana1ep4';
GRANT USAGE ON *.* TO 'librarian'@'localhost';
FLUSH PRIVILEGES;

CREATE USER 'user'@'localhost' IDENTIFIED BY 'YIQe8ociKePa';
GRANT USAGE ON *.* TO 'user'@'localhost';
FLUSH PRIVILEGES;

CREATE USER 'guest'@'localhost' IDENTIFIED BY 'M8nAjojA4uh6';
GRANT USAGE ON *.* TO 'guest'@'localhost';
FLUSH PRIVILEGES;

-- Currently, all database account can access the whole database. Later, the priviledge will be adjusted.
GRANT SELECT, EXECUTE, SHOW VIEW, ALTER, ALTER ROUTINE, CREATE, CREATE ROUTINE, CREATE TEMPORARY TABLES, CREATE VIEW, DELETE, DROP, EVENT, INDEX, INSERT, REFERENCES, TRIGGER, UPDATE, LOCK TABLES  ON `library`.* TO 'admin'@'localhost' WITH GRANT OPTION;
FLUSH PRIVILEGES;

GRANT SELECT, EXECUTE, SHOW VIEW, CREATE, CREATE ROUTINE, CREATE TEMPORARY TABLES, CREATE VIEW, EVENT, INDEX, INSERT, REFERENCES, TRIGGER, UPDATE, LOCK TABLES  ON `library`.* TO 'librarian'@'localhost' WITH GRANT OPTION;
FLUSH PRIVILEGES;

GRANT SELECT, EXECUTE, SHOW VIEW, CREATE, CREATE ROUTINE, CREATE TEMPORARY TABLES, CREATE VIEW, EVENT, INDEX, INSERT, REFERENCES, TRIGGER, UPDATE, LOCK TABLES  ON `library`.* TO 'user'@'localhost' WITH GRANT OPTION;
FLUSH PRIVILEGES;

GRANT EXECUTE  ON PROCEDURE `library`.`sp_login_account` TO 'guest'@'localhost';
FLUSH PRIVILEGES;

GRANT EXECUTE  ON PROCEDURE `library`.`sp_login_account2` TO 'guest'@'localhost';
FLUSH PRIVILEGES;

-- Account property should be created manually.
INSERT INTO account_property (Account_type, Max_period, Max_book, Fine) VALUES ('Admin', 28, 10, 1.0);
INSERT INTO account_property (Account_type, Max_period, Max_book, Fine) VALUES ('Librarian', 28, 10, 1.1);
INSERT INTO account_property (Account_type, Max_period, Max_book, Fine) VALUES ('Faculty', 112, 20, 1.2);
INSERT INTO account_property (Account_type, Max_period, Max_book, Fine) VALUES ('Student', 7, 3, 1.5);

-- Admin account should be created manually.
INSERT INTO staff (Name, Address, Phone, Email) VALUES('Administrator 1', 'Sydney', '0400000000', 'admin1@vu.edu.au');
UPDATE staff SET Barcode_id = (Staff_id * 10 + 20000000000000) WHERE Staff_id = LAST_INSERT_ID();
INSERT INTO account (Account_id, Passwd, Account_type) VALUES (LAST_INSERT_ID(), 'password_e0', 'Admin');
UPDATE staff SET Virtual_id = LAST_INSERT_ID() WHERE Staff_id = 5000000; -- The first account is assumed to be 5000000 as an auto increment value.

-- Admin's id is assumed to be 5000000
CALL sp_create_account(5000000, 'Librarian', 'Librarian Name 1', 'Sydney', '0400000000', 'librarian1@vu.edu.au', 'password_e0', '0');
CALL sp_create_account(5000000, 'Faculty', 'Lecturer Name 1', 'Sydney', '0400000002', 'lecturer1@vu.edu.au', 'password_e1', '0');
CALL sp_create_account(5000000, 'Faculty', 'Lecturer Name 2', 'Sydney', '0400000003', 'lecturer2@vu.edu.au', 'password_e2', '0');
CALL sp_create_account(5000000, 'Faculty', 'Lecturer Name 3', 'Sydney', '0400000004', 'lecturer3@vu.edu.au', 'password_e3', '0');
CALL sp_create_account(5000000, 'Student', 'Student Name 1', 'Sydney', '0410000001', 'student1@vu.edu.au', 'password_s1', '2014');
CALL sp_create_account(5000000, 'Student', 'Student Name 2', 'Sydney', '0410000002', 'student2@vu.edu.au', 'password_s2', '2014');
CALL sp_create_account(5000000, 'Student', 'Student Name 3', 'Sydney', '0410000003', 'student3@vu.edu.au', 'password_s3', '2014');

-- Librarian's id is assumed to be 5000001
SELECT sf_create_section(5000001, 'C');
SELECT sf_create_section(5000001, 'C-1');
SELECT sf_create_section(5000001, 'C-2');
SELECT sf_create_section(5000001, 'C-3');
SELECT sf_create_section(5000001, 'C-4');
SELECT sf_create_section(5000001, 'C-5');

SELECT sf_create_category(5000001, 'Computer', NULL, 1);
SELECT sf_create_category(5000001, 'Networking', 1, 2);
SELECT sf_create_category(5000001, 'Object Oriented Programming', 1, 3);

SELECT sf_create_publisher(5000001, 'McGraw-Hill', '545 kent street, CBD NSW 2000', '4544444');
SELECT sf_create_publisher(5000001, 'WROX', '545 kent street, CBD NSW 2000', '4544444');
SELECT sf_create_publisher(5000001, 'O Reilly', '545 kent street, CBD NSW 2000', '4544444');
SELECT sf_create_publisher(5000001, 'Microsoft Press', '545 kent street, CBD NSW 2000', '4544444');
SELECT sf_create_publisher(5000001, 'APress', '545 kent street, CBD NSW 2000', '4544444');

SELECT sf_create_author(5000001, 'Stephen R. Schach');
SELECT sf_create_author(5000001, 'Author 1');
SELECT sf_create_author(5000001, 'Author 2');
SELECT sf_create_author(5000001, 'Author 3');
SELECT sf_create_author(5000001, 'Author 4');
SELECT sf_create_author(5000001, 'Author 5');

SELECT sf_create_book(5000001, 'Object-Oriented and Classical Software Engineering', 1, 9780071081719, 3);

SELECT sf_create_book_author(5000001, 1, 1);

SELECT sf_create_book_copy(5000001, 1, NOW()); -- CURRENT_TIMESTAMP
SELECT sf_create_book_copy(5000001, 1, NOW());
SELECT sf_create_book_copy(5000001, 1, NOW());

SELECT sf_create_book_loan_log(5000000, 5000001, 1, NOW(), DATE_ADD(NOW(), INTERVAL +(SELECT Max_period FROM account_property WHERE Account_type = (SELECT Account_type FROM account WHERE Account_id = 5000001)) DAY));

SELECT sf_create_fine_log(5000000, 5000001, 1, 1, (SELECT Fine FROM account_property WHERE Account_type = (SELECT Account_type FROM account WHERE Account_id = 5000001)), NOW());
