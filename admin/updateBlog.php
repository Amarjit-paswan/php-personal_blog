<?php 

// Include authentication file
require_once(dirname(__DIR__) .'/admin/conn/auth.php');

// Load header file
require_once(dirname(__DIR__).'/admin/common/header.php');
?>


<body>
    <div class="container ">
        <div class="tittle my-3 py-3 border-bottom">
            <h2>Update Personal Blog</h2>
        </div>

        <form action="" method="post">
            <div class="mb-3">
                <label for="" class="form-label"><b>Article Title</b></label>
                <input type="text" name="" id="" class="form-control" placeholder="Enter Article Title"> 
            </div>

            <div class="mb-3">
                <label for="" class="form-label"><b>Publishing Title</b></label>
                <input type="text" name="" id="" class="form-control" placeholder="Enter Publishing Title">
            </div>

            <div class="mb-3">
                <label for="" class="form-label"><b>Content</b></label>
                <textarea name="" id="" class="form-control" placeholder="Enter Content" rows="10"></textarea>
            </div>

            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>



    
        </form>
    </div>
</body>
</html>