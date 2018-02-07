<?php
include "../functions.php";
if(isset($_POST['add_post']))
{
    add_post();
}
?>    
<form action="" method="post" enctype='multipart/form-data'> <!--Mistacke detected: 'name_tmp'->'tmp_name'.-->
   <div class="form-group">
        <label for="post_category">post_category
            <select class='select' name="post_category" id="">
                <?php
                $select_cat = "SELECT * FROM category";
                $result_cat = mysqli_query($connect, $select_cat);
                    while($row_cat = mysqli_fetch_assoc($result_cat))
                    {
                        echo "<option value={$row_cat['cat_id']}>{$row_cat['cat_title']}</option>";
                    }
                ?>
            </select>
        </label>
    </div>
    <div class="form-group">
        <label for="post_title">post_title
            <input type="text" name='post_title'class='form-control'>
        </label>
    </div>
    <div class="form-group">
        <label for="post_author">post_author
            <input type="text" name='post_author'class='form-control'>
        </label>
    </div>
    <div class="form-group">
        <label for="post_content">post_content
            <textarea type="textarea" name='post_content'class='form-control' cols=30 rows=5></textarea>
        </label>
    </div>
    <div class="form-group">
        <label for="post_image">post_image
            <input type="file" name='post_image' class='btn btn-primary'>
        </label>
    </div>
    <div class="form-group">
        <label for="post_status">post_status
            <input type="text" name='post_status'class='form-control'>
        </label>
    </div>
       <div class="form-group">
        <label for="post_tags">post_tags
            <input type="text" name='post_tags'class='form-control'>
        </label>
    </div>
    <div class="form-group">
        <label for="submit_data">submit_data
            <input type="submit" name='add_post' class='btn btn-primary' value='create post'>
        </label>
    </div>
</form>
