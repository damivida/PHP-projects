<?php include("includes/header.php"); ?>
<?php include("includes/navigation.php");?>  
<?php if(!$session->is_signed_in()) {
    
    redirect("login.php");
}
  
?>

<?php

if (empty($_GET['id'])) {
    
    redirect("index.php");
} 
    
    
$user= User::find_by_id($_GET['id']);

if (isset($_POST['update'])) {
    
   //PASSWORD CRYPT
   $password_changed = $database->password_crypt($_POST['password']);
   
   $user->password = $password_changed;    
   
    $user->save();
    
     redirect("index.php");
        
     } 




?>                     
        


       
       
       
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           
                        Promijeni lozinku
                       
                        </h1>                                    
                        
          
    <form action = "" method = "post" enctype="multipart/form-data">
   
<!--   <div class="col-md-6 col-md-offset-3">
    <div class="form-group">
     <input type="file" name="file_upload">
    </div>-->
    <div class ="form-group">
       <label for="password">Lozinka</label>
       <input type="password" class="form-control" name="password" />
    </div>
        <div class ="form-group">
       <input type="submit" class="btn btn-primary pull-left" name="update" value = "Pošalji"/>
    </div>

  
    
  </form>
                    </div>
                    
                   
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        
        

  <?php include("includes/footer.php"); ?>