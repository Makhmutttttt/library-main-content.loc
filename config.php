<?php

// Database configuration
define('DB_SERVER', '127.0.0.1'); // Replace with your MySQL server address
define('DB_USERNAME', 'root'); // Replace with your MySQL username
define('DB_PASSWORD', ''); // Replace with your MySQL password
define('DB_NAME', 'movie_db'); // Replace with your MySQL database name

// Error reporting (comment out for production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Establish a database connection
$conn = new mysqli('127.0.0.1', 'root', '', 'movie_db'); // Replace with your database connection details

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
