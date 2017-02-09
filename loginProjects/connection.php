<?php

$connection = mysqli_connect('localhost','root','','loginapp');
  if(!$connection) {
      die ("Connection failed ". mysqli_error($connection)); 
  }

?>