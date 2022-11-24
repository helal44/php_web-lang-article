<?php 
//--------- update user --------------------------------->

function update_profile(){
    global $conect;
// ------------   view values -------------------------------------->

    if(isset($_SESSION['id'])){
        $user_id=$_SESSION['id'];
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
                                 
                                 <input type="submit" class=" btn btn-primary" name="update_profile" value="Update_Profile">
                            </div>
                        </form>
            
            <?php
        }
    }  
//----------    store values  --------------------------------------------->

    if(isset($_POST['update_profile'])){

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
            header("location:./index.php");
        }
    }
}
?>