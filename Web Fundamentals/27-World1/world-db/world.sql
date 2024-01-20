USE WORLD;

# Get all the list of countries that are in the continent of Europe
SELECT * FROM country
WHERE continent = "Europe";

# Get all the list of countries that are in the continent of North America and Africa.
SELECT * FROM country
WHERE continent IN ("North America", "Africa");

# Get all the list of cities that are part of a country with population greater than 100 millions.
SELECT country.code AS country_code, country.name AS country_name, continent, 
country.population AS country_population, city.name AS city_name FROM country
INNER JOIN city ON country.code = city.CountryCode
WHERE country.population > 100000000;

# Get all the list of countries (display the full country name) who speak 'Spanish' as their language.
SELECT country.name AS country, countrylanguage.language FROM country 
INNER JOIN countrylanguage ON country.code = countrylanguage.CountryCode
WHERE language = "Spanish"; 

# Get all the list of countries (display the full country name) who speak 'Spanish' as their official language.
SELECT country.name AS country, countrylanguage.language, countrylanguage.IsOfficial FROM country 
INNER JOIN countrylanguage ON country.code = countrylanguage.CountryCode
WHERE language = "Spanish" AND IsOfficial = "T";

# Get all the list of countries (display the full country name) who speak either 
#'Spanish' or 'English' as their official language.
SELECT country.name AS country, countrylanguage.language FROM country 
INNER JOIN countrylanguage ON country.code = countrylanguage.CountryCode
WHERE language IN ("Spanish", "English") AND IsOfficial = "T";

# Get all the list of countries (display the full country name) where 'Arabic' is spoken by 
# more than 30% of the population but where it's not the country's official language.
SELECT country.name AS country, countrylanguage.language, countrylanguage.percentage, countrylanguage.IsOfficial
FROM country 
INNER JOIN countrylanguage ON country.code = countrylanguage.CountryCode
WHERE language = "Arabic" AND IsOfficial = "F" AND percentage > 30;

# Get all the list of countries (display the full country name) where 'French' is the official language 
# but where less than 50% of the population in that country actually speaks that language.
SELECT country.name AS country, countrylanguage.language, countrylanguage.percentage, countrylanguage.IsOfficial
FROM country 
INNER JOIN countrylanguage ON country.code = countrylanguage.CountryCode
WHERE language = "French" AND IsOfficial = "T" AND percentage < 50;

# Get all the list of countries (display the full country name and the full language name) and their official 
# language. Order the result so that those with the same official language are shown together.
SELECT country.name AS country, countrylanguage.language, countrylanguage.IsOfficial
FROM country 
INNER JOIN countrylanguage ON country.code = countrylanguage.CountryCode
WHERE countrylanguage.IsOfficial = "T"
ORDER BY countrylanguage.language; 

# Get the top 100 cities with the most population. Display the city's full country name also as well as their official 
# language.
SELECT DISTINCT country.name AS country, city.name AS city, countrylanguage.language, countrylanguage.IsOfficial, city.Population
FROM country 
INNER JOIN countrylanguage ON country.code = countrylanguage.CountryCode
INNER JOIN city ON country.code = city.CountryCode
WHERE countrylanguage.IsOfficial = "T"
ORDER BY city.Population DESC
LIMIT 100;

# Get the top 100 cities with the most population where the life_expectancy for the country is less than 40
SELECT DISTINCT country.name AS country, country.LifeExpectancy as lifeexpectancy , city.name AS city, city.Population 
FROM country 
INNER JOIN countrylanguage ON country.code = countrylanguage.CountryCode
INNER JOIN city ON country.code = city.CountryCode
WHERE country.LifeExpectancy < 40
ORDER BY city.Population DESC
LIMIT 100;

# Get the top 100 countries who speak English and where life expectancy is highest. Show the country with the 
# highest life expectancy first
SELECT DISTINCT country.name AS country, city.name AS city, country.LifeExpectancy as lifeexpectancy, countrylanguage.Language
FROM country 
INNER JOIN countrylanguage ON country.code = countrylanguage.CountryCode
INNER JOIN city ON country.code = city.CountryCode
WHERE Language = "English"
ORDER BY LifeExpectancy DESC 
LIMIT 100;



