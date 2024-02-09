<?php
   include 'dbh.php';

    $fighterFullName = $_POST['Name'];
    $Box = $_POST ['Box'];
  
    // fighter id of name submitted
    $sql = "SELECT fighter_id FROM goodnamefighter WHERE full_name = '$fighterFullName';";
    $result = $conn->query($sql);
    $rows = mysqli_fetch_assoc($result);
    $Numba=array_values($rows);
  
    // looking for fight vs adesanya  1 condition
    $sql2 = "SELECT * FROM `fightdata` WHERE f_1 = \"4089\" AND f_2 = '$Numba[0]' OR f_1 = '$Numba[0]' AND f_2 = \"4089\";";
    $result2 = $conn->query($sql2);
    $r2 = mysqli_fetch_assoc($result2);
    if ($r2  !== NULL ){
        $O1 = TRUE;
    }
    // looking for welterweight fight   A condition
    $sql3 = "SELECT * FROM `fightdata` WHERE (f_1 = '$Numba[0]' OR f_2 = '$Numba[0]' ) AND weight_class = \"Welterweight\";";
    $res3 = $conn->query($sql3); 
    $r3 = mysqli_fetch_assoc($res3);
    if ($r3  !== NULL ){
        $A = TRUE;
    }
    //Looking for ufc 200 2 CONDITION
    $sql4 = "SELECT * FROM `fightdata` WHERE (f_1 = '$Numba[0]' OR f_2 = '$Numba[0]' ) AND  event_id = \"362\";";
    $res4 = $conn->query($sql4); 
    $r4 = mysqli_fetch_assoc($res4);
    if ($r4  !== NULL ){
        $O2 = TRUE;
    }
    //Looking for ko/tkos 3 CONDIDITON
    $sql5 = "SELECT * FROM `fightdata` WHERE winner = '$Numba[0]' AND result = \"KO/TKO\";";
    $res5 = $conn->query($sql5); 
    if (mysqli_num_rows($res5)>2){
        $O3 = TRUE;
    }
    //5+ Wins, B CONDITION
    $sql6 = "SELECT * FROM `fightdata` WHERE winner = '$Numba[0]';";
    $res6 = $conn->query($sql6); 
    if (mysqli_num_rows($res6)>5){
        $B = TRUE;
    }else {
        $B = TRUE;
    }
    // Was champion C condition
    $sql7 = "SELECT * FROM `fightdata` WHERE winner = '$Numba[0]' AND title_fight = \"T\" AND  num_rounds = \"5\";"; 
    $res7 = $conn->query($sql7); 
    $r7 = mysqli_fetch_assoc($res7);
    if ($r7  !== NULL ){
        $C = TRUE;
    }
  //Verifier
    if ($Box === "A1" and $A and $O1 ){
        echo "true";
    }
    elseif ($Box === "A2" and $A and $O2 ){
        echo "true";
    }
    elseif ($Box === "A3" and $A and $O3 ){
        echo "true";
    }
    elseif ($Box === "B1" and $B and $O1){
        echo "true";
    }
    elseif ($Box === "B2"and $B and $O2){
        echo "true";
    }
    elseif ($Box === "B3" and $B and $O3){
        echo "true";
    }
    elseif ($Box === "C1"and $C and $O1){
        echo "true";
    }
    elseif ($Box === "C2"and $C and $O2){
        echo "true";
    }
    elseif ($Box === "C3"and $C and $O3){
        echo "true";
    }

    
?>