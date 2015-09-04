README.txt

2015-08-19

Write Test

--------------------------------------------------------------------------------

2015-08-13 Thursday
Chatting Time : 00:21 - 00:25

I tried to figure out what is the best for us, I think first of all we need to check how many pages we need to create our project, if pages are larger than we should use framework bcz we hv at least something base ..

So please list the pages .. 

Suggestion following pages are required 
1. Login / Forgot password 
2. Admin Dashboard 
3 Add/Edit Category 
4ListOf  category 
5 Add/ EditAuthor 
5.1 Add / Edit publisher
6 Add Book 
7 Search with different categories author A book
8 Add a student 
9. Report of assigned books with different color code to delay  
10 . Assigned a book 
11 Book return 
12 calculation of fine.
13. If notification required to student .

It is just one thought we need to work out this in out class on Friday and than start working on project

--------------------------------------------------------------------------------

2015-08-27 Thursday
Meeting Time : 16:00 - 17:30

Database Schema Design Agreements

1. Change Database Engine from INNODB to MyISAM because we don't want to reuse auto incremental sequence, however, INNODB does.

2. Consolidate 'TWO" database schemas into "ONE" database schema.

3. User/Role table
Role - Admin/Staff/Student
User - Student_id/Staff_id{PK}, User_name{INDEX}, Passwd, Role_id 
Student - Student_id{PK, FK}, Student_name{FK}
Staff - Staff_id{PK, FK}, Staff_name{FK}

4. Rename column name from "Code_id" to "Category_id."

5. Student_id/Staff_id are INT, not VARCHAR. Also, Barcode_id(BIGINT) is stored.

6. Add "Reserve" table.

--------------------------------------------------------------------------------

2015-08-28 Friday
Class Time : 09:30 - 12:30

Use Cases

1. Admin
​login
logout
create an account
reset a password (only for borrowers who forgot password)
set borrowing period
get borrowing period
functionalities for reporting

2. Borrower(Staff/Student)

login
logout
change own password
search books
reserve books
renew books
access own account
update own account info except password, e.g., address or phone number ...

3. Librarian
login
logout
change own password
create categories
insert books
issue(lend) books to borrowers
return books (popup any fine if exists)
search students
Note:
All passwords are stored in database as hashed strings.
Both student id and staff id have 7 digit without the first letter "e" or "s".

--------------------------------------------------------------------------------

Database Design Assumptions

1. Unique Columns - 
 1.1 Publisher name in "publisher" table
 1.2 Section name in "section" table
 1.3 Category subject in "category" table

2. A Person's full name is stored in "ONE" column.
3. ISBN is unique for a book, not for a book instance(copy).
4. For each book copy, Barcode_id is unique.
5. Book Barcode is BIGINT.
6. No difference between Staff and Librarian (?)
6.1 Staff ID starts from 5000000.
6.2 Student ID starts from 3000000 or 4000000.
6.3 Admin ID is 0.

--------------------------------------------------------------------------------

IMPORTANT - Brief Database Engine Comparison between MyISAM and INNODB in MySQL

MyISAM
1. No reuse of AUTO_INCREMENT value
2. Lock Mechanism - Table
3. No Support of Foreign Key

INNODB
1. Reuse of AUTO_INCREMENT value
2. Lock Mechanism - Row/Record (Not Table)
3. Support of Foreign Key

Stored Function is not allowed to use Transaction, but Stored Procedure is allowed.

--------------------------------------------------------------------------------

2015-09-03 Thursday
Meeting Time : 16:30 - 00:25

Brijender Rana, Choongyeol Kim, Madahban Bhowmik, Priyank Sharma (Excuse by email)

--------------------------------------------------------------------------------

2015-09-03 Friday
Class Time : 09:30 - 12:30

Database schema shall be changed slightly for reservation and N:N relationship between author and book copy.

Tasks for documents are allocated.

Brijender - System Navigation, Project Management
Choongyeol - Non Functional Requirements, Data Types (plus ER diagram)
Madhaban, Manoj - Functional Requirements

--------------------------------------------------------------------------------

