<?php

//funkcija za ukljucivanje svih svih klas u skriptu
function autoLoader($class) {

$class = strtolower($class);
$the_path = "includes/$class.php";

  if(is_file($the_path) && !class_exists($class)) {
      
      include $the_path;
  }
}

spl_autoload_register('autoLoader');
 

//REDIRECTING

function redirect($location) {

    header("Location: $location");
    
}

//PASSWORD CRIPT

function password_crypt($password_log) {
    
     
     $hash = "$2y$10$";
     $salt = "kaijekundjzsjnegzjrn65";
     $hash_and_salt = $hash . $salt;
     $password_log = crypt($password_log, $hash_and_salt);
}


?>