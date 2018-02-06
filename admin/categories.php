<?php include "includes/admin_header.php";?>
<?php include "../functions.php";?>
    <div id="wrapper">
        <!-- Navigation -->
        <?php include "includes/admin_navigation.php";?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small>Author</small>
                        </h1>
                        <div class="col-xs-6">
                            <form action="" method="post">
                                    <div class="form-group">
                                       <label for='cat_title'>Add categories
                                        <input class='form-control' type='text' name='cat_title' required>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <input class='btn btn-primary' type='submit' name='submit' value='Add categories'>
                                    </div>
                            </form>
                            <?php
                                if(isset($_GET['delete']))
                                {
                                    delete_categories();
                                }
                                if(isset($_GET['edit']))
                                {
                                    edit_categories();
                                }
                                if(isset($_POST['submit']) and $_POST['submit'] == 'Update categories')
                                {
                                    update_categories();
                                }
                                if(isset($_POST['submit']) and $_POST['submit'] == 'Add categories')
                                {
                                    Add_categories();
                                }
                            ?>
                        </div>
                        <div class="col-xs-6">
                            <table class='table table-bordered table-hover'>
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                select_categories();
                                ?>
                                </tbody>           
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    <?php include "includes/admin_footer.php";?>