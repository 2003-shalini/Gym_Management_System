<?php
if(isset($_GET['id']))
{
$id = $_GET['id'];

$link = mysqli_connect('localhost','root','','gym');
if(!$link){
    die('Connection error ' . mysqli_connect_error());
}

$query = "DELETE FROM member WHERE id = $id";
$result = mysqli_query($link,$query);
if($result)
{
    echo "Successfully deleted";
}
else{
    echo "Error";
}
}
else{
    echo 'Value not found';
}
?>