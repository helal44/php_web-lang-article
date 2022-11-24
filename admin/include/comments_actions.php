<?php 
// view comments -------------------------------->

function view_comments(){

    global $conect;
    $query="select * from comments left join posts on com_pos_id = post_id ";
    $result=mysqli_query($conect ,$query);
    while($row=mysqli_fetch_assoc($result)){
        ?>
         <tr>
            <td> <?php echo $row['com_id'] ?> </td>
            <td> <?php echo $row['com_author'] ?> </td>
            <td> <?php echo $row['com_email'] ?> </td>
            <td> <?php echo substr($row['com_content'],0,50) ?> </td>
            <td> <?php echo $row['com_status'] ?> </td>
            <td><a href="../post.php?post_id=<?php echo $row['post_id'] ?>"><?php echo $row['post_title'] ?></a></td>
            <td> <?php echo $row['com_date'] ?> </td>
            <?php if(isset($_SESSION['role']) && $_SESSION['role']=='Admin') {?>
            <td><a href="comments.php?approved= <?php echo $row['com_id'] ?>">Approved</a> </td>
            <td><a href="comments.php?unapproved= <?php echo $row['com_id'] ?>">Un-Approved</a> </td>
            <td><a href="comments.php?delete= <?php echo $row['com_id'] ?>">Delete</a> </td>
           <?php } ?>
         </tr>
        
        <?php
    }
}


// delete comments ------------------------------------>$_COOKIE

function delete_comments(){
    global $conect;
    if(isset($_GET['delete']) && $_SESSION['role'] =='Admin'){
        $com_id=$_GET['delete'];
        $query=" DELETE FROM comments WHERE com_id={$com_id}";
        $result=mysqli_query($conect ,$query);
        if($result){
            header("location:comments.php");
        }
    }

}


// Approved  comment ----------------------------------->

function approve_comments(){
    global $conect;
    if(isset($_GET['approved'])){
        $com_id=$_GET['approved'];
        $query=" UPDATE comments SET com_status ='Approved' WHERE com_id={$com_id}";
        $result=mysqli_query($conect ,$query);
        if($result){
            header("location:comments.php");
        }
    }

}


//      unapproved  comments---------------------------->

function unapprove_comments(){
    global $conect;
    if(isset($_GET['unapproved'])){
        $com_id=$_GET['unapproved'];
        $query=" UPDATE comments SET com_status ='Un-Approved' WHERE com_id={$com_id}";
        $result=mysqli_query($conect ,$query);
        if($result){
            header("location:comments.php");
        }
    }

}
?>