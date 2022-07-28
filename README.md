<p align="center"><a href="yupa.test" target="_blank"><img src="https://cdn.pixabay.com/photo/2020/10/23/05/23/leaves-5677717_960_720.png" width="400"></a></p>

## About Yupa

This implementation is part of an e-commerce web application where users can view products online. The site administrator can add/remove/edit products and mark them as active/inactive.


## For the full Yupa Experience and installation please see Yupa Project Guide.pdf located in the project root folder 

This document contains the project installation steps as well as a list of products that can be inserted into SQL that will make the project look just as I envisioned it. It also has a first-time usage guide.


## Requirements

For a Windows system, you can install the application locally using Laragon or XAMPP.
If you wish to install the components manually you will need:
- Web server
- MySQL database 
- Terminal 
- GUI for Mysql


## For a more manual Installation approach

- After installing the requirements you can clone the project into the web server’s root directory (for a default windows installation with Laragon the path should be: C:\laragon\www )
- Either unpack the zip file or open a terminal in the above folder and clone the project.
- Set up a connection with the newly installed DB in the .env file.
- Create a new database called “yupa” CREATE DATABASE IF NOT EXISTS `yupa`
- Migrate the tables using the command $php artisan migrate.
- If the migration does not work we need to run the SQL Script directly. The script can be found in the file Yupa Project Guide.pdf located in the project root folder.
