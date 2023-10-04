<?php
    $conn = mysqli_connect("localhost", "root", "", "gym");
    if ($conn->connect_error) {
        die("Connection failed:" . $conn->connect_error);
    }
    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $period = $_POST['period'];
        $price = $_POST['price'];
        $sql = "UPDATE billing SET name='$name', period='$period', price='$price' WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        $id = $_GET['id'];
        $sql = "SELECT id, name, period, price FROM billing WHERE id='$id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $name = $row['name'];
            $period = $row['period'];
            $price = $row['price'];
            echo '<form method="post">';
            echo '<input type="hidden" id="id" name="id" value="'. $id .'">';
            echo '<label for="name">Name:</label>';
            echo '<input type="text" id="name" name="name" value="'. $name .'"><br>';
            echo '<label for="period">Period:</label>';
            echo '<input type="text" id="period" name="period" value="'. $period .'"><br>';
            echo '<label for="price">Price:</label>';
            echo '<input type="text" id="price" name="price" value="'. $price .'"><br>';
            echo '<button type="submit" name="submit">Update</button>';
            echo '</form>';
        } else {
            echo "0 results";
        }
    }
    $conn->close();
?>
