<?php include("includes/header.php"); ?>
        
<?php

if(!$session->is_signed_in()) {
    
    redirect("login.php");
}



    ?>      

        <!-- Navigation -->
<?php include("includes/navigation.php")?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Pozdrav
                            <small><?php echo $_SESSION['first_name']?></small>
                        </h1>
                        
                
                    <div class="col-md-12">
                    
                   <p>Pregled svih polaznika i postova se nalazi u nav baru, ovo je prostor za dijagrame</p>
                    
                    </div>    
                   
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>