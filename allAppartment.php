<?php 
require_once 'common/header.php';
require_once 'include/init.php';

$req = $pdo->query("SELECT * FROM appartement");

$appartements = $req->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Toutes les annonces</title>
</head>
<body>
    <h1>Toutes nos annonces</h1>

    <?php 
        foreach($appartements as $appartement){
    ?>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"><?php echo strtoupper($appartement['title']) ?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?php echo $appartement['type'] ?></h6>
            <p class="card-text"><?php echo $appartement['description'] ?></p>
            <p class="card-text"><?php echo $appartement['price'].'€'?></p>
            <a href="<?php echo 'appartementDetail.php?id='.$appartement['id_table'] ?>" class="btn btn-primary">Réserver</a>
        </div>
</div>

<?php }?>
</body>
</html>