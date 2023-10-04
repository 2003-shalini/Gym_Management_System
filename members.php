<?php
include 'config.php';

if(isset($_REQUEST["submit"])){

    $memid = $_REQUEST["id"];
    $memname = $_REQUEST["name"];
    $coachid = $_REQUEST["coachid"];
    $memdob = $_REQUEST["dob"];
    $memtype = $_REQUEST["type"];
    $memamount = $_REQUEST["amount"];

    $ins = "INSERT INTO member (id,name,coachid,dob,membershiptype,amount) VALUES('$memid','$memname','$coachid','$memdob','$memtype','$memamount')";

    $query = mysqli_query($connection, $ins);

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
		.centered-box {
			width: 700px;
			height: 500px;
			margin: auto; /* Set left and right margins to "auto" */
			background-color: #FFD700;
			border-radius: 20px;
			padding: 20px;
		}
	
        h3 {
			text-align: center;
		}
	</style>
</head>
<body style="background-color: #1A1D2E;">
   
<!-- nav start -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="admin-login.php"><img src = 'BodyTone.png' alt="your image" width="60" height="60"> </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav" style="background-color: #FFD700;">
  <ul class="navbar-nav">
      
      <li class="nav-item">
        <a class="nav-link" href="members.php">Membership Register</a>
      </li>
      
    </ul>
  </div>
</nav>
<!-- nav close -->
<h3 style="color: white;">Register now to become a member...</h3>
<br>
<br>
<!-- nav close -->
<div class="centered-box">
<!-- form start -->
<form>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Member ID</label>
      <input type="text" name="id" class="form-control" id="inputEmail4" placeholder="ID">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Member Name</label>
      <input type="text" name = "name" class="form-control" id="inputPassword4" placeholder="NAME">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Coach id</label>
    <input type="text" name = "coachid" class="form-control" id="inputAddress" placeholder="Coach ID">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Date of Birth</label>
    <input type="text" name = "dob"  class="form-control" id="inputAddress2" placeholder="DOB">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Membership type</label>
    <input type="text" name = "type"  class="form-control" id="inputAddress2" placeholder="Membership type">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Amount</label>
    <input type="text" name = "amount"  class="form-control" id="inputAddress2" placeholder="Amount">
  </div>
  <div class="form-group">
    
    <input type="submit" name = "submit"  class="form-control" id="inputAddress2" Value="Save">
  </div>

  
</form>

    </div>
<!-- form end-->

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>