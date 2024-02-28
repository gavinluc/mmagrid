<?php
 include 'dbh.php';
 $sql = "SELECT * FROM q_daily WHERE day =1";
 $qRes=$conn ->query($sql);    
 while ($row = mysqli_fetch_array($qRes)) {
        $O1 = $row[1];
        $O2 = $row[2];
        $O3 = $row[3];
        $a = $row[4];
        $b = $row[5];
        $c = $row[6];
    }
       echo $O1."<br>";
       echo $O2."<br>";
       echo $O3."<br>";
       echo $a."<br>";
       echo $b."<br>";
       echo $c."<br>";

 ?>
