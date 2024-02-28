<?php
    include "dbh.php";
    $querypull= "SELECT query FROM `q_all` WHERE ind = 63";
    $qRes= $conn ->query($querypull);
    $row= mysqli_fetch_array($qRes);
    $ConArr = $conn->query($row[0]);
    $O1Set= array();
    while ($row = mysqli_fetch_array($ConArr)) {
        $O1Set[] = $row[0];
    }

   
    $querypull= "SELECT query FROM `q_all` WHERE ind = 59";
    $qRes= $conn ->query($querypull);
    $row= mysqli_fetch_array($qRes);
    $ConArr = $conn->query($row[0]);
    $ASet= array();
    while ($row = mysqli_fetch_array($ConArr)) {
        $ASet[] = $row[0];
    }
    $Numba[0]=512;
    if (in_array($Numba[0],array_intersect($O1Set,$ASet))){
        echo "Nice";
    }
    else {
        echo "Retard";
    }
?>