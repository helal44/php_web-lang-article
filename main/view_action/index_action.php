<?php 
   // viw all posts in index view             ------------------------>
function mainview(){
    global $conect;
    $num=pager_num();
    $max=5;
    $mini=($num -1)*5;
 $query="select * from posts limit $max offset $mini";
 $select=mysqli_query($conect ,$query);
 while($row=mysqli_fetch_assoc($select)){
    if($row['post_status']=='Published'){
       $title=$row['post_title'];
    //    $author=$row['post_author'];
       $date=$row['post_date'];
       $image=$row['post_image'];
       $content=substr($row['post_content'],0,100);
       $tage=$row['post_tage'];
      
      
       ?>


                <h2>
                    <a href="post.php?post_id=<?php echo $row['post_id'] ?>"><?php echo $title ?></a>
                </h2>
                <p><?php echo $date ?></p>
                <hr>
                <img class="img-responsive" src="/cms/admin/images/<?php  echo $image ?>" alt="img">
                <hr>
                <p> <?php echo $content ?></p>
                <a class="btn btn-primary" href="post.php?post_id=<?php echo $row['post_id'] ?>">read more <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                
      <?php 
   
      }
  }

}

//  pager  ----------------------------------------------------------------->
function pager(){
global $conect;
$query="select * from posts";
$result=mysqli_query($conect ,$query);
$count=mysqli_num_rows($result);
$pager=ceil($count/5);
for($i=1 ;$i<=$pager ;$i++){
    echo" <li> <a href='index.php?pager=$i' name='pager'>$i</a></li>";
}
}

//-----  pager number----------------------------->$_COOKIE
function pager_num(){
    if(isset($_GET['pager'])){
        $num=$_GET['pager'];
    }
    else{
        $num=1;
    }
    return $num;
}


// search  post in the search view  -------------------------------------------->
function search(){
    global $conect;

    if(isset($_POST['submit'])){
        $search=$_POST['search'];
       $query="select * from posts WHERE post_tage LIKE'%".$search."%'";
       $result=mysqli_query($conect ,$query);
       $count=mysqli_num_rows($result);
       if($count==0){
       echo'<h4>no result</h4>';
       } 
      else{
        while($row=mysqli_fetch_assoc($result)){
            $title=$row['post_title'];
        //    $author=$row['post_author'];
           $date=$row['post_date'];
           $image=$row['post_image'];
           $content=$row['post_content'];
           $tage=$row['post_tage'];
           $comment=$row['post_comment_count'];
           $status=$row['post_status'];
            
    ?>
    
                    <h2>
                    <a href="../view/?php echo $row['post_id'] ?>"><?php echo $title ?></a>
                    </h2>
                    <p><span class="glyphicon glyphicon-time"></span> <?php echo $date ?></p>
                    <hr>
                    <img class="img-responsive" src="/cms/admin/images/<?php echo $image ?>" alt="img">
                    <hr>
                    <p> <?php echo $content ?></p>
                    <a class="btn btn-primary" href="post.php?post_id=<?php echo $row['post_id'] ?>">read more <span class="glyphicon glyphicon-chevron-right"></span></a>
    
                    <hr>
    <?php
    
            }
         }
       
    }
}


//------view singel post in post view --------------------->
function post(){
global $conect;
if(isset($_GET['post_id'])){
$post_id=$_GET['post_id'];
$query="select * from posts where post_id={$post_id}";
 $select=mysqli_query($conect ,$query);
 while($row=mysqli_fetch_assoc($select)){
       $title=$row['post_title'];
    //    $author=$row['post_author'];
       $date=$row['post_date'];
       $image=$row['post_image'];
       $content=$row['post_content'];
       $tage=$row['post_tage'];
       $comment=$row['post_comment_count'];
       $status=$row['post_status'];
      
       ?>


                <h2>
                    <a href="post.php?post_id=<?php echo $row['post_id'] ?>"><?php echo $title ?></a>
                </h2>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $date ?></p>
                <hr>
                <img class="img-responsive" src="/cms/admin/images/<?php echo $image ?>" alt="img">
                <hr>
                <p> <?php echo $content ?></p>
               

                <hr>
                
      <?php 
  }
}
}


//------------ create comment in post view -------------------------->
function create_comment(){
    global $conect;
    if(isset($_POST['create_comment'])){
        $pos_id=$_GET['post_id'];
        $com_content=$_POST['content'];
        $com_author=$_POST['author'];
        $com_email=$_POST['email'];
        $com_status='Un-Approved';
        $com_date=date('d-m-y');
        $query="INSERT INTO `comments`( `com_pos_id`, `com_email`, `com_content`, `com_status`, `com_date`, `com_author`) VALUES ({$pos_id},'{$com_email}','{$com_content}','{$com_status}','{$com_date}','{$com_author}')";
        $result=mysqli_query($conect ,$query);
        if(!$result){
            die('fial'.mysqli_error($conect));
        }

        // comment counts --------------->$_COOKIE
        $query2="select * from comments where com_pos_id={$pos_id}";
        $result2=mysqli_query($conect ,$query2);
        $comment_num=mysqli_num_rows($result2);
        $query3="update posts set post_comment_count ={$comment_num} where post_id={$pos_id} ";
        $result3=mysqli_query($conect ,$query3);
    }
}


//------ view comments in the post view --------------------------->
  function view_comments(){
    global $conect;
    $pos_id=$_GET['post_id'];
    $query="select * from comments where com_pos_id={$pos_id} ";
    $query.="and com_status ='Approved' order by com_id desc limit 5 ";
    $result=mysqli_query($conect ,$query);
    if(!$result){
        die('failed'.mysqli_error($conect));
    }
    while($row=mysqli_fetch_assoc($result)){
        ?>
        <div class="media">
            <a href="" class="pull-left">
                <img src="" alt="" class="media-object">
            </a>
            <div class="media-body">
                <h4 class="media-heading"><?php echo $row['com_author'] ?>
                    <small> <?php echo $row['com_date'] ?></small>
                </h4>
                <?php echo $row['com_content'] ?>
            </div>
        </div>
      <?php
    }
  }

?>