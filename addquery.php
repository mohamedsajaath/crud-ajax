<?php include("./include/db_connection.php") ?>
<?php
print_r($_POST);
extract($_POST);
if (
    isset($_POST['nameval'])
    && isset($_POST['addressval'])
    && isset($_POST['mailval'])
    && isset($_POST['contactval'])
) {

    $name = mysqli_real_escape_string($connection,$_POST['nameval']);
    $address = mysqli_real_escape_string($connection,$_POST['addressval']);
    $mail = mysqli_real_escape_string($connection,$_POST['mailval']);
    $contact = mysqli_real_escape_string($connection,$_POST['contactval']);
    $query = "INSERT INTO users(name,address,mail,contact) VALUE ('$name','$address','$mail','$contact');";
    mysqli_query($connection,$query);
}else{
    echo "not set";
}

?>
