<?php 
include('../include/db.php');
include('../include/header.php');
?>
<body>

    <!-- Page Content -->
    <div class="container">
<?php  include('../include/navbar.php')?>
        <div class="row">
          <?php
          include("../view_action/contact_action.php");
          send_mail();
          ?>
        <form action="" method="POST" enctype="multipart/form-data">
                          
                              
                            <div class="form-group">
                                <label for="">Enter your Email</label>
                                 <input type="email" class="form-control" name="send_email" required placeholder="some one @email.com">
                            </div>
                            <div class="form-group">
                                 <label for="">Enter the email of the Reciever</label>
                                 <input type="email" class="form-control" name="reciever_email" required placeholder="some one@email.com">
                            </div>
                            <div class="form-group">
                                 <label for="">subject of the contact</label>
                                 <textarea name="subject" class="form-control" placeholder="Enter your subject"></textarea>
                            </div>
                            <div class="form-group">
                                 
                                 <input type="submit" class=" btn btn-primary" name="contact" value="send your message">
                            </div>        
         
        </form>
        </div>  
        
       <?php include('../include/footer.php'); ?>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="../bootstrap/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bootstrap/bootstrap.min.js"></script>

</body>

</html>
