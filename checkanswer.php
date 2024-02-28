<?php
   include 'dbh.php';
     
    $fighterFullName = $_POST['Name'];
    $Box = $_POST ['Box'];
    $day =3;
    // fighter id of name submitted
    $sql = "SELECT fighter_id FROM goodnamefighter WHERE full_name = '$fighterFullName';";
    $result = $conn->query($sql);
    $rows = mysqli_fetch_assoc($result);
    $Numba=array_values($rows);

    //getting the appropriate queries
    
    $sql = "SELECT * FROM q_daily WHERE day =$day";
    $qRes=$conn ->query($sql);    
    while ($row = mysqli_fetch_array($qRes)) {
        $O1 = $row[1];
        $O2 = $row[2];
        $O3 = $row[3];
        $a = $row[4];
        $b = $row[5];
        $c = $row[6];
    }
    // looking for fight vs adesanya  1 condition
    $querypull= "SELECT query FROM `q_all` WHERE ind = $O1";
    $qRes= $conn ->query($querypull);
    $row= mysqli_fetch_array($qRes);
    $ConArr = $conn->query($row[0]);
    $O1Set= array();
    while ($row = mysqli_fetch_array($ConArr)) {
        $O1Set[] = $row[0];
    }
    
    
    // looking for welterweight fight   A condition
    $querypull= "SELECT query FROM `q_all` WHERE ind = $a";
    $qRes= $conn ->query($querypull);
    $row= mysqli_fetch_array($qRes);
    $ConArr = $conn->query($row[0]);
    $ASet= array();
    while ($row = mysqli_fetch_array($ConArr)) {
        $ASet[] = $row[0];
    }

    //Looking for ufc 200 2 CONDITION
    $querypull= "SELECT query FROM `q_all` WHERE ind = $O2";
    $qRes= $conn ->query($querypull);
    $row= mysqli_fetch_array($qRes);
    $ConArr = $conn->query($row[0]);
    $O2Set= array();
    while ($row = mysqli_fetch_array($ConArr)) {
        $O2Set[] = $row[0];
    }
    //Looking for ko/tkos 3 CONDIDITON
    $querypull= "SELECT query FROM `q_all` WHERE ind = $O3";
    $qRes= $conn ->query($querypull);
    $row= mysqli_fetch_array($qRes);
    $ConArr = $conn->query($row[0]);
    $O3Set= array();
    while ($row = mysqli_fetch_array($ConArr)) {
        $O3Set[] = $row[0];
    }
    //5+ Wins, B CONDITION
    $querypull= "SELECT query FROM `q_all` WHERE ind = $b";
    $qRes= $conn ->query($querypull);
    $row= mysqli_fetch_array($qRes);
    $ConArr = $conn->query($row[0]);
    $BSet= array();
    while ($row = mysqli_fetch_array($ConArr)) {
        $BSet[] = $row[0];
    }
    // Was champion C condition
    $querypull= "SELECT query FROM `q_all` WHERE ind = $c";
    $qRes= $conn ->query($querypull);
    $row= mysqli_fetch_array($qRes);
    $ConArr = $conn->query($row[0]);
    $CSet= array();
    while ($row = mysqli_fetch_array($ConArr)) {
        $CSet[] = $row[0];
    }
  //Verifier
    if ($Box === "A1" and in_array($Numba[0],array_intersect($O1Set,$ASet))){
        echo "true";
    }
    elseif ($Box === "A2" and in_array($Numba[0],array_intersect($O2Set,$ASet)) ){
        echo "true";
    }
    elseif ($Box === "A3" and in_array($Numba[0],array_intersect($O3Set,$ASet))){
        echo "true";
    }
    elseif ($Box === "B1" and in_array($Numba[0],array_intersect($O1Set,$BSet))){
        echo "true";
    }
    elseif ($Box === "B2"and in_array($Numba[0],array_intersect($O2Set,$BSet))){
        echo "true";
    }
    elseif ($Box === "B3" and in_array($Numba[0],array_intersect($O3Set,$BSet))){
        echo "true";
    }
    elseif ($Box === "C1"and in_array($Numba[0],array_intersect($O1Set,$CSet))){
        echo "true";
    }
    elseif ($Box === "C2"and in_array($Numba[0],array_intersect($O2Set,$CSet))){
        echo "true";
    }
    elseif ($Box === "C3"and in_array($Numba[0],array_intersect($O3Set,$CSet))){
        echo "true";
    }

    
?>