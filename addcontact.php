<?php
session_start();
include_once 'coonect.php';
$user = new connect();
$uid = $_SESSION['id'];
if (isset($_REQUEST['submit'])){
    extract($_REQUEST);
$user_c = $user->con_reg($firstname,$lastname,$number,$address,$pincode,$uid);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>contact list</title>
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
        <li ><a href="home.php">Home</a></li>
        <li class="active"><a href="addcontact.php">Add Contacts</a></li>
        <li><a href="list.php">My Contact List</a></li>
    </ul>
  </div>
</nav>
  <h2>ADD NEW CONTACTS</h2>
  <form class="horizontal form" action="" method='POST'  role="form">
    <div class="form-group">
        <label class="control-label col-sm-2" for="firstname">Firstname:</label>
      <div class="col-sm-10">
          <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter firstname"><br>
      </div>
    </div>
      <br><br><br>   
     <div class="form-group">
     <label class="control-label col-sm-2" for="lastname">Lastname:</label>
      <div class="col-sm-10">          
          <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter lastname"><br>
      </div>
    </div>
      <br><br>
      <div class="form-group">
     <label class="control-label col-sm-2" for="mobile">Mobile No.</label>
      <div class="col-sm-10">          
          <input type="tel" class="form-control" id="mobile" name="number" placeholder="Enter Mobile Number"><br>
      </div>
    </div>
      <br><br>
      
    <div class="form-group">
     <label class="control-label col-sm-2" for="address">Address</label>
      <div class="col-sm-10">          
          <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" ><br>
      </div>
    </div>
     <div class="form-group">
     <label class="control-label col-sm-2" for="address">latitude</label>
      <div class="col-sm-10">          
          <input type="text" class="form-control" id="lat" name="lat" placeholder="latitude" ><br>
      </div>
     
    </div>
      <div class="form-group">
     <label class="control-label col-sm-2" for="address">Pincode</label>
      <div class="col-sm-10">          
          <input type="text" class="form-control" id="postal_code" name="pincode" placeholder="pincode"><br>
      </div>
      </div>
       <div class="form-group">
     <label class="control-label col-sm-2" for="address">longitude</label>
      <div class="col-sm-10">          
          <input type="text" class="form-control" id="long" name="long" placeholder="Longitude"><br>
      </div>
     
    </div>
      <input type="hidden" name="uid" value="<?php echo $uid;?>" />
      <br><br>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default" name="submit">Submit</button>
      </div>
        
    </div>
      
  </form>
</div>
<script>

var placeSearch, autocomplete;
var componentForm = {
  postal_code: 'long_name'
};

function initAutocomplete() {
  autocomplete = new google.maps.places.Autocomplete(
      (document.getElementById('address')),
      {types: ['geocode']});

  autocomplete.addListener('place_changed', fillInAddress);
}


function fillInAddress() {
    console.log("test 1");
  var place = autocomplete.getPlace();
  console.log("test 2");
    console.log(place);
    console.log("test 3");
    console.log(componentForm);
    console.log("test 4");
  for (var component in componentForm) {
      console.log(component);
      console.log(document.getElementById(component));
    document.getElementById(component).value = '';
    document.getElementById(component).disabled = false;
  
        }
   var geocoder = new google.maps.Geocoder();
    var address = document.getElementById('address').value;
    
    
    
    geocoder.geocode( { 'address': address}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
        var latitude = results[0].geometry.location.lat();
        var longitude = results[0].geometry.location.lng();
        document.getElementById('lat').value = latitude;
        document.getElementById('long').value = longitude;
        alert(longitude);
        } 
    });
  for (var i = 0; i < place.address_components.length; i++) {
    var addressType = place.address_components[i].types[0];
    if (componentForm[addressType]) {
      var val = place.address_components[i][componentForm[addressType]];
      document.getElementById(addressType).value = val;
    }
  }
}


 


    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBbg2QKOHlYX34ALd8azY7oS5oqV1tKdX0&signed_in=true&libraries=places&callback=initAutocomplete"
        async defer>
    </script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
  </body>
</html>