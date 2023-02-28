<?php 
require_once 'include/init.php';
require_once 'common/header.php';



if(isset($_GET['id'])){
    $req =$pdo->prepare('SELECT * FROM appartement WHERE id_table= :id');
    $req->bindParam(':id',$_GET['id']);
    $req->execute();

    $appartement = $req->fetch(PDO::FETCH_ASSOC);
}else{
    header('Location: index.php');
}


if(isset($_POST['reservation_message'])){
    $requpdate = $pdo->prepare("UPDATE appartement SET reservation_message = :reservation_message WHERE id_table = :id");
    $requpdate->bindParam(':id',$_GET['id']);
    $requpdate->bindParam(':reservation_message',$_POST['reservation_message']);
    $requpdate->execute();
    echo "<div class='alert alert-success'>Message de réservation envoyé avec succès !</div>";
    header('Location: index.php');

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
    <style>
        <?php 
            require_once 'assets/style/style.css';
        ?>
    </style>
</head>
<body>
    <div class='appartement'>
    <h1><?php echo $appartement['title']; ?></h1>
    <h3><?php echo $appartement['description']; ?></h3>
    <p><?php echo 'Code postal : '.$appartement['postal_code']; ?></p>
    <p><?php echo 'La ville : '.$appartement['city']; ?></p>
    <p><?php echo $appartement['type']; ?></p>
    <p><?php echo 'Le prix : '.number_format($appartement['price'],0,'',' ').'€'; ?></p>

    <?php if(strlen($appartement['reservation_message'])==0): ?>
    <form method='post' action="">
        <label for="reservation_message">Veuillez entrer un message de réservation !</label>
    <textarea name='reservation_message' class="form-control" id="" rows="3">
    </textarea>
    <input class='btn btn-primary' id='paybtn' value='Je réserve' type="submit">
    <?php else: ?>
        <h2>Désolé cette appartement est déjà réservé</h2>
    <?php endif; ?>
    </form>
    </div>
</body>
</html>