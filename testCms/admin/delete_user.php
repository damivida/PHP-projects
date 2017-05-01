<?php
require_once("includes/init.php");

if (empty($_GET['id'])) {
    
  redirect("index.php");  
}

 $user = User::find_by_id($_GET['id']);

  if($user) {
      
      $user->delete();
      redirect("index.php");
  } else {
      
      redirect("index.php");
  }

?>