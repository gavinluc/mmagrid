<?php
    include "dbh.php";
    $indy= 1;
    $sql = "SELECT * FROM `q_fight_results`;";
    $results = $conn->query($sql);
    $resultset = array();
    while ($row = mysqli_fetch_array($results)) {
        $resultset[] = $row[0];
    }
    foreach ($resultset as $r){
        echo "<br>";
        if (str_contains($r, 'num_ko_first_round')){
            $out= substr($r,-2,1) .'+ First round KO/TKOs';
             
        }
        elseif(str_contains($r, 'num_ko')){
            $out= substr($r,-2,1) .'+ KO/TKOs';
        }
        elseif(str_contains($r, 'num_sub')){
            $out= substr($r,-2,1) .'+ Subs';
        }
        elseif(str_contains($r, 'num_sub_first_round')){
            $out= substr($r,-2,1) .'+ First round Subs';
        }
        elseif(str_contains($r, '(num_ko + num_subs)')){
            $out= substr($r,-2,1) .'+ Finishes';
        }
        elseif(str_contains($r, 'total_wins > 12')){
            $out= '12+ Total Wins';
        }
        elseif(str_contains($r, 'total_wins > 15')){
            $out= '15+ Total Wins';
        }
        elseif(str_contains($r, 'total_wins > 20')){
            $out= '20+ Total Wins';
        }
        elseif(str_contains($r, 'total_wins ')){
            $out= substr($r,-2,1) .'+ Total Wins';
        }
        echo $out;
        
        $sql = "INSERT INTO `q_all`(`query`, `ind`,`meaning`) VALUES ('$r','$indy','$out')";
       // $conn->query($sql);
        $indy = $indy+1;
    }
    $sql = "SELECT * FROM `q_fought_year_event`;";
    $results = $conn->query($sql);
    $resultset2 = array();
    while ($row = mysqli_fetch_array($results)) {
        $resultset2[] = $row[0];
    }
    foreach ($resultset2 as $r){
        echo "<br>";
        if (str_contains($r, 'years =')){
            $out= 'Fought in '.substr($r,-5,4) ;
        }
        elseif(str_contains($r, 'event_id =')){
            $qq= substr($r,-4,3);
            $sql = "SELECT event_name FROM `t_numbered_events` WHERE event_id = $qq";
            $results = $conn->query($sql);
            $resultset = array();
            while ($row = mysqli_fetch_array($results)) {
                $resultset[] = $row[0];
            }
            $out= 'Fought On '. $resultset[0];
        }
        echo $out;
        
        $sql = "INSERT INTO `q_all`(`query`, `ind`,`meaning`) VALUES ('$r','$indy','$out')";
      // $conn->query($sql);
        $indy = $indy+1;
        
    }

    $sql = "SELECT * FROM `q_stats`;";
    $results = $conn->query($sql);
    $resultset3 = array();
    while ($row = mysqli_fetch_array($results)) {
        $resultset3[] = $row[0];
    }
    foreach ($resultset3 as $r){
        if (str_contains($r, 'total_strikes_succ > 1000')){
            $out=  'Landed 1000+ Significant Strikes';
        }
        elseif (str_contains($r, 'total_strikes_succ >')){
            $out=  'Landed '.substr($r,-4,3) . ' Significant Strikes';
        }
        elseif (str_contains($r, 'title_fight = "T"')){
            $out=  'Was Champion';
        }
        elseif (str_contains($r, ' total_takedown_succ = 0')){
            $out=  'Landed No Takedowns';
        }
        elseif (str_contains($r, ' total_takedown_succ > 0')){
            $out=  'Landed At Least One Takedown';
        }
        elseif (str_contains($r, ' total_takedown_succ >5')){
            $out=  'Landed 5+ Takedowns';
        }
        elseif (str_contains($r, ' total_takedown_succ >')){
            $out=  'Landed '.substr($r,-3,2).'+ Takedowns';
        }
        elseif (str_contains($r, ' total_submission_att = 0')){
            $out=  'Attempted Zero Submissions';
        }
        elseif (str_contains($r, ' total_submission_att > 0')){
            $out=  'Attempted At Least One Submission';
        }
        elseif (str_contains($r, ' total_submission_att > 5')){
            $out=  'Attempted 5+ Submissions';
        }
        elseif (str_contains($r, ' total_submission_att >')){
            $out=  'Attempted '.substr($r,-3,2).'+ Submissions';
        }
        elseif (str_contains($r, 'Flyweight')){
            $out=  'Fought at Flyweight';
        }
        elseif (str_contains($r, 'Bantamweight')){
            $out=  'Fought at Bantamweight';
        }
        elseif (str_contains($r, 'Featherweight')){
            $out=  'Fought at Featherweight';
        }
        elseif (str_contains($r, 'Lightweight')){
            $out=  'Fought at Lightweight';
        }
        elseif (str_contains($r, 'Welterweight')){
            $out=  'Fought at Welterweight';
        }
        elseif (str_contains($r, 'Middleweight')){
            $out=  'Fought at Middleweight';
        }
        elseif (str_contains($r, 'Light Heavyweight')){
            $out=  'Fought at Light Heavyweight';
        }
        elseif (str_contains($r, 'Heavyweight')){
            $out=  'Fought at Heavyweight';
        }
        echo $out;
        echo "<br>";
        $sql = "INSERT INTO `q_all`(`query`, `ind`,`meaning`) VALUES ('$r','$indy','$out')";
  //    $conn->query($sql);
        $indy = $indy+1;
    }
    $sql = "SELECT * FROM `q_test_querytable`;";
    $results = $conn->query($sql);
    $resultset4 = array();
    while ($row = mysqli_fetch_array($results)) {
        $resultset4[] = $row[0];
    }
    foreach ($resultset4 as $r){
        $one = substr($r, 63);
        $number = substr(substr($one, strpos($one, "=") +1),0,-2);
        $sql = "SELECT full_name FROM `goodnamefighter` WHERE fighter_id = $number";
        $results = $conn->query($sql);
            $resultset = array();
            while ($row = mysqli_fetch_array($results)) {
                $resultset[] = $row[0];
            }
        
            $out=  "Fought $resultset[0]";
            echo $out;
        echo '<br>'; 
        $sql = "INSERT INTO `q_all`(`query`, `ind`,`meaning`) VALUES ('$r','$indy','$out')";
     //  $conn->query($sql);
        $indy = $indy+1;
    }
    
 
?>