<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit-test</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/history.css?v=<?php echo time(); ?>">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@200;400;700&display=swap" rel="stylesheet">

</head>

<body>
    <!--Header-->
    <header id="head">
        <div class="container">
            <a href="index.html" class="logo">
                <i class="fa-solid fa-building-columns fa-3x"></i>

                <h1>Local Bank</h1>

            </a>
            <nav>
                <i class="fas fa-bars toggle-menu"></i>
                <ul>
                    <li> <a href="index.html">Home </a></li>
                    <li> <a href="services.html">Services </a></li>

                    <li> <a href="#">About </a></li>

                </ul>

            </nav>
        </div>
    </header>
        <div class="tab">
        <h2>Transaction History </h2>
        <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
            
                $conn = mysqli_connect($servername, $username, $password,"mno_bank");

                $sql = "SELECT * FROM transaction_history";
                $result = $conn->query($sql);
                 
                echo "<table>";
                        echo "<tr>";
                        echo "<th>Trans.ID</th>";
                        echo "<th>Sender Name</th>";
                        echo "<th>Receiver Name</th>";
                        echo "<th>Amount ($)</th>";
                        echo "<th>Date</th>";
                        echo "</tr>";
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["SNo"] . "</td><td>" . $row["Sender_Name"] . "</td><td>" . $row["Receiver_Name"] . "</td><td>" . $row["Amount"] . "</td><td>" . $row["Date"] . "</td></tr>";    
                    }
                echo "</table>";
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>

        </div>
       
   
    <div class="footer">
        <div class="text">
            &copy; 2022 <span>MohamedEmad</span> All Right Reserved
        </div>
    </div>





</body>

</html>