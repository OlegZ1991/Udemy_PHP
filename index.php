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
                    $select_all_posts = "SELECT*FROM posts";
                    $result_posts = mysqli_query($connect, $select_all_posts);
                    while($row = mysqli_fetch_assoc($result_posts)):
                        $post_id          = $row['post_id'];
                        $post_category_id = $row['post_category_id'];
                        $post_title       = $row['post_title'];
                        $post_author      = $row['post_author'];
                        $post_content     = substr($row['post_content'], 0, 5);//this function returns the substring of the 1-st argument. 2-st argument is the start of the substring. 3-rd argument is the length of the substring
                        $post_image       = $row['post_image'];
                        $post_status      = $row['post_status'];
                        $post_tags        = $row['post_tags'];
                        $post_date        = $row['post_date'];
                ?>
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id;?>"><?php echo $post_title;?></a>
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
            </div>
            
            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/Sidebar.php"?>
                    </div>
                    <!-- /.row -->
                    <?php include "includes/Footer.php"?>
                </div>

    