<?php 

 class User extends Db_object {
     
    
     
    protected static $db_table = "users";
    protected static $db_table_field = array('first_name', 'last_name', 'email', 'password', 'rang', 'status');
     
    public $id;
    public $first_name;
    public $last_name;
    public $email;
    public $password; 
    public $rang;
    public $status;
     



      public static function verify_user($first_name,$password) {
          
        global $database;
        
        //ESCAPE STRING  
        $first_name = $database->escape_string($first_name);
        $password = $database->escape_string($password);
        
        //PASSWORD CRYPT  
        $password = $database->password_crypt($password);
          
        //SQL SELECT  
        $sql = "SELECT * FROM " . self::$db_table . " WHERE first_name = '$first_name' ";
        $sql .= "AND password = '$password' ";
        
        $objectArray3 = self::find_query($sql);
        
        return !empty($objectArray3) ? array_shift($objectArray3) : false;
    }

}    

?>