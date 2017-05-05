<?php include("includes/header.php"); ?>
<?php include("includes/navigation.php")?>                    
<?php

if(!$session->is_signed_in()) {
    
    redirect("login.php");
}
    ?>         
<?php 

    if (isset($_POST['submit'])) {
        

        
           
        //POST CREATE   
       $post = new Posts();
        
       $post->post_author  = $_POST['post_author'];
       $post->post_title   = $_POST['post_title'];
       $post->post_date    = $_POST['post_date'];
       $post->post_content = $_POST['post_content'];
       $post->post_status  = $_POST['post_status'];
        
       $post->create();    
    }

?>
   

       
       
       
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           
                         Dodaj post
                       
                        </h1>                                    
                        
                        
                        
    <form action = "" method = "post" enctype="multipart/form-data">
   
<!--   <div class="col-md-6 col-md-offset-3">
    <div class="form-group">
     <input type="file" name="file_upload">
    </div>-->
    <div class ="form-group">
       <label for="first_name">Autor</label>
       <input type="text" class="form-control" name="post_author" value = "<?php echo $_SESSION['first_name']?>"/>
    </div>
    
    <div class ="form-group">
       <label for="title">Naslov</label>
       <input type="text" class="form-control" name="post_title"/>
    </div>
    
    
    
   
    <div class="row">
        <div class='col-sm-6'>
            <label for="post_date">Datum</label>
            <input type='date' class="form-control" id='datetimepicker4' name="post_date"/>
        </div>
     </div>
     
    
    
    
    
    
    
    
    <div class="form-group">
       <label for="post_content">Sadržaj</label>
        <textarea class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>
    </div>
    <div class="form-group"> 
        <select  name="post_status">
            <option value="published">Status</option>
            <option value="published">Objavljeno</option>
            <option value="not_published">Nije objavljeno</option>
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