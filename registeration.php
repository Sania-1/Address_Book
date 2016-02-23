<?php
include_once 'coonect.php' ; 
$user= new connect();
if(isset($_REQUEST['submit'])){
extract($_REQUEST);
$register =$user->reg_user($first,$last,$email,$pass);
if($register){
echo'Registeration successful<a href="index.php">click here</a> to login';
}
else{
echo 'Registeration failed.Email/username already exist.';
}
}
?>
<html>
<meta http-equiv="Content-Type" content="text/html"; charset=ISO-8859-1"/>
<style>
    #container{width:400px; margin:0 auto;}
</style>
<script type="text/javascript" language="javascript">
    function submitreg(){
        var form= document.reg;
    if(form.name.value == ""){
      alert("Enter Name");
      return false;
    }
    else if(form.uname.value== ""){
        alert("Enter Username");
        return false;
    }
    else if(form.upass.value== ""){
        alert("Enter password");
        return false;
    }
    else if(form.uemail.value== ""){
        alert("Enter email ");
        return false;
    }
    }
    </script>
    <form action="" method="post" name="reg">
    <div id="container">
        <h2>Register here</h2>
        
            <div table="table-responsive">
                
                
                <table class="table">
                <tbody>
                    <tr>
                        <th>First Name</th>
                        <td><input type="text" name="first" required=""/></td>
                    </tr>
                    <tr>
                        <th>Last Name</th>
                        <td><input type="text" name="last" required=""/></td>
                    </tr>
                            <tr>
                                <th>Email</th>
                                <td><input type="text" name="email" required=""/></td>
                            </tr>
                            <tr>
                                <th>Password</th>
                                <td><input type="password" name="pass" required=""/></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input onclick="return(submitregister());" type="submit" name="submit" value="Register" /></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><a href="index.php"> ALREADY REGISTERED </a></td>
                            </tr>
                </tbody>
              </table>
            
        
            </div>
    </div>
        </form>
    </html>


