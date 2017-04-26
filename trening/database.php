<?php 
require_once("new_config.php");

 class Database {
     
     //connectino var
     public $connection;
     
     
     //connection call
     function __construct() {
         
         $this->db_connection();
     }
   
     
     
     //connection function
     public function db_connection() {
         
         $this->connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
         
        /* if(mysqli_connect_errno()) {
             
             die("connectin faild " . mysqli_error());
         }*/
     }
     
     
     //query
      
     public function query($sql) {
         
         $sqlQuery = mysqli_query($this->connection,$sql);
         return $sqlQuery;
         
         $this->confirm_query($sqlQuery);
     }
     
     //check query
     
    public function confirm_query($result) {
        
        if(!$result) {
            
            die("Query Faild " . mysqli_error($this->connection));
        }
    }
     
    
     //escape string
    public function escape_string($string) {
        
    $escapedString=mysqli_real_escape_string($this->connection,$string);
        return $escapedString;
    }
     
    
    public function insert_id() {
        
        return mysqli_insert_id($this->connection);
    }
     
 }
 
   

 $database = new Database();
 
  
?>