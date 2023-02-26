<?php 
require_once 'common/header.php';
require_once 'include/init.php';

if($_POST){
    var_dump($_POST);
    $error = '';
    if(empty($_POST['title']) || empty($_POST['description']) || empty($_POST['type']) || empty($_POST['prix'])){
        $error.= '<div class="alert alert-danger" role="alert">Veuillez remplir tous les champs du formulaire !</div>';
    }
    if(strlen($_POST['title']) > 100 || strlen($_POST['title'])< 5 || strlen($_POST['description'])< 5){
        $error.= '<div class="alert alert-danger" role="alert">Veuillez saisir des champs correct !</div>';
    }

    if(empty($error)){
        echo '<div class="alert alert-success" role="alert">Parfait ! Annonce ajouter</div>';
        $insert = $pdo->prepare("INSERT INTO `appartement`(`title`, `description`, `postal_code`, `city`, `type`, `price`) VALUES (:title,:description,:postal_code,:city,:type,:price)");
        $insert->bindParam(':title', $_POST['title'], PDO::PARAM_STR);
        $insert->bindParam(':description', $_POST['description'], PDO::PARAM_STR);
        $insert->bindParam(':postal_code', $_POST['postal_code'], PDO::PARAM_STR);
        $insert->bindParam(':city', $_POST['city'], PDO::PARAM_STR);
        $insert->bindParam(':type', $_POST['type'], PDO::PARAM_STR);
        $insert->bindParam(':price', $_POST['prix'], PDO::PARAM_INT);
        $insert->execute();
    }else{
        echo $error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Ajouter une annonce</title>
</head>
<body>
    <form method='post'>
    <div class="mb-3">
        <label for="title" class="form-label">Titre de l'annonce</label>
        <input type="text" name='title' class="form-control" id="title">
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description de l'annonce</label>
        <input type="text" name='description' class="form-control" id="description">
    </div>

    <div class="mb-3">
        <label for="postal_code" class="form-label">Code postal de l'annonce</label>
        <input type="text" name='postal_code' class="form-control" id="postal_code">
    </div>

    <div class="mb-3">
        <label for="city" class="form-label">Ville de l'annonce</label>
        <input type="text" name='city' class="form-control" id="city">
    </div>

    <div class="form-check">
        <input class="form-check-input" value='Location' type="radio" name="type" id="type1">
        <label class="form-check-label" for="type">Location</label>
        </div>
    <div class="form-check">
            <input class="form-check-input" value='Vente' type="radio" name="type" id="type2" checked>
            <label class="form-check-label" for="type2">Vente</label>
    </div>

    <div class="mb-3">
        <label for="prix" class="form-label">Prix de l'annonce</label>
        <input type="number" name='prix' class="form-control" id="prix">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>
</html>