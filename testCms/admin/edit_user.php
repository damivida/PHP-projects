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
    
   

   $user->first_name= $_POST['first_name'];     
   $user->last_name = $_POST['last_name'];    
   $user->email = $_POST['email'];
   $user->rang = $_POST['rang'];
   $user->status = $_POST['status'];
    
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
                           
                         Polaznik
                       
                        </h1>                                    
                        
          
    <form action = "" method = "post" enctype="multipart/form-data">
   
<!--   <div class="col-md-6 col-md-offset-3">
    <div class="form-group">
     <input type="file" name="file_upload">
    </div>-->
    <div class ="form-group">
       <label for="first_name">Ime</label>
       <input type="text" class="form-control" name="first_name" value="<?php echo $user->first_name;?>">
    </div>
    <div class ="form-group">
       <label for="last_name">Prezime</label>
       <input type="text" class="form-control" name="last_name" value="<?php echo $user->last_name;?>"/>
    </div>
    <div class ="form-group">
       <label for="email">Email</label>
       <input type="text" class="form-control" name="email" value="<?php echo $user->email;?>"/>
    </div>
  
    <div class="form-group"> 
        <select  name="rang">
            <option value="<?php echo $user->rang;?>">Odaberi Pojas</option>
            <option value=">white_belt">white_belt</option>
            <option value="blue_belt">blue_belt</option>
            <option value="purple_belt">purple_belt</option>
            <option value="brown_belt">brown_belt</option>
            <option value="black_belt">black_belt</option>
        </select>
    </div>
    <div class="form-group"> 
        <select  name="status">
            <option value="<?php echo $user->status; ?>">Odaberi Status</option>
            <option value="admin">admin</option>
            <option value="user">user</option>
        </select>
    </div>
    <div class ="form-group">
      <a href="change_password.php?id=<?php echo $_GET['id'] ?>" class="btn btn-info pull-right" role="button">Promijeni lozinku</a>
    </div>
    
    <div class ="form-group">
       <input type="submit" class="btn btn-primary pull-left" name="update" value = "Promijni podatke"/>
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