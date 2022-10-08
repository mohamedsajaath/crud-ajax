<?php include("./include/db_connection.php") ?>

<?php
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $query = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($connection, $query);
    foreach ($result as $results) {


        $modalBody = '
                    <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Name:</label>
                    <input type="text" class="form-control" id="name" value="' . $results['name'] . '">
                    </div>
                    <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Address:</label>
                    <input type="text" class="form-control" id="address" value="' . $results['address'] . '">
                    </div>
                    <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Mail:</label>
                    <input type="email" class="form-control" id="mail" value="' . $results['mail'] . '">
                    </div>
                    <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Contact:</label>
                    <input type="text" class="form-control" id="contact" value="' . $results['contact'] . '">
                    </div>

                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primary save" onclick="updatedata('.$id .')">Save changes</button>
                    </div>
                    ';
    }

    echo $modalBody;
}


?>

