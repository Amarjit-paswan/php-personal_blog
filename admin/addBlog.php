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

   //Create empty array to show error
    $error = [];

    //Create empty array to show value for each error
    $values = [];


//Check form is submitted
if(isset($_POST['add_blog_btn'])){

    //Store form input
    $article_title = htmlspecialchars(strip_tags(trim($_POST['article_title'])), ENT_QUOTES, 'UTF-8');
    $publishing_title = htmlspecialchars(strip_tags(trim($_POST['publishing_title'])), ENT_QUOTES, 'UTF-8');
    $content = htmlspecialchars(strip_tags(trim($_POST['content'])), ENT_QUOTES, 'UTF-8');


    // Save input name as Proper words
    $fields_labels = [
        'article_title' => 'Article Title',
        'publishing_title' => 'Publishing Title',
        'content' => 'Content'
    ];

    // Store input name
    $fields = ['article_title', 'publishing_title', 'content'];

 

    foreach($fields as $field){
        $input = trim($_POST[$field] ?? '');
        $escaped = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');

        $values[$field] = $escaped;

        // Remove underscore and special character from name of input
        $label = $fields_labels[$field] ?? ucfirst(str_replace('_',' ',$field));

        if($input === ''){
            $error[$field] = "$label is required";
        }else if($field === 'article_title' && strlen($input) < 4){
            $error[$field] = "$label must be at least 4 characters";
        }
    }

    // Save data when error is empty
    if(empty($error)){

        // Prepare Blog Details
        $newBlog = [
            'article_title' => $article_title,
            'publishing_title' => $publishing_title,
            'content' => $content,
            'publish_date' => date('d-m-Y')
        ];

        $filePath = dirname(__DIR__) . '/data/blogs.json';

            $Blogs = [];
            $existingData = file_get_contents($filePath);
            if(!empty($existingData)){
                $Blogs = json_decode($existingData,true);
            }

            // Add new blog to list
            $Blogs[] = $newBlog;

     
        // Save back to file 
        if(file_put_contents($filePath, json_encode($Blogs, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES))){
            $_SESSION['success'] = "Users saved successfully";
            header('Location: '. $_SERVER['PHP_SELF']);
            exit();
        }else{
            $error['error'] = "Failed to save";
        }

    }

}

//Save old input value
function old($field,$values){
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
            <input type="hidden" name="csrf_token" id="" value="<?= csrf_token(); ?>">
            <div class="mb-3">
                <label for="" class="form-label "><b>Article Title</b></label>
                <input type="text" name="article_title" id="" class="form-control" placeholder="Enter Article Title" value="<?= old('article_title', $values) ?>"> 
                <small class="text-danger"><?= $error['article_title'] ?? '' ?></small>
            </div>

            <div class="mb-3">
                <label for="" class="form-label"><b>Publishing Title</b></label>
                <input type="text" name="publishing_title" id="" class="form-control" placeholder="Enter Publishing Title" value="<?= old('publishing_title', $values) ?>">
                <small class="text-danger"><?= $error['publishing_title'] ?? '' ?></small>

            </div>

            <div class="mb-3">
                <label for="" class="form-label"><b>Content</b></label>
                <textarea name="content" id="" class="form-control" placeholder="Enter Content" rows="10"><?= old('content', $values) ?></textarea>
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