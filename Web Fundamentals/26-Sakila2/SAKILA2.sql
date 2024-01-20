# Get all the list of customers.
SELECT * FROM sakila.customer;

# Get all the list of customers, as well as their address.
USE sakila;
SELECT CONCAT(first_name, ' ', last_name) as customer_name, address 
FROM sakila.customer
LEFT JOIN address 
ON customer.address_id = address.address_id;

# Get all the list of customers as well as their address and the city name
USE sakila;
SELECT CONCAT(first_name, ' ', last_name) as customer_name, address, city FROM customer
LEFT JOIN address ON customer.address_id = address.address_id
LEFT JOIN city ON address.city_id = city.city_id
LEFT JOIN country ON city.country_id = country.country_id;

# Get all the list of customers as well as their address, city name, and their country
USE sakila;
SELECT CONCAT(first_name, ' ', last_name) as customer_name, address, city, country FROM customer
LEFT JOIN address ON customer.address_id = address.address_id
LEFT JOIN city ON address.city_id = city.city_id
LEFT JOIN country ON city.country_id = country.country_id
ORDER BY country; 


# Get all the list of customers who live in Bolivia
USE sakila;
SELECT CONCAT(first_name, ' ', last_name) as customer_name, address, city, country FROM customer
LEFT JOIN address ON customer.address_id = address.address_id
LEFT JOIN city ON address.city_id = city.city_id
LEFT JOIN country ON city.country_id = country.country_id
WHERE country = "Bolivia";

# Get all the list of customers who live in Bolivia, Germany and Greece
USE sakila;
SELECT CONCAT(first_name, ' ', last_name) as customer_name, address, city, country FROM customer
LEFT JOIN address ON customer.address_id = address.address_id
LEFT JOIN city ON address.city_id = city.city_id
LEFT JOIN country ON city.country_id = country.country_id
WHERE country IN ("Bolivia", "Germany", "Greece"); 

# Get all the list of customers who live in the city of Baku.
USE sakila;
SELECT CONCAT(first_name, ' ', last_name) as customer_name, address, city, country FROM customer
LEFT JOIN address ON customer.address_id = address.address_id
LEFT JOIN city ON address.city_id = city.city_id
LEFT JOIN country ON city.country_id = country.country_id
WHERE city = "Baku";

# Get all the list of customers who live in the city of Baku, Beira, and Bergamo.
USE sakila;
SELECT CONCAT(first_name, ' ', last_name) as customer_name, address, city, country FROM customer
LEFT JOIN address ON customer.address_id = address.address_id
LEFT JOIN city ON address.city_id = city.city_id
LEFT JOIN country ON city.country_id = country.country_id
WHERE city IN ("Baku", "Beira", "Bergamo");

# Get all the list of customers who live in a country where the country name's length is less than 5.  
# Show the customer with the longest full name first.  (Hint:  Look into how you can concatenate a string in SQL).
USE sakila;
SELECT CONCAT(first_name, ' ', last_name) as customer_name, country, length(country) as country_name_length 
FROM customer
LEFT JOIN address ON customer.address_id = address.address_id
LEFT JOIN city ON address.city_id = city.city_id
LEFT JOIN country ON city.country_id = country.country_id
WHERE length(country) < 5
ORDER BY length(customer_name) DESC, country_name_length DESC;

# Get all the list of customers who live in a city name whose length is more than 10.
# Order the result so that the customers who live in the same country are shown together.
USE sakila;
SELECT CONCAT(first_name, ' ', last_name) as customer_name, country, city, length(city) as city_name_length 
FROM customer
LEFT JOIN address ON customer.address_id = address.address_id
LEFT JOIN city ON address.city_id = city.city_id
LEFT JOIN country ON city.country_id = country.country_id
WHERE length(city) > 10
ORDER BY country ASC;

# Get all the list of customers who live in a city where the city name includes the word 'ba'. For example
# Arratuba or Baiyin should show up in your result.
USE sakila;
SELECT CONCAT(first_name, ' ', last_name) as customer_name,  city
FROM customer
LEFT JOIN address ON customer.address_id = address.address_id
LEFT JOIN city ON address.city_id = city.city_id
LEFT JOIN country ON city.country_id = country.country_id
WHERE city LIKE ("%ba%");

# Get all the list of customers where the city name includes a space.  
# Order the result so that customers who live in the longest city are shown first.
USE sakila;
SELECT CONCAT(first_name, ' ', last_name) as customer_name, city, length(city) as city_name_length 
FROM customer
LEFT JOIN address ON customer.address_id = address.address_id
LEFT JOIN city ON address.city_id = city.city_id
LEFT JOIN country ON city.country_id = country.country_id
WHERE city LIKE ("% %")
ORDER BY length(city) DESC;

# Get all the customers where the country name is longer than the city name
USE sakila;
SELECT CONCAT(first_name, ' ', last_name) as customer_name, city, country, length(city) as city_name_length, 
length(country) as country_name_length FROM customer
LEFT JOIN address ON customer.address_id = address.address_id
LEFT JOIN city ON address.city_id = city.city_id
LEFT JOIN country ON city.country_id = country.country_id
WHERE length(country) > length(city);












