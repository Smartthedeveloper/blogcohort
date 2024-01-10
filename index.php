<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<?php


include('db.php');
$query = "SELECT * FROM post ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);
$post = mysqli_fetch_all($result,MYSQLI_ASSOC);
?>

<div class = "container mt-5">
    <h1>My blog</h1>
    <a href ="create.php" class="btn btn-primary mb-3">create post</a>

    <?php foreach ($post as $post): ?>

    <div class="card-mb-3">
        <div class="card-body">
            <p>the blog post arrage in descending order <br><?= $post['id'] ?></p>
            <h5 class='card-title'><?= $post['title']; ?></h5>
            <P class='card-text'><?=$post['content']; ?></p>
           
            <a class="btn btn-warning" href='process_edit.php?id=<?=$post['id']; ?>' > Edit</a>
            <a class="btn btn-danger" href= 'process_delete.php?id=<?=$post['id']; ?>'> Delete </a>
        </div>
    </div>
        <?php endforeach; ?>


</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>