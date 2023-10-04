<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <link rel="stylesheet" href="css/owl.carousel.min.css" />
    <link rel="stylesheet" href="css/superslides.css" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.10.2/css/all.css"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css"
    />
    <link rel="stylesheet" href="css/style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body style="background-color: #1A1D2E;">
    <h1 style="color:white;text-align:center">Instructors Details...</h1>
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
          <th>DOB</th>
          <th>EXPERIENCE</th>
          <th>UPDATE</th>
          <th>DELETE</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $conn = mysqli_connect("localhost","root","","gym");
          if($conn-> connect_error)
          {
            die("Connection failed:" . $conn-> connect_error);
          }
          if(isset($_POST['search'])) {
            $search_term = mysqli_real_escape_string($conn, $_POST['search']);
            $sql = "SELECT * FROM coach WHERE id LIKE '%".$search_term."%' OR name LIKE '%".$search_term."%' OR period LIKE '%".$search_term."%' OR experience LIKE '%".$search_term."%'";
        } else {
            $sql = "SELECT * FROM coach";
        }
        $result = $conn->query($sql);
                if($result->num_rows > 0)
                {
                    while($row = $result->fetch_assoc())
                    {
                        if (!empty($row['id']) && !empty($row['name']) && !empty($row['period']) && !empty($row['experience']))
                        {
                            $id = $row['id'];
                            echo "<tr><td>". $row["id"] ."</td><td>" .$row["name"] ."</td><td>" .$row["period"] ."</td><td>" .$row["experience"] ."</td><td><a href='update3.php?id=".$id."'>Update</a></td><td><a href='deleteinstructors.php?id=".$id."'>Delete</a></td></tr>";
                        }
                    }
                }
                else
                {
                    echo "<tr><td colspan='7'>0 results</td></tr>";
                }
                echo "</tbody></table>";
                $conn->close();




          ?>
    </table>
</body>
</html>

                