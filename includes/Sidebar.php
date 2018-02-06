            <div class="col-md-4">
                <!-- Blog Search Well -->
                <form class='form-group' action="search_result.php" method="post">
                <div class="well">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <input type="text" name='tag_name' class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit" name='submit_tag_name'>
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>
                </form>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                            <?php
                                $query = "SELECT cat_title FROM category LIMIT 3";
                                $result = mysqli_query($connect, $query);
                                while($row = mysqli_fetch_assoc($result)):
                                ?>
                                <li><a href="#"><?php echo $row['cat_title'];?></a>
                                </li>
                                <?php endwhile;?>
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- Side Widget Well -->
                <?php include "Widget.php";?>
            </div>