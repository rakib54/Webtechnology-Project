<?php

$db= mysqli_connect("localhost","root","","restaurant");
if (!$db) {
    die ("Database failed" .mysqli_error($db)) ;
}
else {
    //echo "Database Connected";
}
?>