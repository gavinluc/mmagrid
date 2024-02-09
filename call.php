<?php
    session_start();
	$fighter = $_POST['Figher'];
    $servername = "localhost";
    $username="checker";
    $password = "help";
    $dbname = "ufc";
    echo $fighter; echo "<br>";
    $conn = new mysqli($servername, $username, $password,$dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
    echo "Connected successfully"; echo "<br>";

    $sql = "SELECT * FROM `fightdata` WHERE f_1 =\"4089\" AND f_2 = $fighter OR  f_1 = $fighter AND f_2 = \"4089\";";
    $result  = $conn -> query($sql);
    $row = mysqli_fetch_assoc($result);
    if ($row ===NULL){
        echo "retard";
    }
    else {
        echo "nice";
    }
?>