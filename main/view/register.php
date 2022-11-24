<?php 
include('../include/db.php');
include('../include/header.php');
?>
<body>

    <!-- Page Content -->
    <div class="container">
     <?php include("../view_action/register_action.php") ;
          language();
     ?>
     <div class="row">
          <form action="" method="get" class="navbar-form navbar-right" id="lang_id">
               <div class="form-group">
                    <!-- <select name="langugee" id="" class="form-control" onchange="languch()" >
                         <option value="eng"> eng</option>
                         <option value="arabic"> Arabic<option>
                    </select> -->
                    <input type="submit" value="english" name="lang" class="form-control">
                    <input type="submit" value="arabic" name="lang" class="form-control">
                   
               </div>
          </form>
     </div>
     <?php 
           include('../include/navbar.php')?>
        <div class="row">


          <?php
          create_user();
          ?>

          <!--  Register form ----------------------------------------------- -->
        <form action="" method="POST" enctype="multipart/form-data">
                         <label for=""><?php  echo _REGISTER ?></label>
                         <div class="form-group">
                                 <label for=""><?php  echo _USERNAME ?></label>
                                 <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                 <label for=""><?php  echo _PASSWORD ?></label>
                                 <input type="password" class="form-control" name="password" required>
                            </div>

                            <div class="form-group">
                                 <label for=""><?php  echo _FIRSTNAME ?></label>
                                 <input type="text" class="form-control" name="firstname" required>
                            </div>
                              
                            <div class="form-group">
                                 <label for=""><?php  echo _LASTNAME ?></label>
                                 <input type="text" class="form-control" name="lastname" required>
                            </div>
                            <div class="form-group">
                                 <label for=""><?php  echo _image ?></label>
                                 <input type="file" class="form-control" name="image" required>
                            </div>
                            <div class="form-group">
                                 <label for=""><?php  echo _EMAIL ?></label>
                                 <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="form-group">
                                 
                                 <input type="submit" class=" btn btn-primary" name="create_user" value="<?php  echo _submit ?>">
                            </div>        
         
        </form>
        </div>  
        
       <?php include('../include/footer.php'); ?>

    </div>
    <script>
     function languch(){
          document.getElementById("lang_id").onsubmit;
          console.log("it works");
     }
    </script>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="../bootstrap/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bootstrap/bootstrap.min.js"></script>

</body>

</html>
