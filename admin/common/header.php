<?php 

// ================================
// Load Enviroment Variables (.env)
// ================================
require_once dirname(__DIR__,2). '/vendor/autoload.php';
use Dotenv\Dotenv;

Dotenv::createImmutable(dirname(__DIR__,2))->load();

// ===============================
// Force HTTPS
// ==============================



if (strpos($_SERVER['HTTP_HOST'], 'localhost') === false) {
    if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off') {
        $redirectUrl = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        header("Location: $redirectUrl");
        exit();
    }
}




// ===============================
// Security Headers
// ==============================
header("Strict-Transport-Security: max-age=31536000; includeSubDomains; preload"); // HTTPS Only
header("X-Frame-Options: DENY");                // Prevent Clickjacking
header("X-Content-Type-Options: nosniff");      // Prevent MIME sniffing
header("Referrer-Policy: no-referrer");         // No referrer leakage
header("X-XSS-Protection: 1, mode=black");      // XSS protection for old browsers
header("Permission-Policy: geolocation=(), microphone=()");   // Disable camera/mic etc.
// header("Content-Security-Policy: default-src 'self'; script-src 'self'; style-src 'self' 'unsafe-inline';"); // CSP

// Load all title
$titles = require dirname(__DIR__,1). '/common/tittle.php'; //adjust if needed

$relativePath = $_SERVER['PHP_SELF'];

//remove relative slash
$relativePath = ltrim($relativePath,'/');


// Set title
$pageTitle = $titles[$relativePath] ?? 'Default Page';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
 
</head>