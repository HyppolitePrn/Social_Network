<?php
    session_start();
    require_once 'config.php'; 


    $users_id = (int) trim($_GET['id']);

    if(empty($users_id)){
        header('Location: membres.php');
    }

    $req = $bdd->prepare("SELECT users.id, lastname, age, name, pseudo, tokenID, gender, birthday, phone, ImgProfile, ImgBanner, email, date_inscription FROM users INNER JOIN profiles WHERE users.id = ? ");
    $req->execute(array($users_id));
    $show_users = $req->fetch();


    if(!isset($show_users['id'])){
        header('Location: membres.php');
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil de <?= $show_users['pseudo'] ?></title>
</head>
<body>
    <h1>Profil de <strong><?= $show_users['pseudo'] ?> </strong></h1>
    <ul>
        <li>Nom : <?= $show_users['name'] ?></li>
        <li>prenom : <?= $show_users['lastname'] ?></li>
        <li>Pseudo : <?= $show_users['pseudo'] ?></li>
        <li>age : <?= $show_users['age'] ?></li>
        <li>genre : <?= $show_users['gender'] ?></li>
        <li>anniversaire : <?= $show_users['birthday'] ?></li>
        <li>date d'inscription : <?= $show_users['date_inscription'] ?></li>
        
    </ul>

    <div>
        <form method="post">
            <input type="submit" name="ajouter" value="Ajouter">
            <input type="submit" name="supprimer" value="Supprimer">
            <input type="submit" name="bloquer" value="Bloquer">
            <a href="message.php?id=<?= $show_users['id'] ?>">envoyer un message a <?= $show_users["pseudo"]?></a>
        </form>
    </div>

    
</body>
</html>