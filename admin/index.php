<?php 

// Include authentication file
require_once(dirname(__DIR__) .'/admin/conn/auth.php');

// Load header file
require_once(dirname(__DIR__).'/admin/common/header.php');

// Add Controller
require_once(dirname(__DIR__).'/controller/blogController.php');

//Assign file 
$file_path = dirname(__DIR__).'/data/blogs.json';

//Intialize variable to avoid "undefined" values
$json = [];

//Check if file exits before reading
if(file_exists($file_path)){
    $blogs_data = file_get_contents($file_path);

    if(!empty($blogs_data)){
        $decoded = json_decode($blogs_data,true);
    }

}
?>


<body>
    <div class="container">
        <div class="tittle my-3 py-4 border-bottom d-flex justify-content-between align-items-center">
            <h3>Personal Blog | Dashboard</h3>

            <a href="addBlog.php" class="btn btn-warning">Add Blog</a>
        </div>

        <div class="row">
            <table class="table align-middle text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Blog Name</th>
                        <th>Publish Title</th>
                        <th>Content</th>
                        <th>Date</th>
                        <th class="">Action</th>
                    </tr>
                </thead>

                <tbody>
                    <!-- Print the Blogs  -->
                     <?php $i=1; foreach($decoded as $blog): ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= htmlspecialchars($blog['article_title'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars($blog['publishing_title'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars($blog['content'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars($blog['publish_date'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td>
                            <div class="d-flex justify-content-center gap-3">
                                <form action="editBlog.php?blog_id" method="post">
                                    <input type="hidden" name="blog_id" value="<?= $blog['article_title'] ?>">
                                    <input type="submit" value="Edit" class="btn btn-primary">
                                </form>
                                <button class="btn btn-danger">Delete</button>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                   
                   
                </tbody>
              
            </table>
        </div>
    </div>
</body>
</html>