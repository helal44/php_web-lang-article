
<?php  

// show all categories      ------------------------------------------------------------->

 function view(){
    global $conect;
        $query="select * from category";
        $result=mysqli_query($conect,$query);
        while($row=mysqli_fetch_assoc($result)){
        ?>
        <tr>
                <td><?php echo $row['cat_id'] ?></td>
                <td><?php echo $row['cat_title'] ?></td>
                <?php if(isset($_SESSION['role']) && $_SESSION['role']=='Admin') {?>

                <td ><a href="category.php?delete=<?php echo $row['cat_id'] ?>" class="bg-danger" >Delete</a>
                <a href="category.php?update=<?php echo $row['cat_id'] ?>"  class="bg-success ">UpDate</a></td>

                <?php } ?>
            </tr>
           <?php
        }
}


     //   insert catgotyy -------------------------------------------------------------->
 function insert(){
    global $conect;
        if(isset($_POST['insert'])){
            $cat=$_POST['category'];
            $query2="INSERT INTO category (cat_title) VALUES ('{$cat}') ";
            $insert=mysqli_query($conect,$query2);
            if(!$insert){
                die('failed'.mysqli_error($conect));
            }
        header("Location:category.php");
        }
    }

// delete categories    ------------------------------------- -------------------------->
  function delete(){
    global $conect;
    if(isset($_GET['delete']) && $_SESSION['role'] =='Admin'){
        $cat_id=$_GET['delete'];
        $query3="DELETE FROM category WHERE cat_id={$cat_id}";
        $delete=mysqli_query($conect ,$query3);
        header("Location:category.php");
    }
}

// update category------------------------------------------------>

function update(){
    global $conect;
    if(isset($_GET['update'])){
        $cat_id=$_GET['update'];
        $query4="select * from category where cat_id={$cat_id}";
        $result=mysqli_query($conect,$query4);
        while($row=mysqli_fetch_assoc($result)){
            $title=$row['cat_title'];
            if(isset($title)){
     ?>
                <h1 class="page-header">UpDate Category </h1>
                <div>
                    <input type="text" name="category" class="form-control" required value="<?php echo $title ;?>">
                </div>
                 <div class="form-group">
                            <input type="submit" name="update" value="UpDate Category" class="btn btn-primary">
                 </div>
    <?php
        }
        }
         if(isset($_POST['update'])){
        $cat_title=$_POST['category'];
        $query="UPDATE `category` SET `cat_title`='{$cat_title}' WHERE `cat_id`={$cat_id}";
        $result=mysqli_query($conect,$query);
        header("Location:category.php");
            ?>
            <div class="form-group">
                            
            <?php

        if (!$result) {
           echo 'update failed' ;
        }
    }
  
} 
}

?>
