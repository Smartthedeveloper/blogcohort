<?php
include('db.php');
$id = $_GET['id'];

$query = " DELETE FROM post WHERE id=$id"; //line going to database

mysqli_query($conn, $query);

header('Location: index.php');

?>