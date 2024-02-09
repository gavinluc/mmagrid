<?php
    include 'dbh.php';
$sql3 = "SELECT * FROM `fightdata` WHERE (f_1 = \'512\' OR f_2 = \'512\'  ) AND weight_class = \"Welterweight\";";
    $res3 = $conn->query($sql3); 
    $r3 = mysqli_fetch_assoc($res3);
    if ($r3  !== NULL ){
        $A = TRUE;
    } 
?>