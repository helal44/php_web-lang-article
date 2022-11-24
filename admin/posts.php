<?php  
include('include/header.php');
include('../admin/include/posts_actions.php')
?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"> Admin</a>
            </div>
            <!-- Top Menu Items -->
            <?php include('include/topmenu.php') ?>

            <!-- Sidebar Menu Items -  -->
           <?php include('include/sidebar.php') ?>
        </nav>

        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading ---------------------------------------------------->  
                   
                <div class="row">

                <form method="POST">
              
              <?php
                        selection();
                ?>

                <h3> View All Posts</h3>
                <!-- selection option ------------- -->
                <h3> select post status</h3>
                    <div class="form-group  col-xs-4" >
                    
                        <select name="option" class="form-control">
                            <option value="Published" class="">published</option>
                            <option value="Suspended" class="">suspended</option>
                        </select>
                    </div>
                    <div class="col-xs-4 form-group">
                         <input type="submit" value="Apply" name="array" class="btn btn-success">
                    </div>
                    
                    <!-- posts------------------------------------------------------- -->
                    <div class="col-xs-12">
                   
                       <table class="table table-bordered  table-responsive">
                        <thead class="table-responsive">
                            <tr>
                                <th><input type="checkbox" name="checkbox" id="checkbox"></th>
                                <th>ID</th>
                                <th>Author</th>
                                <th>CategoryTitle</th>
                                <th> PostTitle</th>
                                <th>Content</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Tages</th>
                                <th>CommentsCount</th>
                                <th>Date</th>
                                <?php if(isset($_SESSION['role']) && $_SESSION['role']=='Admin') {?>
                                <th>Actions</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody class="table-responsive">
                                    <?php
                                     view();
                                    delete();
                                  
                                    ?>
                        </tbody>
                       </table>
                    </div>
                    </form>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/my.js"></script>


    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
