<?php
    include 'dbh.php';
    function getMeaning($i){
        include 'dbh.php';
        $sql = "SELECT meaning from `q_all` WHERE ind = $i";
        $qRes=$conn ->query($sql);
        $res= array();
        while ($row = mysqli_fetch_array($qRes)) {
            $O1Set[] = $row[0];
        }
        return $O1Set[0];
    }
    function pullRowNum ($tableN,$i,$i2){
        include 'dbh.php';
    
        $sql = "SELECT * FROM $tableN WHERE ind = $i";
        $qRes=$conn ->query($sql);
        $O1Set= array();
        while ($row = mysqli_fetch_array($qRes)) {
            $O1Set[] = $row[0];
        }
       
        $dogs = $conn ->query($O1Set[0]);
        $Set1= array();
        while ($row = mysqli_fetch_array($dogs)) {
            $Set1[] = $row[0];
        }
        
        $sql = "SELECT * FROM $tableN WHERE ind = $i2";
        $qRes=$conn ->query($sql);
        $O1Set= array();
        while ($row = mysqli_fetch_array($qRes)) {
            $O1Set[] = $row[0];
        }
        
        $dogs = $conn ->query($O1Set[0]);
        $Set2= array();
        while ($row = mysqli_fetch_array($dogs)) {
            $Set2[] = $row[0];
        }
        
      
        
        return count(array_intersect($Set1, $Set2)); 
    }
   
 
    $Veri= rand (1,555);
    echo "<br>";
    echo "VERI: $Veri";
    $A=0;
    $B=0;
    $C=0;
    
    for ($x = 1; $x <= 3; $x++) {
        $k=0;
        while ($k==0){
            $new= rand (1,555); 
        
            if ($new <> $A && $new <> $B && $new <> $C && $new <> $Veri && $new <> 43 && $new <> 403){
                $Intersect= pullRowNum('q_all',$Veri,$new);
                if ($Intersect>3){
                    $k=3;
                    echo"<br> ABC:";
                    echo $new;
                }
            }
        }
        if ($x==1){
            $A=$new;
        }
        elseif($x==2){
            $B=$new;
        }
        elseif($x==3) {
            $C=$new;
        }
    }
    echo "<br>";
    
    $k=0;
    $O1=0;
    $O2=0;
    for ($x = 1; $x <= 3; $x++) {
        $k=0;
        while ($k==0){
             
            $new= rand (1,555); 
            if ($new <> $A && $new <> $B && $new <> $C && $new <> $Veri && $new <> $O1 && $new <> 43 && $new <> 403){
                
                $IntersectA= pullRowNum('q_all',$A,$new);
                $IntersectB= pullRowNum('q_all',$B,$new);
                $IntersectC= pullRowNum('q_all',$C,$new);
                if ($IntersectA>3 && $IntersectB>3 && $IntersectC>3){
                    echo "ran";
                    $k=3;
                    echo"<br> 123:";
                    echo $new;
                    echo"<br>";
                    echo $x;
                    if ($x==1){
                        $O1=$new;
                    }
                    elseif($x==2){
                        $O2=$new;
                    }
                }
            }
        }
         
    }
    echo"<br>";
    
    echo "'$Veri','$O1','$O2','$A','$B','$C";
    echo"<br>";
    echo getMeaning($Veri);
    echo "<br>";
    echo getMeaning($O1);
    echo "<br>";
    echo getMeaning($O2);
    echo "<br>";
    echo getMeaning($A);
    echo "<br>";
    echo getMeaning($B);
    echo "<br>";
    echo getMeaning($C);
 

?>