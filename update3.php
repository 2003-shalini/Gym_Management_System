<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Instructor Details</title>
</head>
<body>
    <?php
        $conn = mysqli_connect("localhost", "root", "", "gym");
        if($conn->connect_error)
        {
            die("Connection failed:" . $conn->connect_error);
        }

        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $sql = "SELECT * FROM coach WHERE id=$id";
            $result = $conn->query($sql);
            if($result->num_rows == 1)
            {
                $row = $result->fetch_assoc();
                $name = $row['name'];
                $period = $row['period'];
                $experience = $row['experience'];
            }
        }

        if(isset($_POST['update']))
        {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $period = $_POST['period'];
            $experience = $_POST['experience'];

            $sql = "UPDATE coach SET name='$name',period='$period', experience = '$experience' WHERE id=$id";

            if ($conn->query($sql) === TRUE)
            {
                echo "Record updated successfully";
            }
            else
            {
                echo "Error updating record: " . $conn->error;
            }
            $conn->close();
        }
    ?>
    <h2>Update Coach Details</h2>
    <form method="post">
        <label for="id">ID:</label>
        <input type="text" id="id" name="id" value="<?php echo $id; ?>" readonly><br><br>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $name; ?>"><br><br>

        <label for="dob">DOB:</label>
        <input type="text" id="period" name="period" value="<?php echo $period; ?>"><br><br>
        
        <label for="dob">Experience:</label>
        <input type="text" id="dob" name="experience" value="<?php echo $experience; ?>"><br><br>

        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>
