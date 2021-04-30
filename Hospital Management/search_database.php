<?php
        session_start(); 
   
        $host = "localhost";
        $username = "wtj_user_1";
        $password = "123";
        $dbname = "wtj";
        
        $conn2 = new mysqli($host , $username, $password, $dbname);
           $res2 = $conn2 -> connect_errno;
    
           mysqli_select_db($conn2,'wtj');
           $sql = "SELECT * FROM test_list WHERE testname LIKE '%".$_POST['name']."%' OR serial LIKE '%".$_POST['name']."%'  OR testprice LIKE '%".$_POST['name']."%' " ;

           $result = mysqli_query($conn2,$sql);

           if(mysqli_num_rows($result)>0){
            while ($row=mysqli_fetch_assoc($result)) {
                echo "	<tr>
                          <td>".$row['id']."</td>
                          <td>".$row['serial']."</td>
                          <td>".$row['testname']."</td>
                          <td>".$row['testprice']."</td>
                          
                        </tr>";
            }
        }
        else{
            echo "<tr><td>0 result's found</td></tr>";
        }
        
        ?>