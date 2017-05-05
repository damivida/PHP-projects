<?php

class Posts extends Db_object {
    
    protected static $db_table = "posts";
    protected static $db_table_field = array('post_author', 'post_title', 'post_date', 'post_content','post_status');
    
    public $id;
    public $post_author;
    public $post_title;
    public $post_date;
    public $post_content;
    public $post_status;
  
    
    public static function find_all_posts() {
        
        $sql = "SELECT * FROM " . self::$db_table . " WHERE post_status = 'published' ORDER BY post_date DESC";
        
        return static::find_query($sql);
    }
}



?>
