<?php 

// Include authentication file
require_once(dirname(__DIR__) .'/admin/conn/auth.php');

// Load header file
require_once(dirname(__DIR__).'/admin/common/header.php');
?>


<body>
    <div class="container">
        <div class="tittle my-3 py-4 border-bottom d-flex justify-content-between align-items-center">
            <h3>Personal Blog | Dashboard</h3>

            <button class="btn btn-warning">Add Blog</button>
        </div>

        <div class="row">
            <table class="table align-middle text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Blog Name</th>
                        <th class="">Action</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Article No.</td>
                        <td>
                            <div class="d-flex justify-content-center gap-3">
                                <button class="btn btn-primary">Edit</button>
                                <button class="btn btn-danger">Delete</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Article No.</td>
                        <td>
                            <div class="d-flex justify-content-center gap-3">
                                <button class="btn btn-primary">Edit</button>
                                <button class="btn btn-danger">Delete</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Article No.</td>
                        <td>
                            <div class="d-flex justify-content-center gap-3">
                                <button class="btn btn-primary">Edit</button>
                                <button class="btn btn-danger">Delete</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Article No.</td>
                        <td>
                            <div class="d-flex justify-content-center gap-3">
                                <button class="btn btn-primary">Edit</button>
                                <button class="btn btn-danger">Delete</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Article No.</td>
                        <td>
                            <div class="d-flex justify-content-center gap-3">
                                <button class="btn btn-primary">Edit</button>
                                <button class="btn btn-danger">Delete</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
              
            </table>
        </div>
    </div>
</body>
</html>