<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Member Details</title>
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
            $sql = "SELECT * FROM member WHERE id=$id";
            $result = $conn->query($sql);
            if($result->num_rows == 1)
            {
                $row = $result->fetch_assoc();
                $name = $row['name'];
                $coachid = $row['coachid'];
                $dob = $row['dob'];
                $membershiptype = $row['membershiptype'];
                $amount = $row['amount'];
            }
        }

        if(isset($_POST['update']))
        {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $coachid = $_POST['coachid'];
            $dob = $_POST['dob'];
            $membershiptype = $_POST['membershiptype'];
            $amount = $_POST['amount'];

            $sql = "UPDATE member SET name='$name', coachid='$coachid', dob='$dob', membershiptype='$membershiptype', amount='$amount' WHERE id=$id";

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
    <h2>Update Member Details</h2>
    <form method="post">
        <label for="id">ID:</label>
        <input type="text" id="id" name="id" value="<?php echo $id; ?>" readonly><br><br>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $name; ?>"><br><br>

        <label for="coachid">Coach ID:</label>
        <input type="text" id="coachid" name="coachid" value="<?php echo $coachid; ?>"><br><br>

        <label for="dob">DOB:</label>
        <input type="text" id="dob" name="dob" value="<?php echo $dob; ?>"><br><br>

        <label for="membershiptype">Membership Type:</label>
        <input type="text" id="membershiptype" name="membershiptype" value="<?php echo $membershiptype; ?>"><br><br>

        <label for="amount">Membership Amount:</label>
        <input type="text" id="amount" name="amount" value="<?php echo $amount; ?>"><br><br>

        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>
