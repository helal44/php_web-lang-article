

<?php 

// selection function  -------------------->$_COOKIE
function selection(){
    global $conect;
if(isset($_POST['checkbox'])){
    foreach($_POST['checkbox'] as $post_id){
        $option=$_POST['option']; 
        $query="update posts set post_status ='{$option}' where post_id={$post_id}";
                 mysqli_query($conect ,$query);
        // switch($option){
        //     case 'draft':
        //         $query="update posts set post_status ='{$option}' where post_id={$post_id}";
        //          mysqli_query($conect ,$query);
        //     case 'published':


        // }
    }
}

}

// view all posts -------------------------->

function view(){
    global $conect;
    $query="select * from posts left join category on posts.p_c_id = category.cat_id";
    $result=mysqli_query($conect ,$query);
    if(!$result){
        echo 'faiiiiiiiiil';
    }
    while($row=mysqli_fetch_assoc($result)){
        ?>
        <tr  >
        <td><input type="checkbox" value="<?php echo $row['post_id'] ?> " name="checkbox[]" class="checkbox1"></td>
            <td><?php echo $row['post_id'] ?></td>
            <td><?php echo $row['post_author'] ?></td>
            <td><?php echo $row['cat_title'] ?></td>
            <td><?php echo $row['post_title'] ?></td>
            <td><?php echo substr($row['post_content'] ,0,50) ?></td>
            <td><?php echo $row['post_status'] ?></td>
            <td><img src="../admin/images/<?php echo $row['post_image'] ?>" alt="image" class="img-responsive"></td>
            <td><?php echo $row['post_tage'] ?></td>
            <td><?php echo $row['post_comment_count'] ?></td>
            <td><?php echo $row['post_date'] ?></td>
            <?php if(isset($_SESSION['role']) && $_SESSION['role']=='Admin') {?> 
            
            
            <td><a href="posts.php?delete=<?php echo $row['post_id'] ?>" class="btn  btn-danger">Delete</a>
            <a href="update_post.php?update=<?php echo $row['post_id'] ?>" class=" btn">UpDate</a>
            <?php } ?>
            </td>
            
        </tr>
        <?php
        
    }
} 

//   delete  post  --------------------------------------------->
function delete(){
    global $conect;
    if(isset($_GET['delete']) && $_SESSION['role'] =='Admin'){  
    $post_id=mysqli_real_escape_string($conect ,$_GET['delete']);
    $q2="select * from posts where post_id ={$post_id}";
    $result=mysqli_query($conect ,$q2);
    while($row =mysqli_fetch_assoc($result)){
        $image=$row['post_image'];
        unlink("../admin/images/$image");
    }
    $query=" DELETE FROM `posts` WHERE`post_id` ={$post_id}";
    mysqli_query($conect ,$query);
    header('Location:posts.php');
    }
 }




// insert post ------------------------------------------------------->
             //  the select options ----------------->
function select(){
    global $conect;
    $q="SELECT * FROM `category` WHERE 1";
    $r=mysqli_query($conect ,$q);
    while($ro=mysqli_fetch_assoc($r)){
        ?>
        <option value="<?php  echo $ro['cat_id'] ?>"><?php echo $ro['cat_title'] ?></option>
        <?php
    }
                                 
}

function insert(){
    global $conect;
    if(isset($_POST['insert_post'])){
        $title=$_POST['title'];
        $author=$_POST['author'];
        $content=$_POST['content'];
        $status=$_POST['post_status'];
        $image=$_FILES['image']['name'];
        $image_temp=$_FILES['image']['tmp_name'];
        $tages=$_POST['tages'];
        $date=$_POST['date'];
        $cat_id=$_POST['cate_title'];
        $user_id=$_SESSION['id'];
        //$date=date('d-m-y');
        move_uploaded_file($image_temp ,"../admin/images/$image");

        $query="INSERT INTO `posts`(`user_id`,`p_c_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tage`, `post_status`) VALUES ({$user_id},{$cat_id},'{$title}','{$author}','{$date}','{$image}','{$content}','{$tages}','{$status}')";
        $result=mysqli_query($conect ,$query);
        if($result){
            echo'<h3> data is added </h3>';
            header("location:posts.php");
        }
        else{
            echo'<h3> failed to insert data</h3>';
            die('query failed'.mysqli_error($conect));
        }
    }
}




 // update post ------------------------------------------------------------------------->
 function update(){

    // first    retrive data to the update form -------------------------------->
       global $conect;
       if(isset($_GET['update'])){
        $post_id=$_GET['update'];
        $query=" SELECT * FROM `posts` WHERE`post_id` ={$post_id}";
        $result=mysqli_query($conect ,$query);

        while($row=mysqli_fetch_assoc($result)){
       ?>
       <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                 <label for="">post Author</label>
                                 <input type="text" class="form-control" name="author" required value="<?php echo $row['post_author'] ?>">
                            </div>
                            <div class="form-group">
                                 <label for="">post Title</label>
                                 <input type="text" class="form-control" name="title" required value="<?php echo $row['post_title'] ?>">
                            </div>
                            <div class="form-group">
                                 <label for="">Category Title</label>
                                 <select name="cate_title" class="form-control" >
                                 <?php
                                 $oquery="select * from category where cat_id={$row['p_c_id']}";
                                 $ore=mysqli_query($conect ,$oquery);
                                 $re=mysqli_fetch_assoc($ore);
                                 ?>
                                 <option value="<?php  echo $re['cat_id'] ?>"><?php echo $re['cat_title'] ?></option>
                                 <?php
                                  $q="SELECT * FROM `category` WHERE 1";
                                  $r=mysqli_query($conect ,$q);
                                  while($ro=mysqli_fetch_assoc($r)){
                                     ?>
                                     <option value="<?php  echo $ro['cat_id'] ?>"><?php echo $ro['cat_title'] ?></option>
                                     <?php
                                  }
                                 ?>
                                    
                                 </select>
                            </div>
                            <div class="form-group">
                                 <label for="">post Content</label>
                                 <textarea name="content" cols="20" rows="5" class="form-control" required ><?php echo $row['post_content'] ?></textarea>
                            </div>
                            <div class="form-group">
                            <div class="form-group">
                                <label for="">post status</label>
                                <select name="post_status" class="form-control">
                                    <option value="Published" >Published</option>
                                    <option value="Suspended" >Suspended</option>
                                </select>
                           </div>
                            </div>
                            <div class="form-group">

                                 <label for="">post Image</label>
                                 <img src="../admin/images/<?php echo $row['post_image'] ?>" alt="image" class="img-responsive">
                                 <input type="file" class="form-control" name="image" required >
                            </div>
                            <div class="form-group">
                                 <label for="">post Tages</label>
                                 <input type="text" class="form-control" name="tages" required value="<?php echo $row['post_tage'] ?>">
                            </div>
                            <div class="form-group">
                                 <label for="">post Date</label>
                                 <input type="date" class="form-control" name="date" required value="<?php echo $row['post_date'] ?>">
                            </div>
                            <div class="form-group">
                                 
                                 <input type="submit" class=" btn btn-primary" name="update_post" value="update_post">
                            </div>
                        </form>
                    
       <?php
        $oldimage=$row['post_image'];
        unlink("../admin/images/$oldimage");
         }

           // then check the the update subnit --------------------------------->
         if(isset($_POST['update_post'])){
            $title=$_POST['title'];
            $c_title=$_POST['cate_title'];
            $author=$_POST['author'];
            $content=$_POST['content'];
            $status=$_POST['post_status'];
            $image=$_FILES['image']['name'];
            $image_temp=$_FILES['image']['tmp_name'];
            $tages=$_POST['tages'];
            $date=$_POST['date'];
           
            //$date=date('d-m-y');
            
            move_uploaded_file($image_temp ,"../admin/images/$image");
            $query="UPDATE `posts` SET `p_c_id`={$c_title}, `post_title`='{$title}',`post_author`='{$author}',`post_date`='{$date}',`post_image`='{$image}',`post_content`='{$content}',`post_tage`='{$tages}',`post_status`='{$status}' WHERE post_id={$post_id}";
            $result=mysqli_query($conect ,$query);
            if($result){
                echo"<h3> data is updated </h3>";
                header("location:posts.php");
            }
            else{
                die("fiale".mysqli_error($conect));
            }
         }
    }
 }
?>