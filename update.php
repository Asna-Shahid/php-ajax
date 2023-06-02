<?php

$first_name=$_POST["first_name"];
$last_name=$_POST["last_name"];
$stuid=$_POST["id"];
$server="localhost";
$user="root";
$password="";
$database="test";
$dba=mysqli_connect($server,$user,$password,$database);
$query="UPDATE students SET first_name='{$first_name}',last_name='{$last_name}' WHERE id={$stuid}";
if(mysqli_query($dba,$query)){
    echo 1;
}else{
    echo 0;
}
?>