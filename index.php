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
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><img src="img/8ball.png" style="width:24px; height:24px;">  8BallShop</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Add Products <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="search.php">Product Stock</a>
      </li>
   </ul>
 </div>
</nav>
<div class="container" style="transform: translate(-50%, -50%);top:50%;left: 61%;position: absolute;right: 0;bottom: 0;">
<div class="row">
<div class="col-md-8">
<h1><img src="" width="80px">Add a new product</h1>
<form name="contact-form" action="" method="post" id="contact-form">
<div class="form-group">
<label for="id">Product ID</label>
<input type="text" class="form-control" name="id" placeholder="ID" required>
</div>
<div class="form-group">
<label for="upc">Purchase Link</label>
<input type="text" class="form-control" name="upc" placeholder="Link" required>
</div>
<button type="submit" class="btn btn-primary" name="submit" value="Submit" id="submit_form">Add</button>
<img src="" id="loading-img">
</form>
<div class="response_msg"></div>
</ br>
<?php include'connection/delete.php'; ?>

</div>
</div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
$(document).ready(function(){
$("#contact-form").on("submit",function(e){
e.preventDefault();
if($("#contact-form [name='id']").val() === '0')
{
$("#contact-form [name='id']").css("border","1px solid red");
}
else if ($("#contact-form [name='upc']").val() === '0')
{
$("#contact-form [name='upc']").css("border","1px solid red");
}
else
{
$("#loading-img").css("display","block");
var sendData = $( this ).serialize();
$.ajax({
type: "POST",
url: "handshake.php",
data: sendData,
success: function(data){
$("#loading-img").css("display","none");
$(".response_msg").text(data);
$(".response_msg").slideDown().fadeOut(15000);
$("#contact-form").find("input[type=text], input[type=email], textarea").val("");
}
});
}
});
$("#contact-form input").blur(function(){
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
