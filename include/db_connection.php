<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $databasename = "ajax_crud";

// Create connection
$connection = mysqli_connect($servername, $username, $password, $databasename);


if(isset($connection)){
    echo "Connection success";
}else{
    echo " Connection error";

}
?>