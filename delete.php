<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
      include 'coonect.php';
      $obj = new connect();
      $uid = $_SESSION['id'];
      $number=$_GET['mobile'];
      $address=$_GET['address'];
      $delete_icon = $obj->delete_icon($number,$address);
?>
