<?php include("includes/header.php"); ?>
        
      

        <!-- Navigation -->
<?php include("includes/navigation.php")?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Lista Polaznika
                            <small></small>
                        </h1>
                        
                        <?php
                        /*
                        $sql = "SELECT * FROM users";

                        $result = $database->query($sql);
                        $row = mysqli_fetch_assoc($result)*/
                       // print_r($row);
                     
                        /* $conn = $database->connection;
    
                        if ($conn==true) {
                            
                            echo "spojeno";
                           } else {
                            
                            echo "nije spojeno";
                        }*/
                            
                          $users = User::find_all();
                          
                        // print_r($users);

                        ?>
                    <div class="col-md-12">
                    
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Ime</th>
                                <th>Prezime</th>
                                <th>Email</th>
                                <th>Rang</th>
                                <th>Status</th>
                                <th>Promijeni</th>
                                <th>Obriši</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                         <?php foreach($users as $user) : ?>
                           
                            <tr>
                               
                                <td><?php echo $user->first_name;?></td>
                                <td><?php echo $user->last_name;?></td>
                                <td><?php echo $user->email;?></td>
                                <td><?php echo $user->rang;?></td>
                                <td><?php echo $user->status;?></td>
                                <td><a href='edit_user.php?id=<?php echo $user->id; ?>'>Promijeni</a></td>
                                <td><a href='delete_user.php?id=<?php echo $user->id; ?>'>Obriši</a></td>
                            </tr>
                            
                            
                           <?php endforeach; ?>
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