<?php
include("./db.php");
$student_id=$_POST["id"];
$query="DELETE FROM students WHERE id={$student_id}";
if(mysqli_query($dba,$query)){
    echo 1;
}else{
    echo 0;
}


?>
