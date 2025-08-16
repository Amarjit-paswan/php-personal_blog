<?php 

// Include authentication file
require_once(__DIR__ .'/admin/conn/auth.php');

// Load header file
require_once(__DIR__.'/admin/common/header.php');

//Assign file
$file_path = 'data/blogs.json';

//json file store
$json =[];

//Check if file exist before reading
    if(file_exists($file_path)){
       
        $blogs_data = file_get_contents($file_path);
        if(!empty($blogs_data)){
            $decoded = json_decode($blogs_data,true);

            
        }
    }

?>


<body>
    <div class="container">
        <div class="title my-3">
            <h1>Personal Blog</h1>
        </div>

        <div class="row">
            <ul class="d-flex flex-column gap-3"> 
                <?php foreach($decoded as $blog): ?>
                <li><a href="">
                        <div class="d-flex w-100 justify-content-between align-items-center">
                            <h4><?= htmlspecialchars($blog['article_title'],ENT_QUOTES,'UTF-8') ?></h4>
                            <p class="m-0 fs-5 text-secondary"><?= htmlspecialchars($blog['publish_date'],ENT_QUOTES,'UTF-8') ?></p>
                        </div>
                    </a>
                </li>
                <?php endforeach; ?>
              
   
            </ul>
        </div>
    </div>
</body>
</html>