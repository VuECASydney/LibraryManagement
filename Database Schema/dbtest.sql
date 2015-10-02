-- Test 001 : account check with correct password

CALL sp_check_account(5000000, 'password_e0');

result | Account_id | Account_type | Name            | Address | Phone       | Email            | Enroll_year
-------------------------------------------------------------------------------------------------------------
0      | 5,000,000  | 4            | Administrator 1 | Sydney  | 0400000000  | admin1@vu.edu.au | 0

==========

-- Test 002 : account check with incorrect password

CALL sp_check_account(5000000, 'incorrect_password');

result | Account_id | Account_type | Name            | Address | Phone       | Email            | Enroll_year
-------------------------------------------------------------------------------------------------------------
1      | 0          | 0            | N/A             | N/A     | N/A         | N/A              | 0
