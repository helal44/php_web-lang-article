<?php  include('include/header.php');
  include('include/category_actions.php');
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
                <!-- Page Heading -->
                <div class="row">
                <?php if(isset($_SESSION['role']) && $_SESSION['role']=='Admin') {?>
                    <div class="col-lg-6">
                        <!-- add category -->
                       <form action="category.php" method="POST">
                       <h1 class="page-header">Add Category </h1>
                        <div class="form-group">
                            <input type="text" placeholder="Enter Category" name="category" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="insert" value="Add Category" class="btn btn-primary">
                        </div>
                       </form>
                        <!-- update category ------------------------------------------>
                    <form action="" method="POST">
                       <?php  update(); ?>
                    </form>
                       <!-- insert   and delete    --------------------------- -->
                        
                    </div>
                    <div class="col-lg-12">
                    <?php } ?>
                    <div class="col-lg-12">
                       
                        <table class="table table-bordered table-hover">
                        <thead class="disabled">
                            <tr>
                                <th>ID</th>
                                <th> Category Title</th>
                                <?php if(isset($_SESSION['role']) && $_SESSION['role']=='Admin') {?>
                                <th> Actions</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                          <?php
                           view();//.................................>
                           insert();//.............................>
                           delete();//.........................>
                           ?> 
                        </tbody>
                       </table>
                      
                    </div>
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

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
