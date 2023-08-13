---1
SELECT employees.*,departments.department_name FROM `employees` RIGHT JOIN departments 
ON employees.manager_id=departments.manager_id
WHERE departments.department_id BETWEEN 100 AND 200;

-------------------------------------------------------------
---2
SELECT * FROM `employees` 
ORDER BY salary DESC
LIMIT 1 OFFSET 1; --17000 

SELECT * FROM `employees` WHERE salary=( SELECT DISTINCT salary FROM employees
ORDER BY salary DESC
LIMIT 1 OFFSET 1);  --17000 --17000

---------------------------------------------------------------
---3

SELECT employee_id,first_name,salary FROM `employees` 
 INNER JOIN departments ON employees.employee_id=departments.department_id
 WHERE 
 first_name LIKE '%J%' AND salary > (SELECT AVG(salary) from employees);

 -----------------------------------------------------------------
 ---4
 SELECT first_name,last_name FROM `employees` 
 LEFT JOIN departments ON employees.employee_id=departments.department_id
 WHERE 
 salary > (SELECT  SUM(salary) * 0.50 FROM employees );

             ------

 SELECT first_name, last_name
FROM employees
LEFT JOIN (
    SELECT department_id, SUM(salary) AS total_salary
    FROM employees
    GROUP BY department_id
) AS department_salaries
ON employees.department_id = department_salaries.department_id
WHERE employees.salary > department_salaries.total_salary * 0.50; --gets results


 ---------------------------------------------------------------------
 ---5
SELECT CONCAT(employees.first_name, ' ', employees.last_name) AS fullname,
       employees.employee_id,
       CAST(countries.country_name AS CHAR) AS country_name
FROM employees
JOIN departments ON employees.employee_id = departments.department_id
JOIN locations ON departments.location_id = locations.location_id
JOIN countries ON locations.country_id = countries.country_id;

--------------------------------------------------------------------------
---6

SELECT CONCAT(employees.first_name, ' ', employees.last_name) AS fullname,
       employees.employee_id
FROM employees
JOIN departments ON employees.employee_id = departments.department_id
JOIN locations ON departments.location_id = locations.location_id
WHERE locations.city="london";

------------------------------------------------------------------------------
---7
SELECT countries.country_name,locations.city,COUNT(departments.department_id)
FROM employees
JOIN departments ON employees.employee_id = departments.department_id
JOIN locations ON departments.location_id = locations.location_id
JOIN countries ON locations.location_id=countries.country_id

GROUP BY countries.country_name,locations.city
HAVING COUNT(employees.employee_id) >= 2;

-------------------------------------------------------------------------------------
---8



