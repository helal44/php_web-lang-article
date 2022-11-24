
<div class="well">
                    <h4>Blog Login</h4>

                    <?php  

 //  -----------   log in function  -------------------->
  function login(){
     global $conect;
     if(isset($_POST['login'])){
        $name=mysqli_real_escape_string($conect ,$_POST['name']);
        $pass=mysqli_real_escape_string($conect ,$_POST['password']);
       
        $query="select * from users where name='{$name}' and password='{$pass}'";
        $result=mysqli_query($conect ,$query);
        $count=mysqli_num_rows($result);
        if($result){
           while($row=mysqli_fetch_assoc($result)){
            $_SESSION['role']=$row['role'];
            $_SESSION['id']=$row['user_id'];
            $_SESSION['name']=$row['name'];
            $_SESSION['password']=$row['password'];
            $_SESSION['firstname']=$row['firstname'];
            $_SESSION['lastname']=$row['lastname'];
            $_SESSION['image']=$row['image'];
            $_SESSION['email']=$row['email'];
            header("location:/cms/admin");
       
           }
        }
        if($count ==0){
            echo "username or password are rong please check again";
        }
     }

  }
  
  
  ?>
                    <div class="">
                     <form  method="POST" >
                          <div class="form-group">
                          <input type="text" class="form-control" name="name" placeholder="Enter User Name" required>
                          </div>
                           <div class="form-group">
                          <input type="password" class="form-control" name="password" placeholder=" Enter Your Password" required>
                          </div>
                           
                              <div class="form-grop">
                               <input type="submit" class="btn btn-primary" name="login" value="login">
                              </div>  

                    </form>
                                        </div>
                                    
                                    
                    </div>









                    <?php  
                    //-----------log out function  -------->

                    function logout(){
                        if(isset($_GET['logout'])){
                            session_destroy();
                        }
                    }
                    
                    
                    ?>