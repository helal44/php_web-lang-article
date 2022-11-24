<div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"> Dashboard</a>
                    </li>
                    <li class="">
                        <a href="../admin/category.php"> Category</a>
                    </li>
                   
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#posts"> POSTS </a>
                        <ul id="posts" >
                            <li>
                                <a href="../admin/posts.php"> View All Posts</a>
                            </li>
                            <?php if(isset($_SESSION['role']) && $_SESSION['role']=='Admin') {?>
                            <li>
                                <a href="../admin/add_post.php">Add Posts</a>
                            </li>
                            <?php } ?>
                           
                        </ul>
                    </li>
                   
                    <li>
                        <a href="../admin/comments.php"> Comment</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"> Users</a>
                        <ul id="demo" class="">
                            <li>
                                <a href="../admin/user.php">View Users</a>
                            </li>
                            <?php if(isset($_SESSION['role']) && $_SESSION['role']=='Admin') {?>
                            <li>
                                <a href="add_user.php">Add Users</a>
                            </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li class="">
                        <a href="./profile.php"><i class="fa fa-fw fa-file"></i> Profile</a>
                    </li>
                   
                </ul>
            </div>
