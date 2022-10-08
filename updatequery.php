
<?php include("./include/db_connection.php") ?>

<?php
echo "<pre>";
print_r($_POST);
echo "</pre>";

if (isset($_POST['updateId'])) {
    $id = $_POST['updateId'];
    $name = mysqli_real_escape_string($connection, $_POST['nameval']);
    $address = mysqli_real_escape_string($connection, $_POST['addressval']);
    $mail = mysqli_real_escape_string($connection, $_POST['mailval']);
    $contact = mysqli_real_escape_string($connection, $_POST['contactval']);

    $update = "UPDATE users 
    SET name='$name',address='$address',mail='$mail',contact='$contact'
    WHERE id =$id";
    $result = mysqli_query($connection,  $update);
    echo "suceess";
}

?>