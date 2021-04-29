<?php
include("includes/header.php");
include("includes/config.php");
//echo file_get_contents("includes/Mainform.html");
$msg1="";$msg2=""; $msg3="";$msg4="";

$firstname='';
$lastname='';
$email='';
$password='';
$c_password='';
$image='';
if(isset($_POST["submit"]))
{
 $firstname=$_POST["fname"];
    $lastname=$_POST["lname"];
    $email=$_POST["mail"];
    $date=$_POST["dob"];
    $password=$_POST["pass"];
    $c_password=$_POST["rpass"];
    $image=$_FILES["image"]["name"];
    $tmp_image=$_FILES["image"]["tmp_name"];
    $checkbox=isset($_POST["check"]);
   // echo $firstname."</br>".$lastname."</br>".$email."</br>".$date."</br>".$password."</br>".$c_password."</br>".$image."</br>".$checkbox;
   if(strlen($password)<5) 
   {
       $msg1="<div class='error'>Password must atleast 5 character</div>";
       
   }
    else if($password!==$c_password){
       $msg2="<div class='error'>Password is not same</div>";
    }
    else if($checkbox==""){
        $msg3="<div class='error'>You have to Agree terms and conditions</div>";
    }
    else{
        mysqli_query($conn,"INSERT INTO users (first_name,last_name,mail,dob,password,img) VALUES(' ".$firstname. "','".$lastname."','".$email."','".$date."','".$password."','".$image."')");
        $msg4="<div class='success'>You are Successfully Registered</div>";
        $firstname='';$lastname='';$email='';$password='';$c_password='';$image='';
        }
    }

?>
<title>Sign Up Form</title>
</head>
<style type="text/css">
#body-bg
    {
        background: url("images/pic2.jpg") center no-repeat fixed;
    }
    .error{
        color:red;
        
    }
    .success{
        color: green;
    }
</style>
<body>
  <div class="container">
      <div class="login-form col-md-4 offset-md-4">
      
      <div class="jumbotron" style="margin-top:10px;padding-top:20px;">
          <h3 align="center">Sign Up Form</h3>
          <?php echo $msg4;?>
          <form method="post" enctype="multipart/form-data">
          <div class="form-group">
              <label>First Name :</label>
              <input type="text" name="fname" placeholder="First Name" class="form-control" value="<?php echo $firstname; ?>">
              </div>
               <div class="form-group">
              <label>Last Name :</label>
              <input type="text" name="lname" placeholder="Last Name" class="form-control" value="<?php echo $lastname; ?>">
              </div>
         <div class="form-group">
              <label>Email :</label>
              <input type="email" name="mail" placeholder="Your E-mail" class="form-control" value="<?php echo $email; ?>">
              </div>
              <div class="form-group">
              <label>Date of Birth :</label>
              <input type="date" name="dob" placeholder="date of birth" class="form-control" value="<?php echo $date; ?>">
              </div>
              <div class="form-group">
              <label>Password :</label>
              <input type="password" name="pass" placeholder="Password" class="form-control" value="<?php echo $password; ?>">
                  <?php echo $msg1; ?>
              </div>
              <div class="form-group">
              <label>Re-enter Password :</label>
              <input type="password" name="rpass" placeholder="Re-enter password" class="form-control" >
                  <?php echo $msg2; ?>
                 </div>
              
              <div class="form-group">
              <label>Profile Image :</label>
              <input type="file" name="image" value="<? php echo $image; ?>"/> 
              </div>
              <div class="form-group">
              <input type="checkbox" name="check"/>
                  I Agree the terms and conditions
                  <?php echo $msg3; ?>
              </div></br>
              <center><input type="submit" value="Submit" name="submit" class="btn btn-success"/></center>
                    
          </form>
            
          
           </div>
         </div>
</div>
</body>
</html>