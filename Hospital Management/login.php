<!DOCTYPE html>
<html>
    <body>
    <!DOCTYPE html>
    <?php
    session_start();

 $host = "localhost";
$username = "wtj_user_1";
$password = "123";
$dbname = "wtj";

$conn1 = new mysqli($host , $username, $password, $dbname);
  $res1 = $conn1 -> connect_errno;


  //if ($res1) {

 //echo "Database  connection failed !!" ;
  //}
 //else{

//echo "Database connection successfull !!" ;
 //}

$username = $password ="";
$emptyusername = $emptypassword ="";

if($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['button'] == "Login") {

    if(empty($_POST['uname']) ||  !preg_match("/^[a-zA-Z-' ]*$/", $username)) {                    
        $emptyusername = "Please Fill up the Username!";
    }

    else if(empty($_POST['password'])) {                    
        $emptypassword = "Please Fill up the password!";
    }

       
    else {

        $username = $_POST['uname'];
        $password = $_POST['password'];

        mysqli_select_db($conn1,'wtj');
        $s = "select * from test where username ='$username' && password = '$password' ";

    $result = mysqli_query($conn1,$s);
    $num = mysqli_num_rows($result);

    if($num==1){
    
      $stmt1 = $conn1->prepare("insert into login_table (username,password) values (?,?)");
      $stmt1->bind_param("ss",$username,$password);
      $status = $stmt1->execute();
      $_SESSION['username'] = $username;
      
      
        header('location:profiledetails.php');
         
    }
    else{

      echo "Wrong Password !! Try Again!" ;
    //  header('location:login.php');
    }
          
    }

  

    

     


}

if($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['button'] == "Sign Up") {
    header("Location: registration.php");
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


      <h1 style="background-color:DodgerBlue;">Receptionist Login </h1>
        <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

            <fieldset>
              
            
                <label for="username">Username:</label> 
                <input type="text" name="uname" id="username" size="30">
                <?php echo $emptyusername; ?> 

                <br>
        </br>

                <label for="password">Password :</label>
                <input type="password" name="password" id="password" size="30">
                <?php echo $emptypassword; ?>
                
                </fieldset>

            <input type="submit" value="Login" name="button" onclick="myFunction()" button style="margin:20px;">
            
            

            <input type="submit" value="Sign Up" name="button" button style="margin:20px;">

        </form>

        
        <a href="recover.php"><button> Forgot Password</button></a>
     
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

    
var name = document.getElementById("username").value;
if (name == null || name == "") {
    alert("FirstName can't be blank");
}

var pass = document.getElementById("password").value;


if (pass == null || pass == "") {
    alert("Password can't be blank");
}
  







  }

</script>


  </body>
</html>
