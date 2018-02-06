<table class='table table-bordered'>
    <thead>
        <tr>
          <th>id</th>
          <th>Author</th>
          <th>Title</th>
          <th>Category</th>
          <th>Status</th>
          <th>Image</th>
          <th>Tags</th>
          <th>Comments</th>
          <th>Date</th>
        </tr>
    </thead>
    <tbody>
          
           <?php
        $query = "SELECT*FROM posts";
        $result = mysqli_query($connect, $query);
        while($row = mysqli_fetch_assoc($result))
        {
            echo "<tr>";
            echo "<td>{$row['post_author']}</td>";
            echo "<td>{$row['post_title']}</td>";
            echo "<td>{$row['post_category_id']}</td>";
            echo "<td>{$row['post_status']}</td>";
            echo "<td><img class='img-responsive' src='../images/{$row['post_image']}'></td>";
            echo "<td>{$row['post_tags']}</td>";
            echo "<td>{$row['post_comment_count']}</td>";
            echo "<td>{$row['post_date']}</td>";
            echo "<td><a href='?source=edit_post&get_post_id={$row['post_id']}'>Edit</a></td>";
            echo "<td><a href='?source=delete_post'>Delete</a></td>";
            echo "</tr>";
        }
                ?>
    </tbody>
</table>