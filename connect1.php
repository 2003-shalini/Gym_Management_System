<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Body Tone</title>
</head>
<body style="background-color: #1A1D2E;">
    <h1 style="color:white;text-align:center">Trainee Registration Details...</h1>
    <div style="text-align:center;">
        <form method="post">
            <label for="search" style="color:white">Search:</label>
            <input type="text" id="search" name="search" placeholder="Search">
            <button type="submit">Search</button>
        </form>
    </div>
    <br>
    <table style="background-color: white; color: black; text-align: center; margin: 0 auto;">
        <thead style="background-color: #FFD700;">
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>PERIOD</th>
                <th>PRICE</th>
                <th>UPDATE</th>
                <th>DELETE</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $conn = mysqli_connect("localhost", "root", "", "gym");
                if ($conn->connect_error) {
                    die("Connection failed:" . $conn->connect_error);
                }
                if (isset($_POST['search'])) {
                    $search_id = $_POST['search'];
                    $sql = "SELECT id, name, period, price FROM billing WHERE id LIKE '%$search_id%' OR name LIKE '%$search_id%'";
                } else {
                    $sql = "SELECT id, name, period, price FROM billing";
                }
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        if (!empty($row['id']) && !empty($row['name']) && !empty($row['period']) && !empty($row['price'])) {
                            $id = $row['id'];
                            echo '<tr><td>'. $row["id"] .'</td><td>' .$row["name"] .'</td><td>' .$row["period"] .'</td><td>' .$row["price"] .'</td><td><a href="update1.php?id='.$id.'">Update</a></td><td><a href="delete.php?id='.$id.'">Delete</a></td></tr>';
                        }
                    }
                    echo "</tbody></table>";
                } else {
                    echo "</tbody></table>";
                    echo "0 results";
                }
                $conn->close();
            ?>
</body>
</html>
