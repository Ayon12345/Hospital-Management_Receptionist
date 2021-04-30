<!DOCTYPE html>
<html>
    
    <body>
        <?php
   
        $host = "localhost";
        $username = "wtj_user_1";
        $password = "123";
        $dbname = "wtj";
        
        $conn2 = new mysqli($host , $username, $password, $dbname);
           $res2 = $conn2 -> connect_errno;
        
        
         // if ($res2) {
        
         //echo "Database  connection failed !!" ;
           //}
          //else{
        
         //echo "Database connection successfull !!" ;
          //}

           
          $firstname = $lastname = $email = $username = $rec_email ="";
          $emptyfirstname = $emptylastname= $emptyemail = $emptyusername = $emptyrec_email = $notavailable = "";

          if($_SERVER['REQUEST_METHOD'] == "POST") {

              if(empty($_POST['fname'])) {
                   $emptyfirstname = "Please Fill up the firstname!";
              }

              else if(empty($_POST['lname'])) {                    
                  $emptylastname = "Please Fill up the lastname!";
                  
              }

             

              else if(empty($_POST['e-mail'])) {                    
                 $emptyemail = "Please Fill up the email!";
                  
              }

              else if(empty($_POST['uname'])) {                    
                 $emptyusername  = "Please Fill up the username!";
              }

             

              else if(empty($_POST['remail'])) {                    
                 $emptyrec_email = "Please Fill up the recovery email!";
              }

              else {

                  $firstname = $_POST['fname'];
                  $lastname = $_POST['lname'];
                  
                  $email = $_POST['e-mail'];
                  $username = $_POST['uname'];
     
                  $rec_email = $_POST['remail'];

                    
                  mysqli_select_db($conn2,'wtj');
                  $sql = "UPDATE test SET firstname = '$firstname',lastname='$lastname',email='$email',rec_email='$rec_email' WHERE username ='$username' ";

                   mysqli_query($conn2,$sql);
                  
                  
              
                  if(mysqli_affected_rows($conn2)==1){
                      
                      echo "<br>";                 
                        echo "Profile Edited" ;
                        header('location:profiledetails.php');
                        
                       
                  }
                  else{

                    echo "error";
                  }




      

                
                
                    
                  }
                  
                  

           
                   
               }
              
                 
              
            
        ?>
       
      
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=B612:wght@400;700&display=swap"
      rel="stylesheet"
    />

    <title>Document</title>
  </head>

  <title>Document</title>
  </head>
  <body>
    <header class="header-area">
      <div class="title">
        <h1>Hospital Management System</h1>
      </div>

      <div class="navigation">
        <nav class="menu">
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#About">About Us</a></li>
            <li><a href="#Service">Service</a></li>
            <li><a href="#Contact">Contact Us</a></li>
            <li>
              <a href="loginAsA.php">Login</a>
              </li>
          </ul>
        </nav>
      </div>
    </header>
  

    <div class="banner-area">
      <div class="canvas">
      
      <div class="title">
        
      <h1 style="background-color:DodgerBlue;">Edit Profile</h1>
        <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

            <fieldset>
               <legend><h2 style="background-color:Violet;">Basic Information</h2></legend>

                <label for="firstname">First Name:</label>
                <input class="center-block" type="text" name="fname" id="firstname">
                <?php echo $emptyfirstname; ?>

                <br>

                <label for="lastname"> LastName:</label>
                <input class="center-block" type="text" name="lname" id="lastname">
                <?php echo $emptylastname; ?>
                <br>

               
                <label for="email">Email:</label>
                <input class="center-block" type="email" placeholder="example@gmail.com" id="email" name="e-mail">
                <?php echo $emptyemail; ?>

            </fieldset>

            <fieldset>
             <legend> <h2 style="background-color:Violet;">Account Information</h2></legend>

                <label for="username">Username(Main):</label>
                <input class="center-block" type="text" name="uname" id="username">
                <?php echo $emptyusername; echo $notavailable; ?>

                 <br>

                <label for="rec_email">Recovery email:</label>
                <input class="center-block" type="email" id="rec_email" name="remail">
                <?php echo $emptyrec_email; ?>
                
                </fieldset>

                <input class="center-block" type="submit" value="Change" name="button" onclick="myFunction()" button style="margin:20px;">
                
                


        </form>
 </div>
      </div>
      


    <div class="footer">
      <div class="container">
        <div class="footer-about col16">
          <h3>Us</h3>
          <li><a href="">Careers</a></li>
          <li><a href="">Team</a></li>
          <li><a href="">Work</a></li>
        </div>
        <div class="contact col16">
          <h3>Contact</h3>
          <li><a href="">www.hospital.com</a></li>
          <li><a href="">555-666-888</a></li>
          <li><a href="">Dhaka,Bangladesh</a></li>
        </div>
        <div class="social col16">
          <h3>Social</h3>
          <li><a href="">Facebook</a></li>
          <li><a href="">Twitter</a></li>
          <li><a href="">Instagram</a></li>
        </div>
        <div class="newsletter col30">
          <h2>join Us!</h2>
          <div class="input">
            <input type="text" />
          </div>
          <div class="search">
            <a href="">Subscribe</a>

            </div>
        </div>
      </div>
    </div>
         
    <script>

function myFunction() {

//Name
var name = document.getElementById("firstname").value;


if (name == null || name == "") {
    alert("FirstName can't be blank");
}


var lname = document.getElementById("lastname").value;


if (lname == null || lname == "") {
    alert("LastName can't be blank");
}



 


// Email

var email = document.getElementById("email").value;

if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email)) {
    console.log("Valid Email");
} else if (email == null || email == "") {
    alert("Email can't be blank");

} else
  alert("You have entered an invalid email address!")





var uname = document.getElementById("username").value;


if (uname == null || uname == "") {
    alert("UserName can't be blank");
}



var remail = document.getElementById("rec_email").value;

if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email)) {
    console.log("Valid Email");
} else if (remail == null || remail == "") {
    alert("Email can't be blank");

} else
  alert("You have entered an invalid email address!")

}

    </script>   


 









  </body>
</html>
          











  


