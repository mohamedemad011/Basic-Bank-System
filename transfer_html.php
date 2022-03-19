<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank System</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/transfer.css">

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

    <div class="transfer">

        <div class="container">
   

            <h2>Transfer Money</h2><br>

            <form action="transfer.php" method="POST">

                <div id="form"><label> Sender Name: </label>
                    <select name="sender" id="sender" required>
                        <option selected disabled>Select </option>
                        <?php
                        $Sender_Name=$_POST['sender'];
                            $db = mysqli_connect("localhost", "root", "", "mno_bank");
                            $res = mysqli_query($db, "SELECT * FROM all_users ");
                            while($row = mysqli_fetch_array($res)) {
                                echo("<option> "."  ".$row['NAME']."</option>");
                            }
                         ?>
                    </select><br><br>
                    <label> Receiver Name: </label>
                    <select name="receiver" id="receiver" required>
                        <option selected disabled>Select </option>
                        <?php
                       
                        $db = mysqli_connect("localhost", "root", "", "mno_bank");
                        $res = mysqli_query($db, "SELECT * FROM all_users");
                        while($row = mysqli_fetch_array($res)) {
                            echo("<option> "."  ".$row['NAME']."</option>");
                        }
                        ?>
                    </select>
                    <br> <br>

                    <label>Enter Amount: <input type="text" name="amount" required></label><br><br>
                    <button>Proceed</button>
                </div>
            </form>


        </div>
    </div>

    <div class="footer">
        <div class="text">
            &copy; 2022 <span>MohamedEmad</span> All Right Reserved
        </div>
    </div>





</body>

</html>