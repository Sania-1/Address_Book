<?php
include 'coonect.php';
$user = new connect();
if (isset($_GET['q'])){
        $user->logout();
        header("location:index.php");
 }

?>
<html lang="en">
<head>
  <title>home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body style="background-color:#cccccc;">
    <center>
<div class="container">
  <div class="page-header">
      <marquee direction="left">
    <h3>WELCOME TO ADDRESS BOOK APPLICATION!!</h3>
    </marquee>
  </div>
</div>
    </center>
 <div class="container">
        <a href="addsearch.php">Search: </a><span class="glyphicon glyphicon-search"></span>
        <a href="home.php?q=logout"><span class="glyphicon glyphicon-log-out">Logout</span></a>
    <center>
    <ul class="list-group">
        <a href="home.php" class="list-group-item list-group-item-success">HOME</a><br>
        <a href="addcontact.php" class="list-group-item list-group-item-info">ADD CONTACT</a><br>
        <a href="list.php" class="list-group-item list-group-item-danger">MY CONTACTS</a><br>
    </ul>
    </center>
    </div>     
</body>
</html>

    

