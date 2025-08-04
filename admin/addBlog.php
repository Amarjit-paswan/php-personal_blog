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


    // Save input name as Proper words
    $fields_labels = [
        'article_title' => 'Article Title',
        'publishing_title' => 'Publishing Title',
        'content' => 'Content'
    ];

    // Store input name
    $fields = ['article_title', 'publishing_title', 'content'];

    //Create empty array to show error
    $error = [];

    //Create empty array to show value for each error
    $values = [];

    foreach($fields as $field){
        $values = trim($_POST[$field] ?? '');
        $values[$field] = htmlspecialchars($values);

        if($values === ''){
            $label = $fields_labels[$field] ?? ucfirst(str_replace('_',' ',$field));
            $error[$field] = "$label is required";
        }
    }

    // Prepare Blog Details
    $newBlog = [
        'article_title' => $article_title,
        'publishing_title' => $publishing_title,
        'content' => $content,
        'publish_date' => date('d-m-Y')
    ];

    // File path (Stored blogs details)
    $filePath = dirname(__DIR__). '/data/blogs.json';

    // Read existing blog in file
    $Blogs = [];
    if(file_exists($filePath)){
        $json_data = file_get_contents($filePath);
        $Blogs = json_decode($json_data,true) ?? [];
    }

    // Add new Blog to the list
    $Blogs[] = $newBlog;

    // Save back to file 
    file_put_contents($filePath, json_encode($Blogs, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

    echo "Users saved successfully";
}
?>


<body>
    <div class="container">
        <div class="tittle my-3 py-3 border-bottom">
            <h2>Add Personal Blog </h2>
        </div>

        <form action="addBlog.php" method="post">
            <input type="text" name="csrf_token" id="" value="<?= csrf_token(); ?>">
            <div class="mb-3">
                <label for="" class="form-label "><b>Article Title</b></label>
                <input type="text" name="article_title" id="" class="form-control" placeholder="Enter Article Title"> 
                <small class="text-danger"><?= $error['article_title'] ?? '' ?></small>
            </div>

            <div class="mb-3">
                <label for="" class="form-label"><b>Publishing Title</b></label>
                <input type="text" name="publishing_title" id="" class="form-control" placeholder="Enter Publishing Title">
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