<?php require_once("includes/header.php")?>


<?php

if (isset($_POST['submit'])) {
    
    $first_name = trim($_POST['first_name']);
    $password = trim($_POST['password']);
    
    
    $hash = "$2y$10$";
    $salt = "kaijekundjzsjnegzjrn65";
    $hash_and_salt = $hash . $salt;
    $password = crypt($password, $hash_and_salt);
    
   
    
    
    //metod to check user
    
    $user = User::verify_user($first_name,$password);
    
    
    if ($user && $user->status=='admin') {
    $session->login($user);
    redirect('index.php');
    } elseif($user && $user->status=='user') {
        $session->login($user);
        redirect('../index.php');
    } else {
        
        $the_message= " Username ili password nisu tocni";
        
    }
    
    
} else {
    
    $first_name = "";
    $password = "";
    $the_message= "";
}




?>




<div class="col-md-4 col-md-offset-3">

<h4 class="bg-danger"><?php echo $the_message ?></h4>
	
<form id="login-id" action="" method="post">
	
<div class="form-group">
	<label for="username">Ime</label>
	<input type="text" class="form-control" name="first_name" value="<?php echo htmlentities($first_name)?>" >

</div>

<div class="form-group">
	<label for="password">Lozinka</label>
	<input type="password" class="form-control" name="password" value="<?php //echo htmlentities($password)?>">
	
</div>


<div class="form-group">
<input type="submit" name="submit" value="Submit" class="btn btn-primary">

</div>


</form>


</div>
