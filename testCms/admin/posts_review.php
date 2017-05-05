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
                            Pregled postova
                            <small></small>
                        </h1>
                        
                        <?php
                        
                           
                          $posts = Posts::find_all();
                          
                      
                        ?>
                    <div class="col-md-12">
                    
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Autor</th>
                                <th>Naslov</th>
                                <th>Datum</th>
                                <th>Sadržaj</th>
                                <th>Status</th>
                                <th>Promijeni</th>
                                <th>Obriši</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                         <?php foreach($posts as $post) : ?>
                           
                            <tr>
                               
                                <td><?php echo $post->post_author;?></td>
                                <td><?php echo $post->post_title;?></td>
                                <td><?php echo $post->post_date;?></td>
                                <td><?php echo $post->post_content;?></td>
                                <td><?php echo $post->post_status;?></td>
                                
                                <!--<td><a href='edit_user.php?id=<?php //echo $user->id; ?>'>Promijeni</a></td>
                                <td><a href='delete_user.php?id=<?php //echo $user->id; ?>'>Obriši</a></td>-->
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