<?php
    session_start();
      include 'coonect.php';
      $obj = new connect();
      $uid = $_SESSION['id'];
      $contact = $obj->contacts($uid);
?>
<html lang="en">
<head>
  <title>list</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body style="background-color:#cccccc;">

 <div class="container">
    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">ADDRESS BOOK APPLICATION</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="home.php">Home</a></li>
        <li><a href="addcontact.php">Add Contacts</a></li>
        <li class="active"><a href="list.php">My Contact List<p></a></li>
    </ul>
  </div>
</nav>
     <center>
         <div class="container">
         <div class="table-responsive">
<table class="table">
  <thead>
    <tr>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Mobile</th>
      <th>Address</th>
      
    </tr>
  </thead>
  <tbody>
    <?php
        $contacts = $obj->contacts($uid);
        
      foreach ($contacts as $value) {       
          ?>
      <tr>
          <th><?php echo $value['firstname'] ?> </th>
     
          <th><?php echo $value['lastname'] ?> </th>
     
          <th><?php echo $value['mobile'] ?> </th>
      
          <th class="mapAddress"><a href="maps.php?address=<?php echo $value['address']?>"><?php echo $value['address']?></a></th>
          <th><a href="edit.php?address=<?php echo $value['address']?>&mobile=<?php echo $value['mobile']?>"><span class="glyphicon glyphicon-pencil"></span></a></th>
          <th><a href="delete.php?address=<?php echo $value['address']?>&mobile=<?php echo $value['mobile']?>"><span class="glyphicon glyphicon-remove-sign"></span></a></th>
      </tr>
      
      <?php
      } 
  ?>
  </tbody>
  </table>
         </div>
         </div>
         </center>
</div>
</body>
</html>


