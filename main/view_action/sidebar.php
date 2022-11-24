 <?php
 // view all categories ----------------------------? 
 function view_all_cat(){
        global $conect;
 ?>  
 <ul class="list-unstyled">
   <?php 
        $query="select * from category";
        $select=mysqli_query($conect ,$query);
        while($row=mysqli_fetch_assoc($select)){
                $cat=$row['cat_title'];
                $cat_id=$row['cat_id'];
                echo "<li> <a href='categroy.php?cat_id={$cat_id}'>{$cat}</a>";
        }
        ?>
        
</ul>
<?php
};

// view spcefic categrioes ---------------------->

function view_cat(){
        global $conect;
        if(isset($_GET['cat_id'])){
        $cat_id=$_GET['cat_id'];
        $query="select * from posts where p_c_id={$cat_id}";
         $select=mysqli_query($conect ,$query);
         $count=mysqli_num_rows($select);
          if($count==0){
           echo'<h2>No Result</h2>';
             }
         while($row=mysqli_fetch_assoc($select)){
            
               $title=$row['post_title'];
               $author=$row['post_author'];
               $date=$row['post_date'];
               $image=$row['post_image'];
               $content=substr($row['post_content'],0,100);
               $tage=$row['post_tage'];
               $status=$row['post_status'];
              
               ?>
        
        
                        <h2>
                            <a href="../cms/post.php"><?php echo $title ?></a>
                        </h2>
                        <p class="lead">
                            by <a href="index.php"><?php echo $author ?></a>
                        </p>
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
        

?>