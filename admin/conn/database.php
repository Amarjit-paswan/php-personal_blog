<?php 

// Database Connection

use Dotenv\Dotenv;

// Include the .env vendor file
require_once dirname(__DIR__,2). '/vendor/autoload.php';

// Load the enviroment vairables
$dotenv = Dotenv::createImmutable(dirname(__DIR__,2));
$dotenv->load();



?>