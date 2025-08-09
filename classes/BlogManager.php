<?php 

// Handle all blog operations like adding, fetching and saving blogs to JSON file

class BlogManager{

    //Path to json file
    private $filePath;

    public function __construct($filePath)
    {
        $this->filePath = $filePath;

        // Ensure data folder exists
        $dataDir = dirname($filePath);
        if(!is_dir($dataDir)){
            mkdir($filePath,0755,true);
        }

        // Ensure the file exists and contains and empty array if new
        if(!file_exists($filePath)){
            file_put_contents($filePath,json_encode([]));
        }
    }

    // Get all Blogs 
    public function getBlogs(){
        $data = file_get_contents($this->filePath);
        return json_decode($data,true) ?? [];
    }

    // Add a new Blog entry
    public function addBlog($blogs){
        $blogs = $this->getBlogs();
        $blogs[] = $blogs;
        return file_put_contents($this->filePath, json_encode($blogs, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)) !== false;
    }
}
?>