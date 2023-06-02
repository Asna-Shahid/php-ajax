<?php

include("./db.php");
$first_name=$_POST["first_name"];
$last_name=$_POST["last_name"];
$query="INSERT INTO students(first_name,last_name)VALUES('{$first_name}','{$last_name}')";
if(mysqli_query($dba,$query)){
    echo 1;
}else{
    echo 0;
}


?>
