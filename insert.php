<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1 align="center">php with ajax</h1>
    <h2>add new record</h2>
   

       
        <tr>
            <td>
                <form id="addform">
            <input type="text" name="" id="fname">
        <input type="text" name="" id="lname">
        <input type="submit" value="save" id="save-btn"></td>
        </form>
        </tr>
        
    </td>
</tr>





<table>
    <tr>
        <td id="table-data"></td>
    </tr>
</table>
<div id="model">
    <div id="model-form">
    <h2>edit form</h2>
            <table cellpadding="10px" width="100%">

       
            </table>
            <div id="close-btn">
X
            </div>
    </div>
</div>
 <script type="text/javascript"
  src="https://code.jquery.com/jquery-3.6.3.js"
  integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
  crossorigin="anonymous"></script>
  <script type="text/javascript">
$(document).ready(function(){
    function loadTable(){
       
$.ajax({
    url:"fetch.php",
    type:"POST",
    success:function(data){
        $("#table-data").html(data);
    }

        });
    }
    loadTable();
    $("#save-btn").on("click",function(){
      
var fname=$("#fname").val();
var lname=$("#lname").val();

        $.ajax({
            url:"add.php",
            type:"POST",
            data:{first_name:fname,last_name:lname},
            success:function(data){
                if(data==1){
                    $("#addform").trigger("reset");
                }else{
                    alert ("record no found");
                }
            }
        });

    });
$(document).on("click",'.edit-btn',function(){

$("#model").show();
var studentid=$(this).data("eid");
$.ajax({
    url:"updates.php",
    type:"POST",
    data:{id:studentid},
    success:function(data){
        $("#model-form table").html(data);
    }
});
});
$("#close-btn").on("click",function(){
    $("#model").hide();
});
$(document).on("click","#edit-submit",function(){
    var stuid=$("#edit-id").val();
    var fname=$("#edit-fname").val();
    var lname=$("#edit-lname").val();
    $.ajax({
        url:"update.php",
        type:"POST",
        data:{id:stuid,first_name:fname,last_name:lname},
        success:function(data){
            if(data==1){
                $("#model").hide();
                loadTable();
            }
        }
    });
});
$(document).on("click",".delete-btn",function(){
    var stud=$(this).data("id");
     element=this;
    $.ajax({
        url:"delete.php",
        type:"POST",
        data:{id:stud},
        success:function(data){
            if(data==1){
                $(element).closest("tr").fadeOut();
            }
        }
    });
});



});




  </script>
</body>
</html>