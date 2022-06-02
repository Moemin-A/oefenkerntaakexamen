<?php
    //Database params
    define('DB_HOST', 'localhost'); //Add your db host
    define('DB_USER', 'root'); // Add your DB root
    define('DB_PASS', ''); //Add your DB pass
    define('DB_NAME', 'oefenkerntaakexamen1'); //Add your DB Name

    //APPROOT
    define('APPROOT', dirname(dirname(__FILE__)));

    //URLROOT (Dynamic links)
    define('URLROOT', 'http://oefenkerntaakexamen.nl/');

    //Sitename
    define('SITENAME', 'Magazijn Beheer');

    // Logs 
    ini_set('display_errors', 1);
    ini_set('log_errors', 1);
    ini_set('error_log', '../app/logs.txt');
    error_reporting(E_ALL);

    