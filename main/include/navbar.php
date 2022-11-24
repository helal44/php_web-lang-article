
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div  class=" navbar navbar-brand">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a  class=" " href="index.php">HOME</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <?php 
                    $query="select * from category";
                    $select=mysqli_query($conect ,$query);
                    while($row=mysqli_fetch_assoc($select)){
                          $cat=$row['cat_title'];
                          $cat_id=$row['cat_id'];
                          echo "<li  class=' navbar'> <a href='categroy.php?cat_id={$cat_id}'>{$cat}</a>";
                    }
                    ?>
                    <?php if(isset($_SESSION['name'])) {?>
                     <li  class=" navbar ">
                        <a href="/cms/admin/index.php ">Welcome <?php echo $_SESSION['name'] ?></a>
                    </li>
                    <?php }  else{
                        ?>

                        <li class=" navbar">
                        <a href="../view/register.php">Rigister Account</a>
                        </li>

                        <?php
                       
                    } ?>
                   <!-- <li>
                        <a href="#">Services</a>
                    </li> -->
                    <li class=" navbar">
                        <a href="../view/contact.php">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>