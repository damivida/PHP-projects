<?php include("includes/header.php"); ?>
        
      
<?php   

   
  
   
?>
        <!-- Navigation -->
    
          <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.php">Početna</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
     
             
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['first_name'] . " " . $_SESSION['last_name'] ?>  <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                      
                      
                       <?php    if ($_SESSION['status']=='admin') {
          
                                echo '<li><a href="./index.php">Admin</a></li>';
    
                           }      
                        ?>  
                        
                        <li>
                            <a href="./logout.php"> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
         
            <!-- /.navbar-collapse -->
        </nav>    
        
        
        

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <?php echo $_SESSION['first_name'];?>
                            <small></small>
                        </h1>
                        
                      
                        
                    <div class="col-md-12">
                    
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Ime</th>
                                <th>Prezime</th>
                                <th>Email</th>
                                <th>Rang</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                        
                           
                            <tr>
                               
                                <td><?php echo $_SESSION['first_name'];?></td>
                                <td><?php echo $_SESSION['last_name'];?></td>
                                <td><?php echo $_SESSION['email'];?></td>
                                <td><?php echo $_SESSION['rang'];?></td>
                                <td><?php echo $_SESSION['status'];?></td>
                            </tr>
                            
                            
                          
                        </tbody>
                    </table><!--end of table-->
                    
                </div>    
                   
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>