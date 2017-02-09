<?php
include("connection.php");


//read ()
function read2(){
    global $connection;
  if (isset($_POST['ucitaj'])) {
    
    $query = "SELECT * FROM korisnik ";
    $query .= "WHERE id ='$_SESSION[id]'";
    
    $result = mysqli_query($connection,$query);
    $row = mysqli_fetch_assoc($result);
     
    $report = $row['report'];
    echo $report;
   }
}

//update
function update2(){
    global $connection;
  if (isset($_POST['posalji'])) {

    $text = $_POST['text'];
    
     echo $text;
    
     $query = "UPDATE korisnik SET ";
     $query .= " report = '$text' WHERE id = '$_SESSION[id]'";
    
     $result = mysqli_query($connection,$query);
    
      //if ($result) echo "upisano";
  }
}


//delete
function delete2(){
      global $connection;
    if (isset($_POST['obrisi'])) {
    
      $query = "DELETE FROM korisnik ";
      $query .= "WHERE id ='$_SESSION[id]'";
      $result = mysqli_query($connection,$query);
   }
}
?>