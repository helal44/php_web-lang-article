<?php
session_start() ;
ob_start();

$conect=mysqli_connect('localhost','root','','cms');
if($conect){

}
else{
    echo 'conection fail';
}
?>