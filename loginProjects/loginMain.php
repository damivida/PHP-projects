<!DOCTYPE html>
<?php
session_start();
include("connection.php");
include("functions2.php");

delete2();

?>





<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    
<style type="text/css">
    
    textarea {
        width: 30%;
        height: 100px;
    }
    
</style>    
</head>
<body>
  <h3>Unos</h3>
   <form method="post">
       <textarea name="text"><?php read2(); update2();?></textarea>
       <br/><br/>
       <input type="submit" name="ucitaj" value="Učitaj"/>
       <input type="submit" name="posalji" value="Pošalji"/>
       <button><a href="loginForm.php?logout=1">Logout</a></button><br/><br/>
       <input type="submit" name="obrisi" value="Obriši korisnika"/>
   </form> 
</body>
</html>