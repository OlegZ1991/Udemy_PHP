<?php include "functions.php"?>
<?php include "includes/db.php"?>
<?php include "includes/Header.php"?>
    <!-- Navigation -->
    <?php include "includes/Navigation.php"?>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>
                <!-- The Blog Post -->
                <?php
                    if(isset($_GET['p_id']) and $_GET['p_id'] != ''):
                    $select_post = "SELECT*FROM posts WHERE post_id = {$_GET['p_id']}";
                    $result_post = mysqli_query($connect, $select_post);
                    while($row = mysqli_fetch_assoc($result_post)):
                        $post_category_id = $row['post_category_id'];
                        $post_title       = $row['post_title'];
                        $post_author      = $row['post_author'];
                        $post_content     = $row['post_content'];
                        $post_image       = $row['post_image'];
                        $post_status      = $row['post_status'];
                        $post_tags        = $row['post_tags'];
                        $post_date        = $row['post_date'];
                ?>
                <h2>
                    <a href="#"><?php echo $post_title;?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author;?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date;?></p>
                <hr>
                <img class='img-responsive' src='images/<?php echo $post_image;?>' alt=''>
                <hr>
                <p><?php echo $post_content;?></p>
                <a class="btn btn-primary" href="#">Read More<span class="glyphicon glyphicon-chevron-right"></span></a>
                <hr>
                <?php endwhile;?>
                <?php endif;?>
            </div>
            
            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/Sidebar.php"?>
                    </div>
                    <!-- /.row -->
                    <?php include "includes/Footer.php"?>
                </div>

