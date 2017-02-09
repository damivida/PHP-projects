<!DOCTYPE html>
<?php
session_start();

/*
if ($_GET["logout"]==1 AND $_SESSION['id']) { 
    session_destroy();
}
*/

include("connection.php");


if(isset($_POST['registry'])) {

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
    

    
    
  if (!$username) {
      echo  "unesite username!<br/>";
  }if(!$email) {
     echo  "unesite email!<br/>";
      
  }if(!$password) {
      echo  "unesite password!<br/>";
  }elseif(strlen($password)<5)  echo "Unesite password dulji od 5 zanmenki!<br/>";
   elseif(!preg_match('/[A-Z]/', $password)) echo "Unesite min jedno veliko slovo u password!<br/>";
    
    
    
    else {
      
         $username = mysqli_real_escape_string($connection, $username);
         $email = mysqli_real_escape_string($connection, $email);
         $password = mysqli_real_escape_string($connection, $password);
    
         $hash = "$2y$10$";
         $salt = "kaijekundjzsjnegzjrn65";
         $hash_and_salt = $hash . $salt;
         $password = crypt($password, $hash_and_salt);    
        
          
          $query = "SELECT * FROM korisnik ";
          $query .="WHERE username ='$username'";
          $result = mysqli_query($connection,$query);
          $results = mysqli_fetch_array($result);
      
         
          
          $query = "SELECT * FROM korisnik ";
          $query .="WHERE email ='$email'";
          $result = mysqli_query($connection,$query);
          $results2 = mysqli_fetch_array($result);
          
          if ($results) {
              echo "User je vec registriran!<br/>";
              }
          elseif ($results2) {
              echo "Mail je vec registriran!";
          }else {
             
             $query = "INSERT INTO korisnik ";
             $query .= "(username,email,password) ";
             $query .= "VALUES('$username', '$email', '$password')";
              
              $result = mysqli_query($connection,$query);
              if($result) {
                  echo "Registrirani ste!";
                  
                $_SESSION['id'] = mysqli_insert_id($connection);
                  //print_r($_SESSION);
                  
                header("Location:loginMain.php");  
              }
           }
    }   
}


if (isset($_POST['login'])) {
    
$usernameLog = $_POST['usernameLog'];
$passwordLog = $_POST['passwordLog'];
    
         $usernameLog = mysqli_real_escape_string($connection, $usernameLog);
         $passwordLog = mysqli_real_escape_string($connection, $passwordLog);
    
         $hash = "$2y$10$";
         $salt = "kaijekundjzsjnegzjrn65";
         $hash_and_salt = $hash . $salt;
         $passwordLog = crypt($passwordLog, $hash_and_salt);    
            
   
    $query = "SELECT * FROM korisnik ";
    $query .= "WHERE username = '$usernameLog' AND password = '$passwordLog'";
    
    $result = mysqli_query($connection,$query);
    $row = mysqli_fetch_assoc($result);
    
    
    if($row) {
        $_SESSION['id'] = $row['id'];
        header("Location:loginMain.php");
        print_r($row);
        
    }else {
        echo "niste logirani";
    }
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
   <h3>Registracija & Login</h3>
    <form method="post" name="registry">
        <input type="text" name="username" placeholder="Username" /><br/><br/>
        <input type="email" name="email" placeholder="Email" /><br/><br/>
        <input type="password" name="password" placeholder="Password"/><br/><br/>
        <input type="submit" name="registry" value="Registry" /><br/><br/>
    </form><br/><br/>
    
    <form method="post" name="login">
        <input type="text" name="usernameLog" placeholder="Username" /><br/><br/>
        <input type="password" name="passwordLog" placeholder="Password"/><br/><br/>
        <input type="submit" name="login" value="Login" /><br/><br/>
    </form>
</body>
</html>