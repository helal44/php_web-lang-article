<?php 
include('../include/db.php');
include('../include/header.php');
?>
<body>

    <!-- Navigation -->
    <?php include('../include/navbar.php') ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <?php
                 include('../view_action/index_action.php');
                include('../view_action/sidebar.php');
                 view_cat();
                 ?>

                 <!-- Pager -->
               
                   <!-- comment --------------- -->
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                            <form action="search.php" method="POST" class="input-group">
                            <input type="text" class="form-control" name="search" required>
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="submit" name="submit">
                                <span class="glyphicon glyphicon-search"></span>
                                </button>
                                </span>
                            </form>
                    </div>
                 
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-12">
                           <?php
                           view_all_cat();
                           ?>
                        </div>
                       
                    </div>
                    <!-- /.row -->
                </div>
                <?php  include("../include/loginform.php");
                login();
                ?>
                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
       <?php include('../include/footer.php'); ?>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="../bootstrap/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bootstrap/bootstrap.min.js"></script>

</body>

</html>
