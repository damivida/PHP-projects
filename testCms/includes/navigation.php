    
       <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Bjj Jug2</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
            
                   
           
                                   
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['first_name'] . " " . $_SESSION['last_name'];?>  <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="admin/profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        
                        <?php    if ($_SESSION['status']=='admin') {
          
                                echo '<li><a href="admin/index.php">Admin</a></li>';
    
                                     }      
                        ?>  
                        
                     
                        <li class="divider"></li>
                        
                        <li>
                            <a href="admin/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                        
                        
                    </ul>
                </li>
                </ul>
           
            </div>
            
            
         
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>