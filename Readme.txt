README

2015-08-19

Write Test


2015-08-27
16:00 - 17:30

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
