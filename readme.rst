###################
Cloud Panda Test for Niraj Jani
###################

-- Contains Two tasks.


-- Task 1 -- Organization hierarchy Management and display as chart and table

-- Task 2 -- Random Alphanumeric Text as spiral based on random two dimentional array

************
Installation
************
Please follow below steps

-- Clone the github into local

-- try git clone https://github.com/janiniraj/cloudpanda.git

-- create database named "cloudpanda"

-- import cloudpanda.sql from root folder to mysql database

-- open application/config/database.php and change the database username and password

-- run in the browser as http://localhost/cloudpanda/


************
Instructions
************

-- Menu have organizations, add new record and text spiral

-- application/config/routes.php contain routes

-- application/controllers/Organizations.php and application/controllers/Stringspiral.php contains the controller

-- application/models/Organization_Model.php contains the Model for table organizations

-- The same model contains the recursive function to fetch the data as tree form

-- The controller Stringspiral.php contains the logic to create two dimentional random element alpha numeric array and I have used two loops only.

-- The layout of each page is in application/views (No use of bootstrap)

**************
Important Urls
**************

http://localhost/cloudpanda/
http://localhost/cloudpanda/index.php/organizations/create
http://localhost/cloudpanda/index.php/stringspiral
http://localhost/cloudpanda/index.php/organizations/edit/2

*******************
Requirements
*******************

PHP version 5.6 or newer is recommended.
Mysql should be installed

*******************
Notes
*******************

-- I tried to use codeigniter -- This first project of mine in codeigniter and I took 5-6 hrs to create this as time was limited (one day).

-- I used full MVC structure, used model for database operations

-- I used codeigniter's default functionality mostly, but please allow me where it can't be possible at this moment

-- I didn't used anywhere raw query like "SELECT * from ...." instead I used codeigniter's query builder

-- I used template functionality, created header and footer

-- tried to make it responsive as much as I can.

-- Using bootsrap we can make it responsive easily and visually attractive (not used in this project at this moment, as per the rules of sheet provided).

-- Please consider the code quality and standards for neat code.
