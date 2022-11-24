<?php  

function create_user(){
    global $conect;
    if(isset($_POST['create_user'])){
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
            header("location:index.php");
        }
        else{
            echo'<h3> failed to create user please try again</h3>';
           
        }

    }
}



// languge  -------------------------------------------->$_COOKIE

function language(){
    if(isset($_GET['lang'])){
        $_SESSION['lang']=$_GET['lang'];
        if(isset($_SESSION['lang']) && $_SESSION['lang'] =='arabic'){
           include("../include/languches/arabic.php");
        }
        elseif(isset($_SESSION['lang']) && $_SESSION['lang'] =='english'){
            include("../include/languches/eng.php");
        }
        
    }
    else{
        include("../include/languches/eng.php");
    }
}
?>