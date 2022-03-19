<?php

  

    $Sender_Name=$_POST['sender'];
    $Receiver_Name=$_POST['receiver'];
    $Amount=$_POST['amount'];

   
        $servername = "localhost";
        $username = "root";
        $password = "";
        
        $conn = mysqli_connect($servername, $username, $password,"mno_bank");
        $sql = "SELECT Balance FROM all_users WHERE name='$Sender_Name'";
    $result = $conn->query($sql);
    $flag=false;
   
    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    if($Amount>$row["Balance"] or $row["Balance"]-$Amount<100 || ($Sender_Name==$Receiver_Name) ){
        echo '<script>alert("Transaction Failed , Insuffiecent Balance Or Receiver Name Equal To The Sender!!"); window.location.href=" transfer_html.php";</script>';
    
    }
    else{
        $sql = "UPDATE `all_users` SET Balance=(Balance-$Amount) WHERE Name='$Sender_Name'";
        

    if ($conn->query($sql) === TRUE) {
    $flag=true;
    } else {
    echo "Error updating record: " . $conn->error;
    }
    }
    
    }
    } else {
    echo "0 results";
    } 

    if($flag==true){
    $sql = "UPDATE `all_users` SET Balance=(Balance+$Amount) WHERE name='$Receiver_Name'";

    if ($conn->query($sql) === TRUE) {
    $flag=true;  
    
    } else {
    echo "Error updating record: " . $conn->error;
    }
    }
    if($flag==true){
        $sql = "insert into transaction_history(SNo, Sender_Name, Receiver_name, Amount, Date) values(0, '$Sender_Name', '$Receiver_Name', $Amount, Now())";
    if ($conn->query($sql) === TRUE) {
      
    } else 
    {
    echo "Error updating record: " . $conn->error;
    }
    }
   
    if ($flag==true) {
        echo '<script>alert("Successful Transaction!"); window.location.href=" transaction.php";</script>';
    }
    else {
        echo '<script>alert("Transaction Failed , Insuffiecent Balance!!"); window.location.href=" transfer_html.php";</script>';
    }

    
    
  
   
     
     /*   mysqli_query($conn,"update all_users set Balance=Balance-$Amount where Name='$Sender_Name'");
        mysqli_query($conn,"update all_users set Balance=Balance+$Amount where Name='$Receiver_Name'");

        $sql = "insert into transaction_history(SNo, Sender_Name, Receiver_name, Amount, Date) values(0, '$Sender_Name', '$Receiver_Name', $Amount, Now())";
          
        if ($conn->query($sql) === TRUE) {
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          } 
        $conn->close();
        */
?>



