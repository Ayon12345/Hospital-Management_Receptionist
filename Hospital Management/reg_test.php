<!DOCTYPE html>
<html>
    
    <body>
        <?php

$host = "localhost";
$username = "wtj_user_1";
$password = "123";
$dbname = "wtj";

$conn1 = new mysqli($host , $username, $password, $dbname);
  $res1 = $conn1 -> connect_errno;


  if ($res1) {

 echo "Database  connection failed !!" ;
  }
 else{

echo "Database connection successfull !!" ;
 }



            $firstname = $lastname = $gender = $email = $username = $password = $rec_email ="";
            $emptyfirstname = $emptylastname= $emptygender = $emptyemail = $emptyusername = $emptypassword = $emptyrec_email = $notavailable = "";

            if($_SERVER['REQUEST_METHOD'] == "POST") {

                if(empty($_POST['fname'])) {
                     $emptyfirstname = "Please Fill up the firstname!";
                }

                else if(empty($_POST['lname'])) {                    
                    $emptylastname = "Please Fill up the lastname!";
                    
                }

                else if(empty($_POST['gender'])) {                    
                    $emptygender= "Please Fill up the gender!";
                    
                }

                else if(empty($_POST['e-mail'])) {                    
                   $emptyemail = "Please Fill up the email!";
                    
                }

                else if(empty($_POST['uname'])) {                    
                   $emptyusername  = "Please Fill up the username!";
                }

                else if(empty($_POST['pass'])) {                    
                   $emptypassword = "Please Fill up the password!";
                }

                else if(empty($_POST['remail'])) {                    
                   $emptyrec_email = "Please Fill up the recovery email!";
                }

                else {

                    $firstname = $_POST['fname'];
                    $lastname = $_POST['lname'];
                    $gender = $_POST['gender'];
                    $email = $_POST['e-mail'];
                    $username = $_POST['uname'];
                    $password = $_POST['pass'];
                    $rec_email = $_POST['remail'];
        

                   }

                      


                   $stmt1 = $conn1->prepare("insert into test (firstname,lastname,gender,email,username,password,rec_email) values (?,?,?,?,?,?,?)");
                   $stmt1->bind_param("sssssis",$firstname,$lastname,$gender,$email,$username,$password,$rec_email);
                   $status = $stmt1->execute(); 
                   


                     
            }
        ?>

      

        <h1 style="background-color:DodgerBlue;">Registration Form</h1>
        <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

            <fieldset>
               <legend><h2 style="background-color:Violet;">Basic Information</h2></legend>

                <label for="firstname">First Name:</label>
                <input type="text" name="fname" id="firstname">
                <?php echo $emptyfirstname; ?>

                <br>

                <label for="lastname"> LastName:</label>
                <input type="text" name="lname" id="lastname">
                <?php echo $emptylastname; ?>

                <br>

                <label for="gender">Gender:  </label>
                <input type="radio" name="gender" id="male" value="male">  
                <label for="gender">Male </label>
                <input type="radio" name="gender" id="female" value="female">
                <label for="gender">Female </label>
                <input type="radio" name="gender" id="other" value="other">
                <label for="gender">Other </label>
                <?php echo $emptygender; ?>

                <br>

                <label for="email">Email:</label>
                <input type="email" placeholder="example@gmail.com" id="email" name="e-mail">
                <?php echo $emptyemail; ?>

            </fieldset>

            <fieldset>
             <legend> <h2 style="background-color:Violet;">Account Information</h2></legend>

                <label for="username">Username:</label>
                <input type="text" name="uname" id="username">
                <?php echo $emptyusername; echo $notavailable; ?>

                <br>

                <label for="parmanent_address">Password:</label>
                <input type="password" name="pass" id="password">
                <?php echo $emptypassword; ?>

                <br>

                <label for="rec_email">Recovery email:</label>
                <input type="email" id="rec_email" name="remail">
                <?php echo $emptyrec_email; ?>
                
                </fieldset>

            <input type="submit" value="Submit" > 
        </form>
        
    </body>
</html>