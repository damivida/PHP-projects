<?php include("includes/header.php"); ?>

 <?php

if(!$session->is_signed_in()) {
    
    redirect("login.php");
}
    ?>
       
<?php

if (isset($_POST['submit'])) {
    
   $user = new User();

   $user->username = $_POST['username'];     
   $user->password = $_POST['password'];;    
   $user->first_name = $_POST['first_name'];;    
   $user->last_name = $_POST['last_name'];
    
   $user->set_file($_FILES['file_upload']);     

   $user->upload_photo();
    
   $user->save();
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
                        
                        
                        
    <form action = "" method = "post" enctype="multipart/form-data">
   
   <div class="col-md-6 col-md-offset-3">
    <div class="form-group">
     <input type="file" name="file_upload">
    </div>
    <div class ="form-group">
       <label for="tile">Username</label>
       <input type="text" class="form-control" name="username"/>
    </div>
    <div class ="form-group">
       <label for="tile">User Password</label>
       <input type="password" class="form-control" name="password"/>
    </div>
    <div class ="form-group">
       <label for="tile">User Firstname</label>
       <input type="text" class="form-control" name="first_name"/>
    </div>
    <div class ="form-group">
       <label for="tile">User Lastname</label>
       <input type="text" class="form-control" name="last_name"/>
    </div>
    <div class ="form-group">
       <input type="submit" class="btn btn-primary pull-right" name="submit" value = "Add User"/>
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