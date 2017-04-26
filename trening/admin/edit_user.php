<?php include("includes/header.php"); ?>

 <?php

if(!$session->is_signed_in()) {
    
    redirect("login.php");
}
    ?>
       
<?php



if (empty($_GET['id'])) {
    
    redirect("users.php");
} 
    
    
$user= User::find_by_id($_GET['id']);

if (isset($_POST['update'])) {
    
   

   $user->username = $_POST['username'];     
   $user->password = $_POST['password'];;    
   $user->first_name = $_POST['first_name'];;    
   $user->last_name = $_POST['last_name'];
    
    if(empty($_FILES['file_upload'])) {
        $user->save();
        
     } else {
    
      $user->set_file($_FILES['file_upload']);     
      $user->upload_photo();
      $user->save();
        
        redirect("edit_user.php?id={$user->id}");
    }

}

if (isset($_POST['delete'])) {
    


 if ($user) {
     
     $user->delete_user();
     redirect("users.php");
 } else {
     
     redirect("users.php");
 }

}

?>                     
        

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            
            
            <?php include("includes/top_nav.php")?>
            
            
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            
            

           <?php include("includes/side_nav.php")?>
           
           
           
            <!-- /.navbar-collapse -->
        </nav>

       
       
       
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           
                         USERS
                       
                        </h1>                                    
                        
     <div class="col-md-6">
         
         <img class="img-responsive" src="<?php echo $user->image_path_or_placeholder()?>" alt="">
         
     </div>                   
                        
    <form action = "" method = "post" enctype="multipart/form-data">
   
   <div class="col-md-6">
    <div class="form-group">
     <input type="file" name="file_upload">
    </div>
    <div class ="form-group">
       <label for="tile">Username</label>
       <input type="text" class="form-control" name="username" value="<?php echo $user->username; ?>"/>
    </div>
    <div class ="form-group">
       <label for="tile">User Password</label>
       <input type="password" class="form-control" name="password" value="<?php echo $user->password; ?>"/>
    </div>
    <div class ="form-group">
       <label for="tile">User Firstname</label>
       <input type="text" class="form-control" name="first_name" value="<?php echo $user->first_name; ?>"/>
    </div>
    <div class ="form-group">
       <label for="tile">User Lastname</label>
       <input type="text" class="form-control" name="last_name" value="<?php echo $user->last_name; ?>"/>
    </div>
    <div class ="form-group">
       <a href="delete_user.php?id=<?php echo $user->id; ?>" class="btn btn-danger">Delete</a>
       <input type="submit" class="btn btn-primary pull-right" name="update" value = "Update"/>
    </div>
       
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