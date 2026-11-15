<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./public/img/icon.png">
    <title>Fatura+</title>
    <link rel="stylesheet" href="./public/css/styles.css" type="text/css">
</head>
<body>
<?php
$user = null;
if ($_SESSION != null){
$user = User::find_by_id($_SESSION["userID"]);
}
?>

<div class="header">
    <a href="./router.php?c=mainView&a=index"><img class="header-logo" src="./public/img/logo.png" alt="logo"/></a>
    <div class="header-right">
        <?php if($user == null){ ?>
        <a class="btn-styled" href="./router.php">Sign In</a>
        <?php }else if($user->role == "cliente"){ ?>
            <a class="btn-styled" href="./router.php?c=user&a=logout">Logout</a>
        <?php } else { ?>
            <a class="btn-styled" href="./router.php?c=user&a=show&id=<?= $user->id ?>">Ver Informações</a>
            <a class="btn-styled" href="./router.php?c=user&a=logout">Logout</a>
        <?php } ?>
    </div>
</div>


