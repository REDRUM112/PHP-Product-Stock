<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<style>
#loading-img{
display:none;
}
.response_msg{
margin-top:10px;
font-size:13px;
text-align: center;
color: #fff;
border:1px solid #408a37;
border-radius: 3px;  
background:#37ad2f;
color:#ffffff;
width: 195px;
padding:3px;
display:none;
}
.dresponse_msg{
margin-top:10px;
font-size:13px;
text-align: center;
color: #fff;
border:1px solid #408a37;
border-radius: 3px;  
background:#37ad2f;
color:#ffffff;
width: 195px;
padding:3px;
display:none;
}
</style>
    <title>Inventory</title>
</head>
<body>
<br>
<br>
<h1><img src="" width="80px">Delete a product</h1>
<form name="delete-form" action="" method="post" id="delete-form">
<div class="form-group">
<label for="id">Product ID</label>
<input type="text" class="form-control" name="id" placeholder="ID" required>
</div>
<button type="submit" class="btn btn-danger" name="submit" value="Submit" id="submit_form">Delete</button>
<img src="" id="loading-img">
</form>
<div class="dresponse_msg"></div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
$(document).ready(function(){
$("#delete-form").on("submit",function(e){
e.preventDefault();
if($("#delete-form [name='id']").val() === '0')
{
$("#delete-form [name='id']").css("border","1px solid red");
}
else
{
$("#loading-img").css("display","block");
var sendData = $( this ).serialize();
$.ajax({
type: "POST",
url: "delhandshake.php",
data: sendData,
success: function(data){
$("#loading-img").css("display","none");
$(".dresponse_msg").text(data);
$(".dresponse_msg").slideDown().fadeOut(15000);
$("#delete-form").find("input[type=text], input[type=email], textarea").val("");
}
});
}
});
$("#delete-form input").blur(function(){
var checkValue = $(this).val();
if(checkValue != '')
{
$(this).css("border","1px solid #eeeeee");
}
});
});
</script>
</body>
</html>
