<?php 


// Validate and sanitizes blog form data 
class BlogValidator{

    // Field labels for friendly error message
    private $fieldsLabels = [
        'article_title' => 'Article Title',
        'publishing_title' => 'Publishing Title',
        'content' => 'Content'
    ];

    //Validate and sanitize input datas
    public function validate(array $data): array {
        $errors = [];
        $values = [];

        foreach($this->fieldsLabels as $field => $label){
            //Trim whitespace and removed unwanted tags
            $input = trim($data[$field] ?? '');
            $escaped = htmlspecialchars(strip_tags($input), ENT_QUOTES, 'UTF-8');
            $values[$field] =  $escaped;

            //Validation rules
            if($input == ''){
                $errors[$field] = "$label is required";
            }else if($field == 'article_title' && strlen($input) < 4){
                $errors[$field] = "$label must be at least 4 characters";
            }
        }

        return [$errors,$values];
    }
}


?>