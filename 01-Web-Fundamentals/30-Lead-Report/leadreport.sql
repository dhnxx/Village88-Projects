USE lead_gen_business;

# What query would you run to get all the sites that client=15 owns?
SELECT domain_name as website, client_id FROM sites
WHERE client_id = 15;

# What query would you run to get total count of domain created for June 2011
SELECT DATE_FORMAT(created_datetime, "%M") as month, COUNT(domain_name) as total_count FROM sites
WHERE DATE_FORMAT(created_datetime, "%M %Y") = "June 2011";

# What query would you run to get the total revenue for the date November 19th 2012?
SELECT DATE_FORMAT(charged_datetime, "%Y-%m-%d") as date, SUM(amount) as revenue FROM billing
WHERE DATE_FORMAT(charged_datetime, "%Y-%m-%d") = "2012-11-19"
GROUP BY DATE_FORMAT(charged_datetime, "%Y-%m-%d");

# What query would you run to get total revenue earned monthly each year for the client with an id of 1?
SELECT client_id, SUM(amount) as total_revenue, DATE_FORMAT(charged_datetime, "%M") as month, 
DATE_FORMAT(charged_datetime, "%Y") as year FROM billing 
WHERE client_id = 1 
GROUP BY MONTH (charged_datetime)
ORDER BY DATE_FORMAT(charged_datetime, "%M");


# What query would you run to get total revenue of each client every month per year? Order it by client id.
SELECT 
    CONCAT(clients.first_name, " ", clients.last_name) as client_name,
    SUM(amount) as total_revenue,
    DATE_FORMAT(charged_datetime, "%M") as month_charged,
    DATE_FORMAT(charged_datetime, "%Y") as year_charged
FROM billing
LEFT JOIN clients ON clients.client_id = billing.client_id
GROUP BY clients.client_id, YEAR(charged_datetime), MONTH(charged_datetime)
ORDER BY clients.client_id, YEAR(charged_datetime), MONTH(charged_datetime); 

# What query would you run to get which sites generated leads between March 15, 2011 to April 15, 2011?
SELECT sites.domain_name, COUNT(leads.leads_id) AS lead_count FROM sites
INNER JOIN leads ON leads.site_id = sites.site_id
WHERE leads.registered_datetime BETWEEN "2011-03-15" AND "2011-04-15"
GROUP BY sites.domain_name;

/* 7. What query would you run to show all the site owners, the site name(s), and the total number of leads 
generated from each site for all time? */ 

SELECT CONCAT(clients.first_name, " ", clients.last_name) as client_name, sites.domain_name, COUNT(leads.leads_id) AS num_lead
FROM clients 
INNER JOIN sites ON clients.client_id = sites.client_id
INNER JOIN leads ON leads.site_id = sites.site_id
GROUP BY sites.domain_name
ORDER BY clients.last_name, sites.domain_name;

# What query would you run to get a list of site owners who had leads, and the total of each for the whole 
# 2012?
SELECT CONCAT(clients.first_name, " ", clients.last_name) as client_name, COUNT(leads.leads_id) AS num_lead
FROM clients 
INNER JOIN sites ON clients.client_id = sites.client_id
INNER JOIN leads ON leads.site_id = sites.site_id
WHERE YEAR(leads.registered_datetime) = "2012"
GROUP BY clients.last_name;

/* Write a single query that retrieves all the site names that each client owns and its total count. Group the 
results so that each row shows a new client. (Tip: use GROUP_CONCAT) */

SELECT CONCAT(clients.first_name, " ", clients.last_name) as client_name, COUNT(sites.domain_name), GROUP_CONCAT(sites.domain_name) 
FROM clients
INNER JOIN sites ON clients.client_id = sites.client_id
GROUP BY clients.last_name;




    



 