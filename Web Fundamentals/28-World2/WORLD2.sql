USE WORLD;

# How many countries in each continent have a life expectancy greater than 70?
SELECT country.continent, COUNT(country.name) AS total_countries, country.LifeExpectancy life_expectancy
FROM country
WHERE country.LifeExpectancy > 70
GROUP BY country.continent;

# How many countries in each continent have life expectancy between 60 and 70?
SELECT country.continent, COUNT(country.name) AS total_countries, country.LifeExpectancy as life_expectancy
FROM country
WHERE country.LifeExpectancy BETWEEN 60 AND 70
GROUP BY country.continent;

# How many countries have life expectancy greater than 75?
SELECT country.name, country.LifeExpectancy as life_expectancy
FROM country
WHERE country.LifeExpectancy > 75
GROUP BY country.name;

# How many countries have life expectancy less than 40?
SELECT country.name, country.LifeExpectancyas life_expectancy
FROM country
WHERE country.LifeExpectancy < 40
GROUP BY country.name;

# How many people live in the top 10 countries with the most population?
SELECT name, population as populations
FROM country
ORDER BY population DESC
LIMIT 10;

# According to the world database, how many people are there in the world?
SELECT SUM(population) FROM COUNTRY;

# Show results for continents where it shows the continent name and the total population. Only show results 
# where the total_population for the continent is more than 500,00,000. If. the continent doesn't have 
# 500,000,000 people, do NOT show the result.
SELECT continent, SUM(population) as total_population FROM COUNTRY
GROUP BY country.continent
HAVING SUM(population) > 500000000;

/*  Show results of all continents that has average life expectancy for the continent to be 
less than 71. Show each of these continent name, how many countries there are in each of the continent, total 
population for the continent, as well as the life expectancy of this continent. For example, as Europe and North 
America both have continent life expectancy greater than 71, these continents shouldn't show up in your sql 
results */
SELECT continent, COUNT(country.name) as country, SUM(population) as total_population, AVG(lifeexpectancy) FROM COUNTRY
GROUP BY country.continent
HAVING AVG(lifeexpectancy) < 71;

# How many cities are there for each of the country? Show the total city count for each country where you 
# display the full country name

SELECT country.name, COUNT(city.name) FROM COUNTRY 
INNER JOIN city ON country.code = city.countrycode 
GROUP BY country.name;

# For each language, find out how many countries speak each language
SELECT countrylanguage.language, COUNT(countrylanguage.language) AS number_of_countries
FROM countrylanguage
INNER JOIN country ON country.code = countrylanguage.countrycode 
GROUP BY countrylanguage.language;

# For each language, find out how many countries use that language as the official language
SELECT countrylanguage.language, COUNT(countrylanguage.language) AS number_of_countries, countrylanguage.IsOfficial
FROM countrylanguage
INNER JOIN country ON country.code = countrylanguage.countrycode 
WHERE countrylanguage.IsOfficial = "T"
GROUP BY countrylanguage.language;

/*  For each continent, find out how many cities there are (according to this database) and the average population 
of the cities for each continent. For example, for continent A, have it state the number of cities for that
continent, and the average city population for that continent. */ 
SELECT country.Continent, COUNT(city.CountryCode), AVG(city.Population)
FROM country
INNER JOIN city ON country.code = city.countrycode 
GROUP BY country.Continent;

/* (Advanced) Find out how many people in the world speak each language. Make sure the total sum of. this 
number is comparable to the total population in the world. */ 
SELECT countrylanguage.language, SUM(country.population * (countrylanguage.percentage / 100)) AS total_population
FROM countrylanguage
INNER JOIN country ON country.code = countrylanguage.countrycode
GROUP BY countrylanguage.language
ORDER BY total_speakers DESC;


