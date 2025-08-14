<?php 

// Represents a single blog post entity

class Blog{
    public string $article_title;
    public string $publishing_title;
    public string $content;
    public string $publish_date;

    // Blog constructor

    public function __construct( $article_title,  $publishing_title,  $content)
    {
        $this->article_title = $article_title;
        $this->publishing_title = $publishing_title;
        $this->content = $content;
        $this->publish_date = date('d-m-Y');
    }

    public function toArray(): array{
        return [
            'article_title' => $this->article_title,
            'publishing_title' => $this->publishing_title,
            'content' => $this->content,
            'publish_date' => $this->publish_date
        ];
    }
}

?>