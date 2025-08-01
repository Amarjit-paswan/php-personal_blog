<?php 

use Dotenv\Dotenv;

// Include a vendor file
require_once dirname(__DIR__,2) . '/vendor/autoload.php';

// Load enviroment variables from .env
Dotenv::createImmutable(dirname(__DIR__,2))->load();

// Store the value of credentials
$valid_username = $_ENV['USERNAME'];
$valid_password = $_ENV['PASSWORD'];

// Check if the user has sent credentials and if they are correct
if(!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) || $_SERVER['PHP_AUTH_USER'] !== $valid_username || $_SERVER['PHP_AUTH_PW'] !== $valid_password){

    // If no or wrong credentials, tells browser to show login popup
    header('WWW-Authenticate: Basic realm="Admin Login"');
    header('HTTP/1.0 401 Unauthorized');

    // Denied access
    exit();
}




?>