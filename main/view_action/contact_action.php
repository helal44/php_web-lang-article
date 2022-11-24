<?php 
function send_mail(){
    global $conect;
    if(isset($_POST['contact'])){
        $sender_email=$_POST['send_email'];
        $reciever_email=$_POST['reciever_email'];
        $subject=wordwrap($_POST['subject'] ,70);

        Mail($sender_email ,$reciever_email,$subject );
        $re= Mail($sender_email ,$reciever_email,$subject );
        if(!$re){
                header("location:index.php");
        }
    }
}

?>