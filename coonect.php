<?php
 include 'config.php';
   class connect {
      
      public $db;
      public $firstname;
      public $lastname;
      public $email;
      public function __construct(){
           $this->db = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
      if (mysqlI_connect_error()){
            echo "Error: Can't connect to database.";
      exit;}
      }
      
     public function login($email,$password){
        $pass = hash('md5',$password);
      $sql="SELECT * FROM register WHERE email='$email'";
      $check= $this->db->query($sql);
      $count_row =$check ->num_rows;
      
      if ($count_row == 0){
          $sql1 = "INSERT INTO register  SET Firstname='$first' , lastname='$last' ,password='$pass' , user='$email' ";
      $result = mysqli_query($this->db,$sql1)or die(mysql_connect_errno()."DATA can't b inserted");
      return $result;
      }
      else{return FALSE;}
     }
     
     public function reg_user($first,$last,$email,$password){

			$password = md5($password);
			$sql1="INSERT INTO register SET email='$email', pass='$password', first='$first', last='$last',id='0'";
			$result = mysqli_query($this->db,$sql1);
                        if(!$result)
                        {
                            echo mysqli_connect_error();
                        }
        		return $result;
		}
                
     public function check_login($email,$password){
         $password= md5($password);
     $sql2="SELECT id from register WHERE email='$email' and pass='$password'";
     $result = mysqli_query($this->db,$sql2);
     $user_data = mysqli_fetch_array($result);
     $count_row = $result-> num_rows;
     
     if($count_row == 1){
         $_SESSION['login']= true;
         $_SESSION['id']= $user_data['id'];
         return true;
         }
     else{
         return false;
     }
     }
     public function get_fullname($id)
     {
         $sql3="SELECT fullname FROM register WHERE id = $id";
         $result = mysqli_query($this->db ,$sql3);
         $user_data = mysqli_fetch_array($result);
         echo $user_data['fullname'];
     }
     public function get_session(){
         return $_SESSION['login'];
     }
         public function user_logout(){
             $_SESSION['login']= FALSE;
             session_destroy();
         }
       public function con_reg($firstname,$lastname,$number,$address,$pincode,$uid)
         {
         $sql4 = "INSERT INTO `mycontactlist` SET firstname='$firstname', lastname='$lastname',number='$number',address='$address',pincode=$pincode,userid=$uid ";
       $result = mysqli_query($this->db,$sql4);
          if (!$result){
              echo mysqli_error($this->db);
          }
         return $result;
         }
               
               
               
         public function contacts($uid){
            $sql5 = "SELECT * FROM `mycontactlist` WHERE userid = $uid";
            $result = mysqli_query($this->db,$sql5);       
         $i = 0;
            $contacts =array();
            while($row = mysqli_fetch_assoc($result)){
                        $contacts[$i] = array(
                        "firstname"=> $row['firstname'],
                        "lastname"=> $row['lastname'],
                        "address" => $row['address'],
                        "mobile" => $row['number'],
                        );                
                $i++;
            } 
            return $contacts;
            }
            public function logout(){
                session_start();
                session_destroy();             
                
            }
            public function pencil_icon($firstname,$lastname,$number,$address){
                $sql6= "UPDATE mycontactlist SET firstname=$firstname lastname=$lastname mobile=$number address=$address";
                $result = mysql_query($this->db,$sql6);
                if (!$result){
              echo mysqli_error($this->db);
          }
         return $result;
         }
         public function icon($number,$address){
            $sql7 = "SELECT * FROM `mycontactlist` WHERE number=$number and address='$address'";
            $result = mysqli_query($this->db,$sql7);  
            $i = 0;
            $icon =array();
            while($row = mysqli_fetch_assoc($result)){
                        $icon[$i] = array(
                        "firstname"=> $row['firstname'],
                        "lastname"=> $row['lastname'],
                        "address" => $row['address'],
                        "mobile" => $row['number'],
                        );                
                $i++;
            } 
            return $icon;
         }
         public function delete_icon($number,$address){
             $sql8 = "DELETE FROM `mycontactlist`WHERE number=$number and address='$address'";
             $result = mysqli_query($this->db,$sql8); 
             if (!$result){
              echo mysqli_error($this->db);
          }
          header('location:list.php');
         return $result;
        }
                }
    
       
    
     
    
      
      
     