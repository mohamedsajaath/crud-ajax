<?php include("./include/db_connection.php") ?>


<?php

if(isset($_POST['id'])){
$deleteid = $_POST['id'];
$deleteQuery = "DELETE FROM users WHERE id=$deleteid;";
mysqli_query($connection,$deleteQuery);
echo "Delete Succeed";
}

?>