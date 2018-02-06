<?php
if(isset($_GET['source']) and $_GET['source'] == 'edit_post')
{
 $sql = "SELECT*FROM posts WHERE post_id = {$_GET['get_post_id']}";
    $result = mysqli_query($connect, $sql);
    while($row = mysqli_fetch_assoc($result))
    {
        $post_category_id = $row['post_category_id'];
        $post_title       = $row['post_title'];
        $post_author      = $row['post_author'];
        $post_content     = $row['post_content'];
        $post_image       = $row['post_image'];
        $post_status      = $row['post_status'];
        $post_tags        = $row['post_tags'];
    }
    
}
if(isset($_POST['update_post']))
{
    $post_category_id = $_POST['post_category_id'];
    $post_title = $_POST['post_title'];
    $post_author = $_POST['post_author'];
    $post_image = $_FILES['post_image']['name'];
    $post_image_tmp = $_FILES['post_image']['tmp_name'];
    $post_status = $_POST['post_status'];
    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    move_uploaded_file($post_image_tmp, "../images/$post_image");
    if(empty($post_image))
    {
        $sql = "SELECT post_image FROM posts WHERE post_id = {$_GET['get_post_id']}";
        $get_image = mysqli_query($connect, $sql);
        while($row = mysqli_fetch_assoc($get_image))
        {
            $post_image = $row['post_image'];
        }
    }
    $sql = "UPDATE posts SET ";
    $sql .= "post_category_id = {$post_category_id}, ";
    $sql .= "post_title = '{$post_title}', ";
    $sql .= "post_author = '{$post_author}', ";
    $sql .= "post_content = '{$post_content}', ";
    $sql .= "post_date = now(), ";
    $sql .= "post_image = '{$post_image}', ";
    $sql .= "post_status = '{$post_status}', ";
    $sql .= "post_tags = '{$post_tags}' ";
    $sql .= "WHERE post_id = {$_GET['get_post_id']}";
    $update_post = mysqli_query($connect, $sql);
    if(!$update_post)
    {
        die(mysqli_error($connect));
    }
    header('location: posts.php');
    exit();
}
?>

<form action="" method="post" enctype='multipart/form-data'> <!--Mistacke detected: 'name_tmp'->'tmp_name'.-->
   <div class="form-group">
        <label for="post_category_id">post_category_id
            <select class='select' name="post_category_id" id="">
                <?php
                $select = "SELECT * FROM category";
                $result = mysqli_query($connect, $select);
                    while($row = mysqli_fetch_assoc($result))
                    {
                        echo "<option value={$row['cat_id']}>{$row['cat_title']}</option>";
                    }
                ?>
            </select>
        </label>
    </div>
    <div class="form-group">
        <label for="post_title">post_title
            <input type="text" name='post_title'class='form-control' value="<?php echo $post_title;?>">
        </label>
    </div>
    <div class="form-group">
        <label for="post_author">post_author
            <input type="text" name='post_author'class='form-control' value="<?php echo $post_author;?>">
        </label>
    </div>
    <div class="form-group">
        <label for="post_content">post_content
            <textarea type="textarea" name='post_content'class='form-control' cols=30 rows=5><?php echo $post_content;?></textarea>
        </label>
    </div>
        <div class="form-groop">
        <img width="100" src="../images/<?php echo $post_image;?>" alt="" class="img-responsive">
    </div>
    <div class="form-group">
        <label for="post_image">post_image
            <input type="file" name='post_image' class='btn btn-primary'>
        </label>
    </div>
    <div class="form-group">
        <label for="post_status">post_status
            <input type="text" name='post_status'class='form-control' value="<?php echo $post_status;?>">
        </label>
    </div>
       <div class="form-group">
        <label for="post_tags">post_tags
            <input type="text" name='post_tags'class='form-control' value="<?php echo $post_tags;?>">
        </label>
    </div>
    <div class="form-group">
        <label for="submit_data">submit_data
            <input type="submit" name='update_post' class='btn btn-primary' value='update post'>
        </label>
    </div>
</form>
