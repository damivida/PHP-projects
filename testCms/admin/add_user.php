<?php include("includes/header.php"); ?>

<?php include("includes/navigation.php")?>                    
        
<?php 

    if (isset($_POST['submit'])) {
        
        $passwordLog = $_POST['password'];
        $hash = "$2y$10$";
        $salt = "kaijekundjzsjnegzjrn65";
        $hash_and_salt = $hash . $salt;
        $passwordLog = crypt($passwordLog, $hash_and_salt);
        
       $user = new User();
        
       $user->first_name = $_POST['first_name'];
       $user->last_name = $_POST['last_name'];
       $user->email = $_POST['email'];
       $user->password = $passwordLog;  
       $user->rang = $_POST['rang']; 
       $user->status = $_POST['status']; 
        
       $user->create();    
    }

?>
   

       
       
       
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           
                         Dodaj polaznika
                       
                        </h1>                                    
                        
                        
                        
    <form action = "" method = "post" enctype="multipart/form-data">
   
<!--   <div class="col-md-6 col-md-offset-3">
    <div class="form-group">
     <input type="file" name="file_upload">
    </div>-->
    <div class ="form-group">
       <label for="first_name">Ime</label>
       <input type="text" class="form-control" name="first_name"/>
    </div>
    <div class ="form-group">
       <label for="last_name">Prezime</label>
       <input type="text" class="form-control" name="last_name"/>
    </div>
    <div class ="form-group">
       <label for="email">Email</label>
       <input type="text" class="form-control" name="email"/>
    </div>
    <div class ="form-group">
       <label for="password">Password</label>
       <input type="password" class="form-control" name="password"/>
    </div>
    <div class="form-group"> 
        <select  name="rang">
            <option value="pojas">Odaberi Pojas</option>
            <option value=">white_belt">white_belt</option>
            <option value="blue_belt">blue_belt</option>
            <option value="purple_belt">purple_belt</option>
            <option value="brown_belt">brown_belt</option>
            <option value="black_belt">black_belt</option>
        </select>
    </div>
    <div class="form-group"> 
        <select  name="status">
            <option value="odaberi">Odaberi Status</option>
            <option value="admin">admin</option>
            <option value="user">user</option>
        </select>
    </div>
    <div class ="form-group">
       <input type="submit" class="btn btn-primary pull-right" name="submit" value = "Dodaj"/>
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