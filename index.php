<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Crud</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- STYLESHEET -->
    <!-- <link rel='stylesheet' type='text/css' media='screen' href='main.css'> -->
    <!-- BOOTSRAP -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <!-- BOOTSRAP ICON -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body class="body">

    <div class="row w-100 mt-5">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <h3 style="text-align: center;" class="h3">CRUD</h3>
        </div>
        <div class="col-md-4"></div>

    </div>


    <div class="row w-100 mt-5">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-dark float-left mb-3 modalButton" data-toggle="modal" data-target="#exampleModal">
                Add
            </button>

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Mail</th>
                        <th scope="col">Contact</th>
                        <th scope="col">...</th>



                    </tr>
                </thead>
                <tbody class="table_body">


                </tbody>
            </table>



        </div>
        <div class="col-md-1"></div>

    </div>






    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crud</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>


            </div>
        </div>
    </div>


    <!-- BOOTSRAP -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- MAIN JS -->
    <script>
        // DELETE AJAX
        $(document).on("click", ".deleteButton", function() {
            let deleteId = $(this).val();
            $.ajax({
                url: "deletequery.php",
                type: "post",
                data: {
                    id: deleteId
                },
                success: function(data, status) {
                    showtable()
                }
            });

        });


        // SUBMIT DISABLE DISABLE FUNCTION
        function btndisable() {
            let name = $('#name').val();
            let address = $('#address').val();
            let mail = $('#mail').val();
            let contact = $('#contact').val();

            if (name == "" &&
                address == "" &&
                mail == "" &&
                contact == "") {

                $('.save').prop('disabled', true);
            }



        };

        // SUBMIT DISABLE ENABLE FUNCTION
        $(document).on("focusout", ".input", function() {

            let name = $('#name').val();
            let address = $('#address').val();
            let mail = $('#mail').val();
            let contact = $('#contact').val();

            if (name !== "" &&
                address !== "" &&
                mail !== "" &&
                contact !== "") {

                $('.save').prop('disabled', false);
            }

        });


        // EDIT MODAL 
        $(document).on("click", ".editButton", function() {
            let value = $(this).val();
            btndisable()

            $.ajax({
                url: "editquery.php",
                type: "post",
                data: {
                    id: value
                },
                success: function(data, status) {
                    $('.modal-body').html("");
                    $('.modal-body').html(data);
                }

            });



            $('.modalButton').click();
        });

        // EDIT AJAX
        function updatedata(id) {

            let name = $('#name').val();
            let address = $('#address').val();
            let mail = $('#mail').val();
            let contact = $('#contact').val();

            $.ajax({
                url: "updatequery.php",
                type: "post",
                data: {
                    updateId: id,
                    nameval: name,
                    addressval: address,
                    mailval: mail,
                    contactval: contact
                },
                success: function(data, status) {
                    showtable()

                }

            });
            $('.close').click()
        }

        // REFRESH TABLE
        $(document).ready(function() {
            showtable();
        });

        // REFRESH TABLE FUNCTION
        function showtable() {
            let displaytable = "";
            $.ajax({
                url: "tablequery.php",
                type: "post",
                data: {
                    display: displaytable
                },
                success: function(data, status) {
                    $('.table_body').html(data);
                }

            });


        }

        // ADD MODAL
        $('.modalButton').click(function() {

            $('.modal-body').html(`  
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Name:</label>
                        <input type="text" class="form-control input" id="name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Address:</label>
                        <input type="text" class="form-control input" id="address">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Mail:</label>
                        <input type="email" class="form-control input" id="mail">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Contact:</label>
                        <input type="text" class="form-control input" id="contact">
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary save" onclick="addata()" >Save changes</button>
                    </div>
            `);

            btndisable()

        });

        // ADD AJAX
        function addata() {

            let name = $('#name').val();
            let address = $('#address').val();
            let mail = $('#mail').val();
            let contact = $('#contact').val();

            $.ajax({
                url: "addquery.php",
                type: 'post',
                data: {
                    nameval: name,
                    addressval: name,
                    mailval: mail,
                    contactval: contact
                },
                success: function(data, status) {
                    console.log(status);
                    showtable()
                }
            });


            $('.close').click()

        }
    </script>
</body>

</html>