<?php 

require_once dirname(__DIR__).'/classes/Blog.php';

if($_SERVER["REQUEST_METHOD"] === "POST"){
    if(!isset($_POST['article_title']) || is_numeric($_POST['article_title'])){
        die("Invalid");
    }
}

?>