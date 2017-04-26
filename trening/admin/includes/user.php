<?php

class User extends Db_object {
    
    protected static $db_table = "users";
    protected static $db_table_field = array('user_image','username', 'password', 'first_name', 'last_name', );
    public $id;
    public $user_image;
    public $username;
    public $password;
    public $first_name;
    public $last_name;
    public $upload_directory = "images";
    public $image_placeholder = "http://placehold.it/400x400&text=image";
    
    public function image_path_or_placeholder() {
        
        return empty($this->user_image) ? $this->image_placeholder : $this->upload_directory . DS . $this->user_image;
    }
   
    
    
    public static function verify_user($username,$password) {
        global $database;
        
        $username = $database->escape_string($username);
        $password = $database->escape_string($password);
        
        $sql = "SELECT * FROM " . self::$db_table . " WHERE username = '$username' ";
        $sql .= "AND password = '$password' ";
        
        $objectArray3 = self::find_query($sql);
        
        return !empty($objectArray3) ? array_shift($objectArray3) : false;
    }

    
    

  
   
    
    
    

    
}  //end of user class



?>