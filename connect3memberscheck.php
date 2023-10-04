<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membership Details</title>
</head>
<body style="background-color: #1A1D2E;">
    <h1 style="color:white;text-align:center">Membership Details</h1>
    <div style="text-align:center;">
        <form method="post">
            <label for="search" style="color:white">Search:</label>
            <input type="text" id="search" name="search" placeholder="Search">
            <button type="submit">Search</button>
        </form>
    </div>
    <table style="background-color: white; color: black; text-align: center; margin: 0 auto;">
    <thead style="background-color: #FFD700;">
    <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>COACH ID</th>
        <th>DOB</th>
        <th>MEMBERSHIP TYPE</th>
        <th>MEMBERSHIP AMOUNT</th>
        <th>UPDATE</th>
        <th>DELETE</th>
    </tr>
</thead>

<tbody>
    <?php
        $conn = mysqli_connect("localhost", "root", "", "gym");
        if($conn->connect_error)
        {
            die("Connection failed:" . $conn->connect_error);
        }
        if(isset($_POST['search'])) {
            $search_term = mysqli_real_escape_string($conn, $_POST['search']);
            $sql = "SELECT * FROM member WHERE id LIKE '%".$search_term."%' OR name LIKE '%".$search_term."%' OR coachid LIKE '%".$search_term."%' OR dob LIKE '%".$search_term."%' OR membershiptype LIKE '%".$search_term."%' OR amount LIKE '%".$search_term."%'";
        } else {
            $sql = "SELECT * FROM member";
        }
        $result = $conn->query($sql);
        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                if (!empty($row['id']) && !empty($row['name']) && !empty($row['coachid']) && !empty($row['dob'])  && !empty($row['membershiptype']) && !empty($row['amount']))
                {
                    $id = $row['id'];
                    echo "<tr><td>". $row["id"] ."</td><td>" .$row["name"] ."</td><td>" .$row["coachid"] ."</td><td>" .$row["dob"] ."</td><td>" .$row["membershiptype"] ."</td><td>". $row["amount"] ."</td><td><a href='update2.php?id=".$id."'>Update</a></td><td><a href='deletemembers.php?id=".$id."'>Delete</a></td></tr>";
                }
            }
        }
        else
        {
            echo "<tr><td colspan='8'>0 results</td></tr>";
        }
        echo "</tbody></table>";
        $conn->close();
    ?>
</table>

</body>
</html>
