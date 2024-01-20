USE  sakila;
SELECT * FROM customer
WHERE customer_id =20;

USE  sakila;
SELECT * FROM customer
WHERE customer_id BETWEEN 20 AND 60;

USE  sakila;
SELECT * FROM customer
WHERE first_name LIKE "L%"; 

USE  sakila;
SELECT * FROM customer
WHERE first_name LIKE "%L%"; 

USE  sakila;
SELECT * FROM customer
WHERE last_name LIKE "C%"
ORDER BY create_date desc; 

USE  sakila;
SELECT * FROM customer
WHERE last_name LIKE "%NN%"
ORDER BY create_date
LIMIT 5;

USE  sakila;
SELECT customer_id, first_name, last_name, email_address FROM customer
WHERE customer_id IN (515, 181, 582, 503, 29, 85);

USE  sakila;
SELECT email AS email_address FROM customer
WHERE store_id = 2; 

USE sakila; 
SELECT first_name, last_name, email FROM customer
ORDER BY email desc; 

USE sakila; 
SELECT customer_id, first_name, last_name, email FROM customer
WHERE active = 1 AND MONTH(create_date) = 2;

USE sakila; 
SELECT email, length(email) AS email_length FROM customer
ORDER BY email_length DESC, email ASC;

USE sakila; 
SELECT email, length(email) AS email_length FROM customer
ORDER BY email_length
LIMIT 100; 











