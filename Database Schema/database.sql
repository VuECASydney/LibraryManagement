-- database account : admin/librarian/user
-- admin : 

CREATE DATABASE IF NOT EXISTS auth;
USE auth;

CREATE TABLE student
(
	Student_id	VARCHAR(10) NOT NULL,
	Passwd		VARCHAR(50) NOT NULL,
	Enroll_year	INT NOT NULL,
	PRIMARY KEY (Student_id),
	INDEX idx_year (Enroll_year)
);

CREATE TABLE staff
(
	Staff_id	VARCHAR(10) NOT NULL,
	Passwd		VARCHAR(50) NOT NULL,
	PRIMARY KEY (Staff_id)
);

DELIMITER $$
DROP FUNCTION IF EXISTS sf_check_account$$

CREATE FUNCTION sf_check_account(user_type TINYINT, account VARCHAR(10), enc_passwd VARCHAR(50)) RETURNS TINYINT
BEGIN
	DECLARE cnt TINYINT;

	IF user_type = 0 THEN
		SELECT COUNT(*) INTO cnt FROM staff WHERE Staff_id = account AND Passwd = enc_passwd;
	ELSEIF user_type = 1 THEN
		SELECT COUNT(*) INTO cnt FROM student WHERE Student_id = account AND Passwd = enc_passwd;
	ELSE
		SET cnt = 0;
	END IF;

	RETURN cnt;
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_create_account$$

CREATE PROCEDURE sp_create_account(user_type TINYINT, enroll_year INT, account VARCHAR(10), enc_passwd VARCHAR(50))
BEGIN
	IF user_type = 0 THEN
		INSERT INTO staff VALUES (account, enc_passwd);
	ELSEIF user_type = 1 THEN
		INSERT INTO student VALUES (account, enc_passwd, enroll_year);
	END IF;
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_reset_password$$

CREATE PROCEDURE sp_reset_password(user_type TINYINT, account VARCHAR(10), enc_passwd VARCHAR(50))
BEGIN
	IF user_type = 0 THEN
		UPDATE staff SET Passwd = enc_passwd WHERE Staff_id = account;
	ELSEIF user_type = 1 THEN
		UPDATE student SET Passwd = enc_passwd WHERE Student_id = account;
	END IF;
END$$
DELIMITER ;

CREATE USER 'admin'@'localhost' IDENTIFIED BY 'admin1';
GRANT USAGE ON *.* TO 'admin'@'localhost';
-- SHOW GRANTS FOR 'admin'@'localhost';

CREATE USER 'librarian'@'localhost' IDENTIFIED BY 'librarian1';
GRANT USAGE ON *.* TO 'librarian'@'localhost';
-- SHOW GRANTS FOR 'librarian'@'localhost';

CREATE USER 'library_user'@'localhost' IDENTIFIED BY 'user1';
GRANT USAGE ON *.* TO 'library_user'@'localhost';

-- SHOW GRANTS FOR 'library_user'@'localhost';


-- GRANT SELECT, SHOW VIEW, ALTER, CREATE, CREATE VIEW, DELETE, DROP, INDEX, INSERT, REFERENCES, UPDATE ON TABLE library.publisher TO 'admin'@'localhost' WITH GRANT OPTION;
-- FLUSH PRIVILEGES;

GRANT EXECUTE ON FUNCTION sf_check_account TO 'library_user'@'localhost';
GRANT EXECUTE ON PROCEDURE sp_create_account TO 'admin'@'localhost';
GRANT EXECUTE ON PROCEDURE sp_reset_password TO 'admin'@'localhost';

FLUSH PRIVILEGES;

CREATE DATABASE IF NOT EXISTS library;
USE library;

DROP TABLE IF EXISTS publisher CASCADE;

CREATE TABLE publisher_sequence
(
	Publisher_id	INT NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (Publisher_id)
);

CREATE TABLE publisher
(
	Publisher_id	INT NOT NULL,
	Name			VARCHAR(25) NOT NULL,
	Address			VARCHAR(50) DEFAULT NULL,
	Phone			VARCHAR(20) DEFAULT NULL,
	PRIMARY KEY (Publisher_id),
	CONSTRAINT fk_publisher_id FOREIGN KEY (Publisher_id) REFERENCES publisher_sequence (Publisher_id)
		ON DELETE CASCADE ON UPDATE CASCADE,
	UNIQUE INDEX idx_publisher_name (Name)
);

CREATE TABLE category
(
	Code_no			INT NOT NULL,
	Subject			VARCHAR(50) NOT NULL,
	Parent_code		INT DEFAULT NULL,
	PRIMARY KEY (Code_no),
	UNIQUE INDEX idx_category_subject (Subject),
	CONSTRAINT fk_parent_code FOREIGN KEY (Parent_code) REFERENCES category (Code_no)
		ON UPDATE CASCADE
);

CREATE TABLE book_sequence
(
	Book_id			INT NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (Book_id)
);

CREATE TABLE section
(
	Section_id		INT NOT NULL AUTO_INCREMENT,
	Section_name	VARCHAR(20) NOT NULL,
	PRIMARY KEY (Section_id)
);

CREATE TABLE book
(
	Book_id			INT NOT NULL,
	Title			VARCHAR(40) NOT NULL,
	Publisher_id	INT NOT NULL,
	Isbn			BIGINT DEFAULT NULL,
	Code_no			INT NOT NULL,
	Section_id		INT DEFAULT NULL,
	PRIMARY KEY (Book_id),
	CONSTRAINT fk_book_id FOREIGN KEY (Book_id) REFERENCES book_sequence (Book_id)
		ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT fk_book_publisher_id FOREIGN KEY (Publisher_id) REFERENCES publisher (Publisher_id)
		ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT fk_book_category_id FOREIGN KEY (Code_no) REFERENCES category (Code_no)
		ON UPDATE CASCADE,
	CONSTRAINT fk_book_section_id FOREIGN KEY (Section_id) REFERENCES section (Section_id)
		ON UPDATE CASCADE,
	INDEX idx_book_title (Title),
	INDEX idx_isbn (Isbn),
	INDEX idx_class (Code_no)
);

CREATE TABLE book_authors
(
	Book_id			INT NOT NULL,
	Author_name		VARCHAR(15) NOT NULL,
	PRIMARY KEY (Book_id, Author_name),
	CONSTRAINT fk_book_authors_book_id FOREIGN KEY (Book_id) REFERENCES book (Book_id)
		ON DELETE CASCADE ON UPDATE CASCADE,
	INDEX idx_book_author (Author_name)
);

CREATE TABLE copy_sequence
(
	Instance_id		INT NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (Instance_id)
);

CREATE TABLE book_copies
(
	Instance_id		INT NOT NULL,
	Book_id			INT NOT NULL,
	Stock_date		DATETIME DEFAULT NULL,
	PRIMARY KEY (Instance_id, Book_id),
	CONSTRAINT fk_book_copies_instance_id FOREIGN KEY (Instance_id) REFERENCES copy_sequence (Instance_id)
		ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT fk_book_copies_book_id FOREIGN KEY (Book_id) REFERENCES book (Book_id)
		ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE student
(
	Student_id	VARCHAR(10) NOT NULL,
	Name		VARCHAR(20) NOT NULL,
	Address		VARCHAR(50) NOT NULL,
	Phone		VARCHAR(20) NOT NULL,
	Email		VARCHAR(50) NOT NULL,
	Enroll_year	INT NOT NULL,
	PRIMARY KEY (Student_id),
	INDEX idx_student_name (Name),
	INDEX idx_year (Year)
);

CREATE TABLE staff
(
	Staff_id	VARCHAR(10) NOT NULL,
	Name		VARCHAR(20) NOT NULL,
	Address		VARCHAR(50) NOT NULL,
	Phone		VARCHAR(20) NOT NULL,
	Email		VARCHAR(50) NOT NULL,
	PRIMARY KEY (Staff_id),
	INDEX idx_staff_name (Name)
);

CREATE TABLE log_sequence (
	Log_id	BIGINT NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (Log_id)
);

CREATE TABLE book_loans_log
(
	Log_id			BIGINT NOT NULL,
	Borrow_year		INT NOT NULL,
	Instance_id		INT NOT NULL,
	Book_id			INT NOT NULL,
	Borrower_type	ENUM('Staff', 'Student')	NOT NULL,
	Borrower_id		VARCHAR(10) NOT NULL,
	Date_out		DATETIME NOT NULL,
	Due_date		DATETIME NOT NULL,
	Return_date		DATETIME DEFAULT NULL,
	PRIMARY KEY (Log_id),
	CONSTRAINT fk_log_id FOREIGN KEY (Log_id) REFERENCES log_sequence (Log_id)
		ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT fk_book_loans_log_book_id FOREIGN KEY (Instance_id, Book_id) REFERENCES book_copies (Instance_id, Book_id)
		ON UPDATE CASCADE,
	INDEX idx_borrower_id (Borrower_id),
	CHECK (Date_out < Due_date)
) PARTITION BY RANGE (Borrow_year) (
PARTITION p0 VALUES LESS THAN (2025),
PARTITION p0 VALUES LESS THAN (2035),
PARTITION p0 VALUES LESS THAN (2045),
PARTITION p0 VALUES LESS THAN (2055),
PARTITION p0 VALUES LESS THAN (2065)
);

CREATE TABLE book_loans
(
	Instance_id		INT NOT NULL,
	Book_id			INT NOT NULL,
	Log_id			BIGINT DEFAULT NULL,
	PRIMARY KEY (Instance_id, Book_id),
	CONSTRAINT fk_book_loans_book_id FOREIGN KEY (Instance_id, Book_id) REFERENCES book_copies (Instance_id, Book_id)
		ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT fk_book_loans_log_id FOREIGN KEY (Log_id) REFERENCES book_loans_log (Log_id)
		ON UPDATE CASCADE,	
	INDEX idx_book_loans_book_id (Book_id),
);

DELIMITER $$
CREATE TRIGGER tr_publisher_info_before_insert BEFORE INSERT ON publisher FOR EACH ROW BEGIN
	INSERT INTO publisher_sequence() VALUES();
	SET NEW.Publisher_id = (SELECT LAST_INSERT_ID());
END$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER tr_book_info_before_insert BEFORE INSERT ON book FOR EACH ROW BEGIN
	INSERT INTO book_sequence() VALUES();
	SET NEW.Book_id = (SELECT LAST_INSERT_ID());
END$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER tr_book_copies_info_before_insert BEFORE INSERT ON book_copies FOR EACH ROW BEGIN
	INSERT INTO book_copies() VALUES();
	SET NEW.Instance_id = (SELECT LAST_INSERT_ID());
END$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER tr_book_loans_log_info_before_insert BEFORE INSERT ON book_loans_log FOR EACH ROW BEGIN
	INSERT INTO log_sequence() VALUES();
	SET NEW.Log_id = (SELECT LAST_INSERT_ID());
END$$
DELIMITER ;
