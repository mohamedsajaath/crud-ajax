<?php include("./include/db_connection.php") ?>
<?php

if (isset($_POST['display'])) {

    $query = "SELECT * FROM users";
    $result = mysqli_query($connection, $query);
    $autoId = 1;
    foreach ($result as $user) {
     
        $table = "
        <tr>
        <th scope='row'>" . $autoId . "</th>
        <td>" . $user['name'] . "</td>
        <td>" . $user['address'] . "</td>
        <td>" . $user['mail'] . "</td>
        <td>" . $user['contact'] . "</td>
        <td> <button type='button' value='".$user['id']."' class='btn btn-primary editButton'>
        <i class='bi bi-pencil-square'></i></button>
        <button  value='".$user['id']."' type='button' class='btn btn-danger deleteButton'><i class='bi bi-trash'></i></button></td>
        </tr>
        ";
      
        echo $table;
        $autoId = $autoId + 1;
    }
}





?>