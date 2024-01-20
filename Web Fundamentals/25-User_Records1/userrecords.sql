-- USE hackerhero_practice;
-- INSERT INTO users (first_name, last_name, email, encrypted_password)
-- VALUES ("Michael", "Choi", "michaelchoi@email.com", "village88");

-- UPDATE users 
-- SET last_name = "TEST"
-- WHERE last_name = "Choi";

-- UPDATE users 
-- SET first_name = "John"
-- WHERE id = 1;

-- USE hackerhero_practice;
-- UPDATE users 
-- SET first_name = "Robert"
-- WHERE ID IN (3,5,7,12,19);

-- DELETE FROM users 
-- WHERE id = 1;

-- ALTER TABLE users
-- RENAME COLUMN email TO email_address;

ALTER TABLE users
MODIFY COLUMN ID BIGINT; 

SELECT * FROM hackerhero_practice.users;