<?php

include("./db.php");
$query="SELECT * FROM students";
$result=mysqli_query($dba,$query);
$output="";
if(mysqli_num_rows($result)){
    $output.='<table cellpadding="10" cellspacing="0" width="100%">
    <tr>
        <th>id</th>
        <th>name</th>
        <th>actions</th>
    </tr>';
    while($row=mysqli_fetch_assoc($result)){
        $output.=" <tr>
       <td>{$row["id"]}</td><td>{$row["first_name"]} {$row["last_name"]}</td> <td><button class='edit-btn'
       data-eid={$row["id"]}
       >edit</button></td>
       <td><button class='delete-btn' data-id={$row["id"]}>delete</button</td>

    </tr>";
}
$output.="</table>";
echo $output;
}else{
    echo "record not found";
}


?>