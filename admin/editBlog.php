<?php 

// Session start
if(session_status() != PHP_SESSION_ACTIVE){
    session_start();
}

//Include required classes
require_once __DIR__ .'/conn/auth.php';
require_once __DIR__ .'/common/header.php';
require_once dirname(__DIR__).'/classes/Blog.php';
require_once dirname(__DIR__).'/classes/BlogManager.php';
require_once dirname(__DIR__).'/classes/BlogValidator.php';
require_once dirname(__DIR__).'/classes/Csrf.php';

//Create a instance of helper classes
$blogManager = new BlogManager(dirname(__DIR__).'/data/blogs.json');
$validator = new BlogValidator();



// Save old 
function old(string $field, array $values): string {
    return htmlspecialchars($values[$field] ?? '', ENT_QUOTES, 'UTF-8');
}
?>


<body>
    <div class="container">
        <div class="tittle my-3 py-3 border-bottom">
            <h2>Add Personal Blog </h2>
        </div>

         <!-- Show Success message after data saved successfully -->
        <?php if(isset($_SESSION['success'])):?>
            <div class="alert alert-success"><?= $_SESSION['success'] ?></div>
        <?php unset($_SESSION['success']) ; ?>
        <?php endif; ?>

        <!-- Show error message if data saved failed -->
        <?php if(isset($_SESSION['error'])):?>
            <div class="alert alert-danger"><?= $_SESSION['error'] ?></div>
        <?php unset($_SESSION['error']) ; ?>
        <?php endif; ?>

        <form action="addBlog.php" method="post">
            <input type="hidden" name="csrf_token" id="" value="<?= Csrf::generateToken() ?>">
            <div class="mb-3">
                <label for="" class="form-label "><b>Article Title</b></label>
                <input type="text" name="article_title" id="" class="form-control" placeholder="Enter Article Title" value=""> 
                <small class="text-danger"><?= $error['article_title'] ?? '' ?></small>
            </div>

            <div class="mb-3">
                <label for="" class="form-label"><b>Publishing Title</b></label>
                <input type="text" name="publishing_title" id="" class="form-control" placeholder="Enter Publishing Title" value="">
                <small class="text-danger"><?= $error['publishing_title'] ?? '' ?></small>

            </div>

            <div class="mb-3">
                <label for="" class="form-label"><b>Content</b></label>
                <textarea name="content" id="" class="form-control" placeholder="Enter Content" rows="10"></textarea>
                <small class="text-danger"><?= $error['content'] ?? '' ?></small>

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