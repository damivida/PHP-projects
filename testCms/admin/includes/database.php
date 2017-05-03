<?php
//require_once("new_config.php");



class Database {
    
    public $connection;
    
    
    //AUTOMATIC CONNECTION
    function __construct() {
        
        $this->db_connection();
    }
    
    
    
     //CONNECTION TO DATABASE    
     public function db_connection() {
         
         $this->connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
         
      
     }
    
    
    //QUERY
     public function query($sql) {
         
         $sqlQuery = mysqli_query($this->connection,$sql);
         return $sqlQuery;
         
         $this->confirm_query($sqlQuery);
     }
    
    
    
    //CONFIRM QUERY
     public function confirm_query($result) {
        
        if(!$result) {
            
            die("Query Faild " . mysqli_error($this->connection));
        }
    }
    
    
    //ESCAPE STRING
    public function escape_string($string) {
        
    $escapedString=mysqli_real_escape_string($this->connection,$string);
        return $escapedString;
    }
    
    //PASSWORD CRYPT
    public function password_crypt($password) {
        
    $hash = "$2y$10$";
    $salt = "kaijekundjzsjnegzjrn65";
    $hash_and_salt = $hash . $salt;
    $password = crypt($password, $hash_and_salt);
        return $password;
    }
    
    //INSERT ID
    
      public function insert_id() {
        
        return mysqli_insert_id($this->connection);
    }
    
}

$database = new Database();

?>