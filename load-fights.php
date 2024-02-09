<?php
 include 'dbh.php';
        $fightNcount = $_POST ['fightNcount'];
                $sql = "SELECT * FROM fightdata LIMIT $fightNcount";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result)>0){
                    while ($row = mysqli_fetch_assoc($result)){
                        echo "<p>";
                        echo $row['weight_class'];
                        echo "</p>";
                    }
                }else {
                    echo "retard";
                }    
            ?>