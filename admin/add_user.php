<?php  
include('include/header.php');
include('../admin/include/user_actions.php');
if( $_SESSION['role'] !='Admin') {
    header("location:index.php");
}
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
                <h3> Add_User</h3>
                <!-- Page Heading ---------------------------------------------------->
                <div class="row">
                    <?php
                     insert_user();
                    
                    ?>
                    <div class="col-xs-12">
                       
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                 <label for="">User Name</label>
                                 <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                 <label for="">Password</label>
                                 <input type="password" class="form-control" name="password" required>
                            </div>

                            <div class="form-group">
                                 <label for="">First Name</label>
                                 <input type="text" class="form-control" name="firstname" required>
                            </div>
                              
                            <div class="form-group">
                                 <label for="">Last Name</label>
                                 <input type="text" class="form-control" name="lastname" required>
                            </div>
                            <div class="form-group">
                                 <label for="">Image</label>
                                 <input type="file" class="form-control" name="image" required>
                            </div>
                            <div class="form-group">
                                 <label for="">Email</label>
                                 <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="form-group">
                                 
                                 <input type="submit" class=" btn btn-primary" name="insert_user" value="Insert_USer">
                            </div>
                        </form>
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
