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
 if ($res1) {

 echo "Database  connection failed !!" ;
  }
 else{

echo "Database connection successfull !!" ;
 }




         $serial=$username = $date="";
         $emptyserial =$emptyusername = $emptydate ="";

         if($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['button'] == "Submit") {

            if(empty($_POST['serial'])) {                    
                $emptyserial = "Please Fill up the serial & Try again!";
            }

            if(empty($_POST['uname'])) {                    
                $emptyusername = "Please Fill up the Patient Name & Try again!";
            }

            else if(empty($_POST['date'])) {                    
                $emptydate = "Please Fill up the date & try again!";
            }
         else{
            $serial = $_POST['serial'];  
            $username = $_POST['uname'];
            $date = $_POST['date'];
              
         }
         $stmt2 = $conn1->prepare("insert into appoinment (serial,username,date) values (?,?,?)");
         $stmt2->bind_param("iss",$serial,$username,$date);
         $status = $stmt2->execute(); 



           
        } 
         

        if($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['button'] == "Delete") {
            $serial = $_POST['serial'];  
            $username = $_POST['uname'];
            $date = $_POST['date'];

            mysqli_select_db($conn1,'wtj');
            $sql = "DELETE FROM appoinment WHERE serial ='$serial' ";

             mysqli_query($conn1,$sql);
            
        
         if(mysqli_affected_rows($conn1)==1){
            
                 echo "successfully updated";
               // header('location:login.php');
                 
            }

            else {
              echo "Wrong Serial!" ;

            }
          

      }
    
                
        
         
    
        if($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['button'] == "Submit") {
              echo "Successfull";
            //header("Location: profiledetails.php");
        }

        if($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['button'] == "Update") {

            $serial = $_POST['serial'];  
            $username = $_POST['uname'];
            $date = $_POST['date'];
              
            
            mysqli_select_db($conn1,'wtj');
            $sql = "UPDATE appoinment SET username = '$username',date='$date' WHERE serial ='$serial' ";

             mysqli_query($conn1,$sql);
            
        
         if(mysqli_affected_rows($conn1)==1){
            
                 echo "successfully updated";
               // header('location:login.php');
                 
            }

            else {
              echo "Wrong Serial!" ;

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
      <div class="title3">

<?php



mysqli_select_db($conn1,'wtj');

$q ="SELECT * FROM appoinment ";

 $n = mysqli_query($conn1,$q);

   echo "<table border = '2'>";

  while( $data = mysqli_fetch_row($n) ){

    echo "<tr>";
echo "<td> $data[0]</td><td>$data[1]</td><td>$data[2]</td><td>$data[3]</td>";

   echo "</tr>";
}
echo "</table>";


?>
  
 










  


      <h1 style="background-color:Green; text-align:center; color:white; ">Take an appoinment</h1>
<form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

              <label for="serial">Serial:</label>
                <input  type="text" name="serial" id="serial">
                 <?php echo $emptyserial; ?>
                 <br>
            
                <label for="username">Patient Name:</label>
                <input  type="text" name="uname" id="username">
                 <?php echo $emptyusername; ?>

       <br>

               
        <label for="date">Appoinment Date:</label>

<input type="date" id="date" name="date"


 >

 <?php echo $emptydate; ?>


            
                
                <br>
            
                <input type="submit" value="Submit" name="button" onclick="myFunction()" >
                <input type="submit" value="Update" name="button" onclick="myFunction()" >
                <input type="submit" value="Delete" name="button" >
              
       









      
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
var serial = document.getElementById("serial").value;


if (serial == null || serial == "") {
    alert("Serial can't be blank");
}

//Name
var username = document.getElementById("username").value;


if (username == null || username == "") {
    alert("Patient name can't be blank");
}



date = document.getElementById("date").value;
    
    
    if(date ==""){
    
    
  alert("select the date")


    }





}

  </script>
  </body>
</html>














