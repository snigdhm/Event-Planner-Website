# Event-Planner-Website

Eventplanner Website Version 1.0 06/11/2016

# GENERAL USAGE INFORMATION
--------------------------------------------------------------------------------

Event Planner is a website specially designed for the people looking forward
to organizing an event.The website provides a variety of famous vendors available
for every part of an event.The vendors can include necessary information about
their services alongwith contact information.The services can be booked depending
on its availability on the particular day.

  *For a full description of the website, refer to the report provided alongwith
   the website.

  *To submit bug reports and feature suggestions, mail to:
   snigdhmanas@gmail.com 

---------------------------------------------------------------------------------

# REQUIREMENTS
---------------------------------------------------------------------------------

This website requires the following platform:

 * A web browser to access the website like Google Chrome, Firefox etc.
 * XAMPP server configured properly to host the website and to import the database
   to phpMyAdmin.

 * XAMPP can be downloaded from-
   https://www.apachefriends.org/download.html

 * To install the XAMPP server follow any youtube tutorial,for example, for Ubuntu
   users, use the folowing site- https://www.youtube.com/watch?v=pUsr226gAUM 

 * The website will run on any OS fulfilling the above three requirements including
   Windows, Linux and Mac OS.

---------------------------------------------------------------------------------

# INSTALLATION
---------------------------------------------------------------------------------
 

 * Put the DBMS folder into xampp\htdocs.

 * Import test.sql into phpMyAdmin in sql format.

 * In all the .php files in the extracted DBMS folder, change the username and
   password wherever-
   $db= mysqli_connect('localhost','root','root','test'); 
   occurs to your php username and password. Here first 'root' is username and
   the second one is 'password'.

 * In your browser go to localhost\DBMS\head1.php and the website's homepage will
   appear. 

---------------------------------------------------------------------------------

# TROUBLESHOOTING
---------------------------------------------------------------------------------

 * If the website does not display properly, check the following:

   - Is your computer properly connected to the internet?
   
   - Has the installation been correct and according to the above guidlines?

   - Is there a problem with the XAMPP server?

--------------------------------------------------------------------------------

# DEVELOPERS
--------------------------------------------------------------------------------

 * Shrinidhi S Talpankar (14CO143) - shrinidhitalpankar@gmail.com
 * S R Rimitha (14CO137) - rimitharaj@gmail.com
 * Snigdh Manasvi (14CO146) - snigdhmanas@gmail.com

This project has been developed for:
 * DATABASE MANAGEMENT SYSTEMS LAB, fifth semester
   Computer and Science Engineering Department,
   National Institute of Technology Karnataka
   Surathkal, 575025

--------------------------------------------------------------------------------   
