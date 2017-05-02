<?php
class Session {
    
    public $user_id;
    public $signed_in = false;
    public $message;
    

   function __construct() {
       
       session_start();
       $this->check_login();
      
   }    
    

    
    //message
    public function message($msg="") {
        
        if (!empty($msg)) {
            
            $msg = $_SESSION['message'];
        } else {
            
            return $this->message;
        }
    }
    
    //check message
     private function check_message() {
     
         if(isset($_SESSION['message'])) {
             
             $this->message = $_SESSION['message'];
             unset($_SESSION['message']);
         } else {
             $this->message="";
         }
    }
     
    

   public function is_signed_in() {
      
      return $this->signed_in;
   }  
    
    
   public function login($user) {
    
       if($user) {
           
          
           $this->user_id = $_SESSION['user_id'] = $user->id;
           $this->user_id = $_SESSION['first_name'] = $user->first_name;
           $this->user_id = $_SESSION['last_name'] = $user->last_name;
           
           $this->signed_in = true;
       }
   }
    
    
   public function logout(){ 
       
       
         unset($_SESSION['user_id']);
         unset($_SESSION['first_name']);
         unset($_SESSION['last_name']);
         unset($this->user_id);
         $this->signed_in = false;
   }
    
    
   private function check_login() {
       
       if (isset($_SESSION['user_id'])) {
           
           $this->user_id = $_SESSION['user_id'];
           $this->signed_in = true;
       }else {
           
           unset($this->user_id);
           $this->signed_in = false;
       }
   }
}

$session = new Session();

?>