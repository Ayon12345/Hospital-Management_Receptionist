<!DOCTYPE html>

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




         $serial= $testname = $price="";
         $emptyserial =$emptytestname = $emptyprice ="";

         if($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['button'] == "Submit") {

            if(empty($_POST['serial'])) {                    
                $emptyserial = "Please Fill up the serial & Try again!";
            }

            if(empty($_POST['uname'])) {                    
                $emptytestname = "Please Fill up the Patient Name & Try again!";
            }

            else if(empty($_POST['price'])) {                    
                $emptyprice = "Please Fill up the date & try again!";
            }
         else{
            $serial = $_POST['serial'];  
            $testname = $_POST['uname'];
            $price = $_POST['price'];
              
         }
         $stmt2 = $conn1->prepare("insert into test_list (serial,testname,testprice) values (?,?,?)");
         $stmt2->bind_param("iss",$serial,$testname,$price);
         $status = $stmt2->execute(); 
     
        } 
      
          
        if($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['button'] == "Delete") {
            $serial = $_POST['serial'];  
            $username = $_POST['uname'];
            $date = $_POST['price'];

            mysqli_select_db($conn1,'wtj');
            $sql = "DELETE FROM test_list WHERE serial ='$serial' ";

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
            $testname = $_POST['uname'];
            $price = $_POST['price'];
              
            
            mysqli_select_db($conn1,'wtj');
            $sql = "UPDATE test_list SET testname = '$testname',testprice='$price' WHERE serial ='$serial' ";

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
      
      <div class="title3">

      <?php



mysqli_select_db($conn1,'wtj');

$q ="SELECT * FROM test_list ";

 $n = mysqli_query($conn1,$q);

   echo "<table border = '2'>";

  while( $data = mysqli_fetch_row($n) ){

    echo "<tr>";
echo "<td> $data[0]</td><td>$data[1]</td><td>$data[2]</td><td>$data[3]</td>";

   echo "</tr>";
}
echo "</table>";


?>


      
<form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

<style>
.label {
position: relative;
top: -350px ;
right: -630px;
width: 200px;
height:28px ;

}

.butoon{

  position: relative;
top: -50px ;
right:-150px ;
width:200px ;
height:28px ;


}

</style>
         <div class="label">
              <label for="serial">Serial: </label>
                <input  type="text" name="serial" id="serial" class="butoon">
                 <?php echo $emptyserial; ?>
                 
                 </div>
                 <br>

                 <div class="label">
            
                <label for="testname">Name:</label>
                <input  type="text" name="uname" id="testname" class="butoon">
                 <?php echo $emptytestname; ?>
                 </div>

       <br>

       <div class="label">
        <label for="price">Price:</label>

<input type="text" name="price"  id="price" class="butoon" >

 <?php echo $emptyprice; ?>
 </div>


 <style>
.but {
position: relative;
top: -350px ;
right: -630px;
width: 80px;
height:28px ;

}

</style>
    
                <br>
            
                <input type="submit" value="Submit" name="button" onclick="myFunction()" class="but">
                <input type="submit" value="Update" name="button" onclick="myFunction()" class="but">
                <input type="submit" value="Delete" name="button" class="but">
                <input type="submit" value="Search" name="button" class="but">
                </div>
       



            <?php


if($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['button'] == "Search") {
  echo "Successfull";
header("Location: search_test.php");
}
?>

      









    
        </div>
      </div>



    <script>

function myFunction() {

//Name
var serial = document.getElementById("serial").value;


if (serial == null || serial == "") {
    alert("Serial can't be blank");
}

//TestName
var testname = document.getElementById("testname").value;


if (testname == null || testname == "") {
    alert("Testname can't be blank");
}

//Price
var price = document.getElementById("price").value;


if (price == null || price == "") {
    alert("Price can't be blank");
}




}

</script>

  </body>
</html>