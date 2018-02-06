<?php
include "../functions.php";
if(isset($_POST['add_post']))
{
    add_post();
}
?>    
<form action="" method="post" enctype='multipart/form-data'> <!--Mistacke detected: 'name_tmp'->'tmp_name'.-->
   <div class="form-group">
        <label for="post_category_id">post_category_id
            <input type="text" name='post_category_id'class='form-control'>
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
