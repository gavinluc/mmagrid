<?php
    include 'dbh.php';
?>


<!DOCTYPE html>

<html>
    <head> 

        <script
			  src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js">
        </script>
        <script>
            $(document).ready(function(){
                $("#bitch").click(function(){
                    $("#dogs").load('load-fights.php', {fightNcount: "3"});
                });
                });
            
        </script>
    </head> 
    <body>
        <div id = 'dogs'>
        </div>
        <button id = "bitch"> Click! </button>
</body>
</html>
