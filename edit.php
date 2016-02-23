<?php
session_start();
      include 'coonect.php';
      $obj = new connect();
      $uid = $_SESSION['id'];
      $number = $_GET['mobile'];
      $address = $_GET['address'];
      $icon = $obj->icon($number,$address);
      foreach($icon as $value){
          echo $value['firstname'];
      }
      ?>
