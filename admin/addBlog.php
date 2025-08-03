<?php 

// Include authentication file
require_once(dirname(__DIR__) .'/admin/conn/auth.php');

// Load header file
require_once(dirname(__DIR__).'/admin/common/header.php');

//Verfiy CSRF token
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']){
        die('Invalid CSRF token');
    }
}


//Check form is submitted
if(isset($_POST['add_blog_btn'])){

    //Store form input
    $article_title = htmlspecialchars(strip_tags(trim($_POST['article_title'])), ENT_QUOTES, 'UTF-8');
    $publishing_title = htmlspecialchars(strip_tags(trim($_POST['publishing_title'])), ENT_QUOTES, 'UTF-8');
    $content = htmlspecialchars(strip_tags(trim($_POST['content'])), ENT_QUOTES, 'UTF-8');
}
?>


<body>
    <div class="container">
        <div class="tittle my-3 py-3 border-bottom">
            <h2>Add Personal Blog </h2>
        </div>

        <form action="" method="post">
            <input type="text" name="csrf_token" id="" value="<?= csrf_token(); ?>">
            <div class="mb-3">
                <label for="" class="form-label "><b>Article Title</b></label>
                <input type="text" name="article_title " id="" class="form-control" placeholder="Enter Article Title"> 
            </div>

            <div class="mb-3">
                <label for="" class="form-label"><b>Publishing Title</b></label>
                <input type="text" name="publishing_title" id="" class="form-control" placeholder="Enter Publishing Title">
            </div>

            <div class="mb-3">
                <label for="" class="form-label"><b>Content</b></label>
                <textarea name="content" id="" class="form-control" placeholder="Enter Content" rows="10"></textarea>
            </div>

            <div class="d-grid">
                <input type="submit" name="add_blog_btn" value="Add Blog" class="btn btn-danger">
            </div>



            <div class="mb-3">
                <label for="" class="form-label"></label>
            </div>
        </form>
    </div>
</body>
</html>