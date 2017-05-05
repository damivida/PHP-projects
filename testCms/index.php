<?php include("includes/header.php"); ?>

<?php 

$posts = Posts::find_all_posts();


?>
        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

  
              
               <h1 class="page-header">
                    Oglasna ploča
                    
                </h1>
                <br/>
<?php foreach($posts as $post) : ?>
                <!-- First Blog Post -->
                <h2>
                    <p><?php echo $post->post_title;?></p>
                </h2>
                
                <p class="lead">
                    posted by <?php echo $post->post_author;?>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post->post_date ?></p>
                <hr>
                
                <p><?php echo $post->post_content;?></p>
            
                <br/>
                
  <?php endforeach; ?>
                     
  
            </div>




            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

            
                 <?php include("includes/sidebar.php"); ?>



        </div>
        <!-- /.row -->
        
           

        <?php include("includes/footer.php"); ?>
