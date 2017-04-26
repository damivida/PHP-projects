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
    

//PRETUSMJERAVANJE
function redirect($location) {
    
    header("Location: $location");
}

?>