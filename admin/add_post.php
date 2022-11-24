<?php  
include('include/header.php');
include('../admin/include/posts_actions.php');
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
                <h3> Add_Post</h3>
                <!-- Page Heading ---------------------------------------------------->
                <div class="row">
                    <div class="col-xs-12">
                        <?php insert(); ?>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                 <label for="">post Author</label>
                                 <input type="text" class="form-control" name="author" required>
                            </div>
                            <div class="form-group">
                                 <label for="">post Title</label>
                                 <input type="text" class="form-control" name="title" required>
                            </div>

                            <div class="form-group">
                            <select name="cate_title" class="form-control" >
                                 <?php select(); ?>
                                    
                                 </select>
                            </div>

                            <div class="form-group">
                                 <label for="">post Content</label>
                                 <textarea name="content" cols="20" rows="5" class="form-control" id="content" required></textarea>
                            </div>
                              
                           <div class="form-group">
                                <label for="">post staus</label>
                                <select name="post_status" class="form-control">
                                    <option value="Published" >Published</option>
                                    <option value="Suspended" >Suspended</option>
                                </select>
                               
                           </div>
                            <!-- <div class="form-group">
                                 <label for="">post Status</label>
                                 <input type="text" class="form-control" name="status" required>
                            </div> -->
                            <div class="form-group">
                                 <label for="">post Image</label>
                                 <input type="file" class="form-control" name="image" required>
                            </div>
                            <div class="form-group">
                                 <label for="">post Tages</label>
                                 <input type="text" class="form-control" name="tages" required>
                            </div>
                            <div class="form-group">
                                 <label for="">post Date</label>
                                 <input type="date" class="form-control" name="date" required>
                            </div>
                            <div class="form-group">
                                 
                                 <input type="submit" class=" btn btn-primary" name="insert_post">
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
