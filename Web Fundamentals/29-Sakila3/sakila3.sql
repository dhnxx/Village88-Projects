/*  How many customers are there for each country? 
Have your result display the full country name and the number of 
customers for each country. */ 

SELECT country.country, COUNT(customer.address_id) as total_number_of_customer
FROM country
INNER JOIN city ON city.country_id = country.country_id
INNER JOIN address ON address.city_id = city.city_id
INNER JOIN customer ON customer.address_id = address.address_id
GROUP BY country.country;

/*  How many customers are there for each city? Have your result display the full city name, 
the full country name, as well as the number of customers for each city.*/

SELECT city.city, COUNT(customer.address_id)
FROM country
INNER JOIN city ON city.country_id = country.country_id
INNER JOIN address ON address.city_id = city.city_id
INNER JOIN customer ON customer.address_id = address.address_id
GROUP BY city.city;

/*  Retrieve both the average rental amount, the total rental amount, as well as the total number of transactions for 
each month of each year. */ 

SELECT date_format(payment_date, "%M-%Y") as month_and_year, SUM(amount) as total_rental_amount, COUNT(amount),
AVG(amount) FROM payment 
GROUP BY date_format(payment_date, "%M-%Y");

/*  Your manager comes and asks you to pull payment report based on the hour of the day. The managers wants to 
know which hour the company earns the most money/payment. Have your sql query generate the top 10 hours of 
the day with the most sales. Have the first row of your result be the hour with the most payments received. */
SELECT  date_format(payment_date, "%h %p") as hour_of_the_day, SUM(amount)
FROM payment 
GROUP BY date_format(payment_date, "%h %p")
ORDER BY SUM(amount) DESC
LIMIT 10;


