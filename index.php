<?php
session_start();
include_once 'coonect.php';
$user = new connect();
if(isset($_REQUEST['submit'])){
extract($_REQUEST);
$login = $user->check_login($email,$password);
if($login)
{
header("location:home.php");
}else
 {
echo'wrong username or password';
 }
 }
?>
<html>
<meta http-equiv="Content type" content="text/html charset=utf-8"/>
<style>
    #container{width:400px; margin:0 auto;}
</style>
<script type="text/javascript" language="javascript">
    function submitlogin(){
        var form = document.login;
        if(form.email.value == ""){
            alert("enter email or username");
            return false;
            }
    }
    </script>
    <span style="font-family:'Courier 10 Pitch',Courier, monospace;
          font-size:15px ; font-style: normal ;line-height: 1.5;">
        
    </span>
    
                  <form action="" method="post" name="login">
                  
                <div id="container">
                     <h2>LOGIN PAGE</h2>
                  <div class="table-responsive">
                     
                      
                      <table class="table">
    
                  <tbody>
                      <tr>
                          <th>Email</th>
                          <td><input type="text" name="email" required=""/></td>
                      </tr>
                      <tr>
                          <th>Password</th>
                          <td><input type="password" name="password" required=""/></td>
                          </tr>
                          <tr>
                              <th>Remember me</th>
                              <td>
                                  <input type="checkbox" name="Remember Me" required=""/></td>
                          </tr>
                          <tr>
                              <th></th>
                              <td><input onclick="return(submitlogin());" type="submit" name="submit" value="login"/></td>
                              
                          </tr>
                          <tr>
                              <td></td>
                              <td><a href="registeration.php"> Register New user</a></td>
                          </tr>
                          </tbody>
                          
              </table>
                      </div></div></form>
    </html>
    
