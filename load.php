<?php
    $dd = $_POST['id'];
    include 'dbh.php';
   
    $day =3;
    
    $sql = "SELECT $dd FROM `q_daily` WHERE day = $day";
    $res= $conn->query($sql);
    $row= mysqli_fetch_array($res);
    
    $sql = "SELECT meaning from `q_all` WHERE ind = $row[0]";
    $res= $conn->query($sql);
    $row= mysqli_fetch_array($res);
   
    echo $row[0];
?>