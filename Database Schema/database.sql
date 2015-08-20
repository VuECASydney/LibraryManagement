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

CREATE TABLE book
(
	Book_id			INT NOT NULL AUTO_INCREMENT,
	Title			VARCHAR(40) NOT NULL,
	Publisher_id	INT NOT NULL,
	Isbn			BIGINT DEFAULT NULL,
	Classfication	VARCHAR(20) DEFAULT NULL,
	PRIMARY KEY (Book_id),
	CONSTRAINT fk_book_publisher_id FOREIGN KEY (Publisher_id) REFERENCES publisher (Publisher_id)
		ON UPDATE CASCADE,
	INDEX idx_book_title (Title),
	INDEX idx_isbn (Isbn),
	INDEX idx_class (Classfication)
);

CREATE TABLE book_authors
(
	Book_id			INT NOT NULL,
	Author_name		VARCHAR(15) NOT NULL,
	PRIMARY KEY (Book_id, Author_name),
	CONSTRAINT fk_book_authors_book_id FOREIGN KEY (Book_id) REFERENCES book (Book_id)
		ON UPDATE CASCADE,
	INDEX idx_book_author (Author_name)
);

CREATE TABLE book_copies
(
	Instance_id		INT NOT NULL AUTO_INCREMENT,
	Book_id			INT NOT NULL,
	PRIMARY KEY (Instance_id),
	CONSTRAINT fk_book_copies_book_id FOREIGN KEY (Book_id) REFERENCES book (Book_id)
		ON UPDATE CASCADE,
	INDEX idx_book_id (Book_id)
);

----------

CREATE TABLE student
(
	Student_id	VARCHAR(10) NOT NULL,
	Name		VARCHAR(20) NOT NULL,
	Address		VARCHAR(50),
	Phone		VARCHAR(20),
	Email		VARCHAR(50),
	PRIMARY KEY (student_id)
);

CREATE TABLE staff
(
	Staff_id	VARCHAR(10) NOT NULL,
	Name		VARCHAR(20) NOT NULL,
	Address		VARCHAR(50),
	Phone		VARCHAR(20),
	Email		VARCHAR(50),
	PRIMARY KEY (student_id)
);

CREATE TABLE book_loans
(
	Instance_id		INT NOT NULL,
	Book_id			INT NOT NULL,
	Borrower_id		VARCHAR(10) NOT NULL,
	Date_out		DATETIME NOT NULL,
	Due_date		DATETIME NOT NULL,
	PRIMARY KEY (Instance_id, Date_out)
);

