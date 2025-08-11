<?php 

// Handle CSRF token generation and verification

class Csrf{
    // Generate and store CSRF token in session
    public static function generateToken() : string {

        //Check if session is already set
        if(session_status() !== PHP_SESSION_ACTIVE){
            session_start();
        }

        if(empty($_SESSION['csrf_token'])){
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }

    //Verify the submitted CSRF token
    public static function verifyToken(?string $token) : bool {
        if(session_status() !== PHP_SESSION_ACTIVE){
            session_start();
        }
        return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], (string)$token);
    }
}

?>