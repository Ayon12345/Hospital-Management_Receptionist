<!DOCTYPE html>
<html>
    
    <body>
        <?php
        session_start(); 
   
        $host = "localhost";
        $username = "wtj_user_1";
        $password = "123";
        $dbname = "wtj";
        
        $conn = new mysqli($host , $username, $password, $dbname);
           $res2 = $conn -> connect_errno;
        
        
          if ($res2) {
        
         echo "Database  connection failed !!" ;
           }
          else{
        
         echo "Database connection successfull !!" ;
          }

           
          $sender = $reciver = $text ="";
          $emptysender = $emptyreciver= $emptytext = "";

          if($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['button'] == "Sign Up") {

              if(empty($_POST['sender']) || empty($_POST['reciver']) || empty($_POST['text'])  ) {
                   $emptysender = "Please Fill up the firstname!";
                   $emptyreciver = "Please Fill up the lastname!";
                   $emptytext= "Please Fill up the gender!";
                 
    
              }

           

              else {

                  $sender = $_POST['sender'];
                  $reciver = $_POST['reciver'];
                  $text = $_POST['text'];
                 

        
          
                    
                  }
                  
                  

                  $stmt = $conn->prepare("insert into chat (sender,reciver,text) values (?,?,?)");
                  $stmt->bind_param("sss",$sender,$reciver,$text);
                  $status = $stmt->execute(); 
                   
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
        
      <h1 style="background-color:DodgerBlue;">Registration Form</h1>
        <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

            <fieldset>
               <legend><h2 style="background-color:Violet;">Basic Information</h2></legend>

                <label for="sender">Sender:</label>
                <input class="center-block" type="text" name="sender" id="sender">
                <?php echo $emptysender; ?>

                <br>

                <label for="reciver"> reciver</label> 
                <input class="center-block" type="text" name="reciver" id="reciver">
                <?php echo $emptyreciver; ?>

                <br>

                <label for="text"> Text</label> 
                <input class="center-block" type="text" name="text" id="text">
                <?php echo $emptytext; ?>
                
                </fieldset>
                <input class="center-block" type="submit" value="Sign Up"  name="button" button style="margin:20px;">
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


   
  </body>
</html>
          











  


