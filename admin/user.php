<?php  
include('include/header.php');
include('../admin/include/user_actions.php')
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
                    <!-- posts------------------------------------------------------- -->
                    <div class="col-xs-12">
                    <h3> View All Users</h3>
                       <table class="table table-bordered  table-responsive">
                        <thead class="table-responsive">
                            <tr>
                                <th>User_ID</th>
                                <th>Name</th>
                                <th>Password</th>
                                <th>First_Name</th>
                                <th>Last_Name</th>
                                <th>Image</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Rand</th>
                                <?php if(isset($_SESSION['role']) && $_SESSION['role']=='Admin') {?>
                                <th>Status</th>
                                <th>Actions</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody class="table-responsive">
                                    <?php
                                     view_all_users();
                                     delete_user();
                                     user_role();
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
