<?php

require_once('data
.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .profile{
        display: flex;
        align-items: center;
        margin-left: 15px;
        margin-bottom: 30px;
    }
    .info{
        display: block;
        
    }
    .margin{
        margin-bottom: 10px;
        margin-left: 5rem;
    }
    img{
        border-radius: 50%;
        width: 250px;
        height: 250px;
    }
    .registration{
        text-align: center;
        color: red;
    }
</style>
<body>
    <h2 class="registration">Registracija patvirtinta !</h2>
    <div class="profile">
    <img src="<?php echo $profilePicture; ?>">
            <div class="ihfo">
                <div class="margin">
                <strong>Vardas: </strong><span><?php echo $_POST['firstName'];?></span>
                </div>

            <div class="margin">
                <strong>Pavardė: </strong><span><?php echo $_POST['lastName'];?></span>
            </div>

            <div class="margin">
                <strong>Miestas: </strong><span><?php echo $_POST['city']; ?></span>
            </div>

            <div class="margin">   <strong>Programavimo kalbos: </strong><span><?php echo $_POST['lang[]']; ?></span>
                <?php foreach ($_POST['lang'] as $item):
                echo $item . ' '; ?>
                <?php endforeach; ?>
            </div>

            <div class="margin">
                <strong>Papildoma Informacija: </strong><span><?php echo $_POST['textarea']; ?></span>
            </div>
    </div>
    </div>
          <hr>                     
</body>
</html>