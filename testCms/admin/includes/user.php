<?php 

 class User extends Db_object {
     
    
     
    protected static $db_table = "users";
    protected static $db_table_field = array('first_name', 'last_name', 'email', 'rang', 'status');
     
    public $id;
    public $first_name;
    public $last_name;
    public $email;
    public $rang;
    public $status;
     
 }


?>