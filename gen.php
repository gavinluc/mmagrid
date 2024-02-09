<?php
    include "dbh.php";

    
    //Now we have two query tables





    
    $sql = "SELECT DISTINCT weight_class FROM `fightdata` where gender = \"M\";";
    $results = $conn->query($sql); 
    $resultset = array();
    while ($row = mysqli_fetch_array($results)) {
        $resultset []= $row;
    }
    $sendSet = array();
    $counter = 0;
    $quote = '"';
    $singlequote = "'";
    $Numba[0]='$Numba[0]';
    foreach ($resultset as $d){
        echo $d[0];
        echo "ss<br>";
        $sendSet[$counter]= "'SELECT * FROM `fightdata` WHERE Weightclass = $quote$d[0]$quote AND (f_1 = $singlequote'$Numba[0]'$singlequote OR f_2 = $singlequote'$Numba[0]'$singlequote)'";
        echo  $sendSet[$counter];
        $counter = $counter +1;

    }
    $counter = 0;
    $sendSETT= array();
    foreach ($sendSet as $r){
        $sendSETT [$counter]= "INSERT into weight_class_queries VALUES ($sendSet[$counter]);";
        $counter = $counter +1;
    }
    
   // foreach($sendSETT as $ss){
        
    //    $aa=$conn->query($ss);
  //  }
            



 


    /*
    $Numba[0]="512";
  
    $sql = "SELECT * FROM `fought_queries`";
    $results = $conn->query($sql); 
    $resultset = array();
    while ($row = mysqli_fetch_array($results)) {
        $resultset []= $row['php_sql_query'];
       
    }
  
    //$sql2= $resultset[0]; 
    
  
    $n= $resultset[0];
    $q= str_replace('$Numba[0]', $Numba[0], $n);
    echo $q;
   
    echo "<br>";
    
   
    $results2 = $conn->query($q);
    $r2 = mysqli_fetch_assoc($results2);
    if ($r2  !== NULL ){
        echo "nice";
    }else {
        echo "fuck";
    }
   */
    
   
    /*
    $sql = "SELECT * FROM `popular_fighters`;";
    $results = $conn->query($sql);
    $resultset = array();
    while ($row = mysqli_fetch_array($results)) {
        $resultset[] = $row;
    }
     
    $Numba[0]= '$Numba[0]';
    $sign = '\"';
    $backslash = '\ ';
    $back = substr($backslash,0,1);
    $counter=0;
    $testset= array();
    $sendSet = array();
    $dogs = "'";
    foreach ($resultset as $result){
        
        //SELECT * FROM `fightdata` WHERE f_1 = INSERT INTO fought_queries VALUES ("SELECT * FROM `fightdata` WHERE f_1 = '\\' \"4089\" AND f_2 = '$Numba[0]' OR f_1 = '$Numba[0]' AND f_2 =  '\\' \"4089\";"); AND f_2 = '$Numba[0]' OR f_1 = '$Numba[0]' AND f_2 = \"4089\";
        //SELECT * FROM `fightdata` WHERE f_1 = \"4089\" AND f_2 = '$Numba[0]' OR f_1 = '$Numba[0]' AND f_2 = \"4089\";
        $STR= "'SELECT * FROM `fightdata` WHERE f_1 = $sign$result[0]$sign AND  f_2 = $dogs'$Numba[0]'$dogs OR f_1 = $dogs'$Numba[0]'$dogs AND f_2 = $sign$result[0]$sign;";
       // echo substr($STR,1);
        $testset[$counter]=$dogs . substr($STR,1) . $dogs;
        $counter = $counter +1;
    }
    $counter=0;
    foreach ($testset as $d){
        
        $sdd = "INSERT INTO fought_queries VALUES ($d);"; 
        $sendSet[$counter]= $sdd;
        $counter = $counter +1;
        echo $sdd;
        echo "<br>";
    }
    */
   // foreach($sendSet as $s){
  //    $d = $conn ->query($s);
 // }
   //INSERT INTO fought_queries VALUES ('SELECT * FROM `fightdata` WHERE f_1 = \\"4089\\" AND f_2 = ''$Numba[0]'' OR f_1 = ''$Numba[0]'' AND f_2 = \\"4089\\"');
?>
 