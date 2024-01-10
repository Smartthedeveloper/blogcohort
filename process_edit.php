<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Edit blog post</title>
</head>
<body>
<?php
include 'db.php';

if($_SERVER['REQUEST_METHOD'] ==='POST'){
    $title = $_POST['title'];
    $id =$_POST['id'];
    $content = $_POST['content'];

    //update the post in db

    $query = "UPDATE post SET title = '$title', content='$content' WHERE id=$id";
    mysqli_query($conn, $query);
    header('Location: index.php');

}
else{
    $id = $_GET['id'];
    $query = "SELECT * FROM post WHERE id=$id";
    $result = mysqli_query($conn, $query);
    $post = mysqli_fetch_assoc($result);
}

?>
<div class='container'>
    <h2>Edit blog post</h2>

<form action="process_edit.php" method="post">
<input type='hidden' name='id' value='<?=$post['id']; ?>' >

<div class ="form-group">
    <label for="title"> Title: </label>
    <input type="text" class="form-control" id="title" name="title" value='<?= $post['title']; ?>' required>
</div>

<div class ="form-group">
    <label for="title"> Content: </label>
    <textarea type="text" class="form-control" id="control" row="5" name="content" required><?=$post['content']; ?></textarea>
</div>
<br>
<button type="submit" class="btn btn-primary">submit</button>




</form>



</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>



?>