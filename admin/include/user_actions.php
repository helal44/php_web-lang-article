<?php 
// ------------------- view all users ---------------->

function view_all_users(){
    global $conect;
    $query="select * from users";
    $result=mysqli_query($conect ,$query);
    if(!$result){
        echo 'faiiiiiiiiil';
    }
    while($row=mysqli_fetch_assoc($result)){
        ?>
        <tr  >
            <td><?php echo $row['user_id'] ?></td>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['password'] ?></td>
            <td><?php echo $row['firstname'] ?></td>
            <td><?php echo $row['lastname'] ?></td>
            <td><img src="../admin/user_images/<?php echo $row['image'] ?>" alt="image" class="img-responsive"></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['role'] ?></td>
            <td><?php echo $row['rand'] ?></td> 
            <?php if(isset($_SESSION['role']) && $_SESSION['role']=='Admin') {?>
            <td>
            <a href="user.php?admin=<?php echo $row['user_id'] ?>" class="btn btn">Admin</a>
            <a href="user.php?user=<?php echo $row['user_id'] ?>" class="btn">User</a>
            </td>
            
            <td><a href="user.php?delete=<?php echo $row['user_id'] ?>" class="btn  btn-danger">Delete</a>
            <a href="update_user.php?update=<?php echo $row['user_id'] ?>" class=" btn">UpDate</a>
            </td>
            <?php } ?>
            
        </tr>
        <?php
        
    }
} 

//------ delete user ----------------->
function delete_user(){
    global $conect;
    if(isset($_GET['delete']) && $_SESSION['role'] =='Admin'){
    $user_id=$_GET['delete'];
    $query="DELETE FROM `users` WHERE user_id={$user_id}";
    $result=mysqli_query($conect ,$query);
    if($result){
        header("location:user.php");
    } else{
        die("falied".mysqli_error($conect));
    }
     }
 }

//--------- change role ------------------------>

function user_role(){
    global $conect;
    if(isset($_GET['admin'])){
        $user_id=$_GET['admin'];
        $query="update users set role='Admin' where user_id={$user_id}";
        $result=mysqli_query($conect ,$query);
        if($result){
            header("location:user.php");
        }

    }
    elseif(isset($_GET['user'])){
        $user_id=$_GET['user'];
        $query="update users set role='User' where user_id={$user_id}";
        $result=mysqli_query($conect ,$query);
        if($result){
            header("location:user.php");
        }
    }
}
//----- insert userss--------------------->

function insert_user(){
    global $conect;
    if(isset($_POST['insert_user'])){
        $name=$_POST['name'];
        $password=$_POST['password'];
        $firstname=$_POST['firstname'];
        $lastname=$_POST['lastname'];
        $image=$_FILES['image']['name'];
        $image_temp=$_FILES['image']['tmp_name'];
        $email=$_POST['email'];
        move_uploaded_file($image_temp ,"../admin/user_images/$image");

        $query="INSERT INTO `users`( `name`, `password`, `firstname`, `lastname`, `image`, `email`,`role`) VALUES ('{$name}','{$password}','{$firstname}','{$lastname}','{$image}','{$email}','user')";
        $result=mysqli_query($conect ,$query);
        if($result){
            echo'<h3> data is added </h3>';
            header("location:user.php");
        }
        else{
            echo'<h3> failed to insert data</h3>';
            die('query failed'.mysqli_error($conect));
        }
    }
}

//--------- update user --------------------------------->

function update_user(){
    global $conect;
// ------------   view values -------------------------------------->

    if(isset($_GET['update'])){
        $user_id=$_GET['update'];
        $query="select * from users where user_id={$user_id}";
        $result=mysqli_query($conect ,$query);
        while($row =mysqli_fetch_assoc($result)){

            ?>
                   <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                 <label for="">User Name</label>
                                 <input type="text" class="form-control" name="name" required value="<?php echo $row['name'] ?>">
                            </div>
                            <div class="form-group">
                                 <label for="">Password</label>
                                 <input type="password" class="form-control" name="password" required value="<?php echo $row['password'] ?>">
                            </div>

                            <div class="form-group">
                                 <label for="">First Name</label>
                                 <input type="text" class="form-control" name="firstname" required  value="<?php echo $row['firstname'] ?>">
                            </div>
                              
                            <div class="form-group">
                                 <label for="">Last Name</label>
                                 <input type="text" class="form-control" name="lastname" required value="<?php echo $row['lastname'] ?>">
                            </div>
                            <div class="form-group">
                                
                                 <img src="../admin/user_images/<?php echo $row['image'] ?>" alt="">
                                 <input type="file" class="form-control" name="image" required>
                            </div>
                            <div class="form-group">
                                 <label for="">Email</label>
                                 <input type="email" class="form-control" name="email" required value="<?php echo $row['email'] ?>">
                            </div>
                            <div class="form-group">
                                 
                                 <input type="submit" class=" btn btn-primary" name="update_user" value="Update_user">
                            </div>
                        </form>
            
            <?php
        }
    }  
//----------    store values  --------------------------------------------->

    if(isset($_POST['update_user'])){

        $name=$_POST['name'];
        $password=$_POST['password'];
        $firstname=$_POST['firstname'];
        $lastname=$_POST['lastname'];
        $image=$_FILES['image']['name'];
        $image_temp=$_FILES['image']['tmp_name'];
        $email=$_POST['email'];
        move_uploaded_file($image_temp ,"../admin/user_images/$image");
        $query="UPDATE `users` SET `name`='{$name}',`password`='{$password}',`firstname`='{$firstname}',`lastname`='{$lastname}',`image`='{$image}',`email`='{$email}' WHERE user_id={$user_id}";
        $result=mysqli_query($conect ,$query);
        if($result){
            header("location:user.php");
        }
    }
}
?>