<?php 
require_once 'include/init.php';
require_once 'common/header.php';

if(isset($_GET['id'])){
    $req =$pdo->prepare('SELECT * FROM appartement WHERE id_table= :id');
    $req->bindParam(':id',$_GET['id']);
    $req->execute();

    $appartement = $req->fetch(PDO::FETCH_ASSOC);
}else{
    // header('Location: index.php');
    echo 'truc';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Appartement</title>
</head>
<body>
    <h1><?php echo $appartement['title']; ?></h1>
</body>
</html>