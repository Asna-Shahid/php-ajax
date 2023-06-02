<?php

$student_id=$_POST["id"];

$server="localhost";
$user="root";
$password="";
$database="test";
$dba=mysqli_connect($server,$user,$password,$database);
$query="SELECT * FROM students WHERE id={$student_id}";
$result=mysqli_query($dba,$query);
$output="";
if(mysqli_num_rows($result)>0){
   
   while($row=mysqli_fetch_assoc($result)){
    $output.="<tr>
    <td>first name</td>
    <td><input type='text' id='edit-fname' name='' value='{$row["first_name"]}'>
    <input type='text' id='edit-id' name='' hidden value='{$row["id"]}'>
    </td>
</tr>
<tr>
    <td>last name</td>
    <td><input type='text' id='edit-lname' name='' value='{$row["last_name"]}'></td>
</tr>
<tr>
    <td></td>
    <td><input type='submit' id='edit-submit' name='' value='save'></td>
</tr>";
   }

 
   mysqli_close($dba);
   echo $output;
}else{
    echo "<h2>record not found </h2>";
    }


?>