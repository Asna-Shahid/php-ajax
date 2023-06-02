<?php
include("./db.php");
$first_name=$_POST["first_name"];
$last_name=$_POST["last_name"];
$stuid=$_POST["id"];

$query="UPDATE students SET first_name='{$first_name}',last_name='{$last_name}' WHERE id={$stuid}";
if(mysqli_query($dba,$query)){
    echo 1;
}else{
    echo 0;
}
?>