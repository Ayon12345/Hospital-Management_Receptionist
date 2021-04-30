<!DOCTYPE html>
<html>
     <body>

     <?php



session_start(); 

$host = "localhost";
$username = "wtj_user_1";
$password = "123";
$dbname = "wtj";

$conn1 = new mysqli($host , $username, $password, $dbname);
 $res1 = $conn1 -> connect_errno;

           $newusername= $newpassword = $conpassword ="";
           $emptynewusername = $emptynewpassword = $emptyconpassword ="";

            if($_SERVER['REQUEST_METHOD'] == "POST" ) {
              if(empty($_POST['newusername'])) {                    
                $emptynewusername = "Please Fill up the Username!";
            }
        
            else if(empty($_POST['newpassword']) ) {                    
                $emptynewpassword = "Please Fill up the password!";
            }
              


            else if(empty($_POST['conpassword'])  ) {                    
              $emptyconpassword = "Please Fill up the password!";
          }

          else if(($_POST['newpassword'] != $_POST['conpassword'])){
                  $emptyconpassword = "Password Doesn't match" ;
                      }


            else {

                    $newusername = $_POST['newusername'];
                    $newpassword = $_POST['newpassword'];

                    mysqli_select_db($conn1,'wtj');
                    $s = "UPDATE test SET password = '$newpassword' WHERE username ='$newusername' ";

                     mysqli_query($conn1,$s);
                    
                
                    if(mysqli_affected_rows($conn1)==1){
                    
                         
                    //    header('location:login.php');
                         
                    }

                    else {
                      echo "Wrong username!" ;

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
                        <li><a href="Home.html">Home</a></li>
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
                  <div class="title3">



                  <h1 style="background-color:DodgerBlue;">Recover Password </h1>
                 <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

            <fieldset>
                 


              <label for="username">Username:</label>
                <input type="text" name="newusername" id="username">
                <?php echo $emptynewusername; ?>
                

                <br>
              <label for="password">Password   :</label>
                <input type="password" name="newpassword" id="password">
                <?php echo $emptynewpassword; ?>
              
                <br>


                <label for="conpassword">Con Pass :</label>
                <input type="password" name="conpassword" id="password">
                <?php echo $emptyconpassword; ?>

                </fieldset>

              <input class="btn" type="submit" value="confirm" name="button" onclick="myFunction()" button style="margin:20px;">

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

                     function myFunction(){

                        //Namme
                  var username = document.getElementById("username").value;

                 if (username == null || username == "") {
                alert("Username can't be blank");
                     }
               
               //password
var password = document.getElementById("password").value;


if (password == null || password == "") {
    alert("password can't be blank");
}

         //password
         var conpassword = document.getElementById("password").value;


if (password == null || password == "") {
    alert("Confirm password!!!!");
}



                     }
                   </script>







              </body>
            </html>


   

        
        
  