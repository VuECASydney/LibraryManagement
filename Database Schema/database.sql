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
	Title			VARCHAR(40) NOT NULL,
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

CREATE TABLE account
(
	Virtual_id		INT NOT NULL AUTO_INCREMENT,
	Account_id		INT NOT NULL,
	Passwd			VARCHAR(100) NOT NULL,
	Account_type	Enum('Staff', 'Student', 'Administrator') NOT NULL,
	PRIMARY KEY (Virtual_id),
	UNIQUE INDEX idx_account_id (Account_id)
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

-- CHECK (Date_out < Due_date)
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
	Account_id		INT NOT NULL,
	Reserve_date	DATETIME NOT NULL,
	Log_id			BIGINT DEFAULT NULL,
	PRIMARY KEY (Reserve_id),
	CONSTRAINT fk_book_reserve_barcode_id FOREIGN KEY (Barcode_id) REFERENCES book_copy (Barcode_id)
		ON UPDATE CASCADE,
	CONSTRAINT fk_book_reserve_account_id FOREIGN KEY (Account_id) REFERENCES account (Account_id)
		ON UPDATE CASCADE,
	CONSTRAINT fk_book_reserve_log_id FOREIGN KEY (Log_id) REFERENCES book_loan_log (Log_id)
		ON UPDATE CASCADE,
	INDEX idx_reserve_barcode_id (Barcode_id),
	INDEX idx_reserve_account_id (Account_id),
	UNIQUE INDEX idx_reserve_log_id (Log_id)
);

CREATE TABLE fine
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
DROP PROCEDURE IF EXISTS sp_create_account$$

CREATE PROCEDURE sp_create_account(account_type Enum('Staff', 'Student'), user_name VARCHAR(50), user_address VARCHAR(50), user_phone VARCHAR(20), user_email VARCHAR(30), enc_password VARCHAR(100), enroll_year INT, OUT result INT)
BEGIN
	DECLARE user_id, virtual_pk_id INT;
	DECLARE db_error INT DEFAULT 0;
	DECLARE EXIT HANDLER FOR SQLEXCEPTION
		BEGIN
			ROLLBACK;
			SET AUTOCOMMIT=1;
		END;

	SET result = 0;

	IF account_type = 'Staff' THEN
		SET AUTOCOMMIT=0;
		START TRANSACTION;
		INSERT INTO staff (Name, Address, Phone, Email) VALUES(user_name, user_address, user_phone, user_email);

		SET user_id = (SELECT LAST_INSERT_ID());
		UPDATE staff SET Barcode_id = (user_id * 10 + 20000000000000) WHERE Staff_id = user_id;
		INSERT INTO account (Account_id, Passwd, Account_type) VALUES (user_id, enc_password, 'Staff');

		SET virtual_pk_id = (SELECT LAST_INSERT_ID());
		UPDATE staff SET Virtual_id = virtual_pk_id WHERE Staff_id = user_id;

		COMMIT;
		SET AUTOCOMMIT=1, result = 1;
	ELSEIF account_type = 'Student' THEN
		SET AUTOCOMMIT=0;
		START TRANSACTION;

		INSERT INTO student (Name, Address, Phone, Email, Enroll_year) VALUES(user_name, user_address, user_phone, user_email, enroll_year);

		SET user_id = (SELECT LAST_INSERT_ID());
		UPDATE student SET Barcode_id = (user_id * 10 + 20000000000000) WHERE Student_id = user_id;
		INSERT INTO account (Account_id, Passwd, Account_type) VALUES (user_id, enc_password, 'Student');

		SET virtual_pk_id = (SELECT LAST_INSERT_ID());
		UPDATE student SET Virtual_id = virtual_pk_id WHERE Student_id = user_id;

		COMMIT;
		SET AUTOCOMMIT=1, result = 1;
	END IF;
END$$
DELIMITER ;

DELIMITER $$
DROP FUNCTION IF EXISTS sf_reset_password$$

CREATE FUNCTION sf_reset_password(user_id INT, enc_password VARCHAR(50)) RETURNS INT
BEGIN
	DECLARE result INT DEFAULT 0;

	UPDATE account SET Passwd = enc_password WHERE Account_id = user_id AND Account_type <> 'Administrator';
	SELECT COUNT(Account_id) INTO result FROM account WHERE Account_id = user_id AND Passwd = enc_password AND Account_type <> 'Administrator';

	RETURN result;
END$$
DELIMITER ;

DELIMITER $$
DROP FUNCTION IF EXISTS sf_change_password$$

CREATE FUNCTION sf_change_password(user_id INT, old_password VARCHAR(50), new_password VARCHAR(50)) RETURNS INT
BEGIN
	DECLARE result INT DEFAULT 0;

	UPDATE account SET Passwd = new_password WHERE Account_id = user_id AND Passwd = old_password AND Account_type <> 'Administrator';
	SELECT COUNT(Account_id) INTO result FROM account WHERE Account_id = user_id AND Passwd = new_password AND Account_type <> 'Administrator';

	RETURN result;
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_check_account$$

CREATE PROCEDURE sp_check_account(req_user_id INT, enc_password VARCHAR(50), OUT ack_user_id INT, OUT result INT, OUT user_id INT, OUT user_type INT, OUT user_name VARCHAR(30), OUT user_address VARCHAR(50), OUT user_phone VARCHAR(20), OUT user_email VARCHAR(50), OUT user_year INT)
BEGIN
	DECLARE user_type_enum ENUM('Staff', 'Student', 'Administrator');
	DECLARE EXIT HANDLER FOR NOT FOUND
	BEGIN
		SET result = '0', user_id = 0, user_type = '0', user_name = 'N/A', user_address = 'N/A', user_phone = 'N/A', user_email = 'N/A', user_year = '0';
	END;

	SET ack_user_id = req_user_id;

	SELECT Account_type INTO user_type_enum FROM account WHERE Account_id = req_user_id AND Passwd = enc_password;

	IF user_type_enum = 'Administrator' THEN
		SET result = '1', user_id = req_user_id, user_type = user_type_enum, user_name = 'Site Admin', user_address = 'N/A', user_phone = 'N/A', user_email = 'N/A', user_year = '0';
	ELSEIF user_type_enum = 'Staff' THEN
		SELECT '1', Staff_id, Name, Address, Phone, Email, 0 INTO result, user_id, user_name, user_address, user_phone, user_email, user_year FROM staff WHERE Staff_id = req_user_id;
		SET user_type = user_type_enum;
	ELSEIF user_type_enum = 'Student' THEN
		SELECT '1', Student_id, Name, Address, Phone, Email, Enroll_year INTO result, user_id, user_name, user_address, user_phone, user_email, user_year FROM student WHERE Student_id = req_user_id;
		SET user_type = user_type_enum;
	ELSE
		SET result = '0', user_id = 0, user_type = '0', user_name = 'N/A', user_address = 'N/A', user_phone = 'N/A', user_email = 'N/A', user_year = '0';
	END IF;
END$$
DELIMITER ;

INSERT INTO account (Account_id, Passwd, Account_type) VALUES ('0', 'admin1', 'Administrator');

CALL sp_create_account('Staff', 'Lecturer Name 1', 'Sydney', '0400000001', 'lecturer1@vu.edu.au', 'password_e1', '0', @retValue);
CALL sp_create_account('Staff', 'Lecturer Name 2', 'Sydney', '0400000002', 'lecturer2@vu.edu.au', 'password_e2', '0', @retValue);
CALL sp_create_account('Staff', 'Lecturer Name 3', 'Sydney', '0400000003', 'lecturer3@vu.edu.au', 'password_e3', '0', @retValue);
CALL sp_create_account('Student', 'Student Name 1', 'Sydney', '0410000001', 'student1@vu.edu.au', 'password_s1', '2014', @retValue);
CALL sp_create_account('Student', 'Student Name 2', 'Sydney', '0410000002', 'student2@vu.edu.au', 'password_s2', '2014', @retValue);
CALL sp_create_account('Student', 'Student Name 3', 'Sydney', '0410000003', 'student3@vu.edu.au', 'password_s3', '2014', @retValue);
