<?php 
    
    $servername = "localhost";
    $username="checker";
    $password = "help";
    $dbname = "ufc";

   
    $conn = new mysqli($servername, $username, $password,$dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
      $sql = "SELECT fighter_id FROM goodnamefighter WHERE full_name = 'Kamaru Usman';";
    $result = $conn->query($sql);
    $rows = mysqli_fetch_assoc($result);
    $Numba=array_values($rows);
  
    $sql7 = "SELECT * FROM `fightdata` WHERE winner = '$Numba[0]' AND title_fight = \"T\" AND  num_rounds = \"5\";";    
    $res7 = $conn->query($sql7); 
    $r7 = mysqli_fetch_assoc($res7);
    if ($r7  !== NULL ){
        echo $Numba[0];
    }
?>