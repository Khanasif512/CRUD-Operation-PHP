<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MYSHOP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class = "container my-5">
        <h2>List of Clients<h2>
            <a class="btn btn-primary" href="/myshop/create.php" role="button">New Client</a>
            <br>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>PHONE</th>
                        <th>ADDRESS</th>
                        <th>CREATED At</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "myshop";

                $conn = new mysqli ($servername, $username, $password, $database);

                if($conn->connect_error){
                    die("connection failed !" . conn->connect_error);
                }

                $sql = "SELECT * FROM clients";
                $result = $conn->query($sql);

                if(!$result){
                    die("invalid query !". $conn->error);
                }

                while($row = $result->fetch_assoc()){
                    echo "
                    <tr>
                        <td>$row[id]</td>
                        <td>$row[name]</td>
                        <td>$row[email]</td>
                        <td>$row[phone]</td>
                        <td>$row[address]</td>
                        <td>15/04/2024</td>
                        <td>
                            <a class='btn btn-primary btn-sm' href='/myshop/edit.php?id=$row[id]'>Edit</a>
                            <a class='btn btn-danger btn-sm' href='/myshop/delete.php?id=$row[id]'>Delete</a>
                        </td>
                    </tr>
                    ";
                }

                ?>

                </tbody>

            </table>
    </div>
</body>

</html>