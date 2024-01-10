<?php
include('db.php');
if($_SERVER['REQUEST_METHOD']=== 'POST'){
    $title = $_POST['title'];
    $content = $_POST['content'];

    $query="INSERT INTO post(title,content) VALUES ('$title','$content')";

    mysqli_query($conn,$query);

    header('Location: index.php');


}else{
    header('Location: index.php');
}


?>