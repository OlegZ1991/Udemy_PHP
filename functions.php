<?php
function select_images()
{
    global $connect;
    $query_pic = "SELECT*FROM posts";
    $result_posts = mysqli_query($connect, $query_pic);
    while($row = mysqli_fetch_assoc($result_posts)) {
        echo "<img class='img-responsive' src='images/{$row['post_image']}' alt=''>";
    }
}
function select_categories()
{
    global $connect;
    $query = "SELECT*FROM category";
    $result = mysqli_query($connect, $query);
    while($row = mysqli_fetch_assoc($result))
    {
        echo "<tr>";
        echo "<td>{$row['cat_id']}</td>";
        echo "<td>{$row['cat_title']}</td>";
        echo "<td><a href='categories.php?delete={$row['cat_id']}'>Delete</a></td>";
        echo "<td><a href='categories.php?edit={$row['cat_title']}&id={$row['cat_id']}'>Edit</a></td>";
        echo "</tr>";
    }
}
function edit_categories()
{
    global $connect;
    $edit = $_GET['edit'];
    echo "<form action='' method='post'>
    <div class='form-group'>
       <label for='cat_title'>Edit category
        <input class='form-control' type='text' name='cat_title' value=$edit>
        </label>
    </div>
    <div class='form-group'>
        <input class='btn btn-primary' type='submit' name='submit' value='Update categories'>
    </div>
    </form>";
}
function update_categories()
{
    global $connect;
    $cat_title = $_POST['cat_title'];
    if($cat_title == '' or empty($cat_title))
    {
        echo "This field should not be empty";
    } else {
        $query  = "UPDATE category SET cat_title ='{$cat_title}' ";
        $query .= "WHERE cat_id = {$_GET['id']}";
        if(!$cat_query = mysqli_query($connect, $query))
        {
            die(MYSQLI_ERROR.mysqli_error($connect));
        }
    }
}
function delete_categories()
{
    global $connect;
    $delete = $_GET['delete'];
    $delete_category = "DELETE FROM category WHERE cat_id='{$delete}'";
    $cat_del_query = mysqli_query($connect, $delete_category);
    header('Location: categories.php');
}
function add_categories()
{
    global $connect;
    $cat_title = $_POST['cat_title'];
    if($cat_title == '' or empty($cat_title))
    {
        echo "This field should not be empty";
    } else {
        $query  = "INSERT INTO category(cat_title) ";
        $query .= "VALUES('{$cat_title}')";
        if(!$cat_query = mysqli_query($connect, $query))
        {
            die(MYSQLI_ERROR.mysqli_error($connect));
        }
    }
}
function add_post()
{
    global $connect;
    $post_category_id = $_POST['post_category_id'];
    $post_title = $_POST['post_title'];
    $post_author = $_POST['post_author'];
    $post_content = $_POST['post_content'];
    
        //Attention! New knoledges 31.01.2018:
    $post_image = $_FILES['post_image']['name'];
    $post_image_temp = $_FILES['post_image']['tmp_name']; //Mistacke detected: 'name_tmp'->'tmp_name'.
        //Attention! end New knoledges 31.01.2018:
    
    $post_status = $_POST['post_status'];
    $post_tags = $_POST['post_tags'];
    $post_date = date('d-m-y');
    $post_comment_count = 2;
    
    //Attention! New knoledges 31.01.2018:
    move_uploaded_file($post_image_temp, "../images/$post_image");
    //Attention! end New knoledges 31.01.2018:
    
    $query    = "INSERT INTO posts(post_category_id, post_title, post_author, post_content, post_date, post_image, post_comment_count, post_tags, post_status) ";
    $query   .=  "VALUES({$post_category_id},'{$post_title}','{$post_author}','{$post_content}',now(), '{$post_image}',{$post_comment_count},'{$post_tags}','{$post_status}')";////Mistacke detected: {$post_image}->'{$post_image}'.
    
    if(!$insert_posts = mysqli_query($connect, $query))
    {
        echo "query failed. info:". mysqli_get_host_info($connect);
    }
}
?>