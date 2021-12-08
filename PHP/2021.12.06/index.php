<?php
// var_dump($_POST);
define('UPLOAD_DIR', dirname(__FILE__) . '/uploads');
define('ALLOWED_EXTENSION', ['png', 'jpg', 'jpeg', 'pdf']);

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$profilePicture = 'https://www.gravatar.com/avatar/' . md5(generateRandomString(16));

if (isset($_FILES['photo'])) {
	$file = $_FILES['photo'];

	if ($file['error'] == UPLOAD_ERR_OK) {
		$ext = pathinfo($file['name'], PATHINFO_EXTENSION);
		$ext = strtolower($ext);
		if (!in_array($ext, ALLOWED_EXTENSION)) {
			echo "File not alllowed";

			exit;
		}

		$name = generateRandomString(16);

		$path = UPLOAD_DIR . '/' . date('Y/m/d');

		if (!is_dir($path)) {
			mkdir($path, 0777, TRUE);
		}

		$path = sprintf('%s/%s.%s', $path, $name, $ext);

		move_uploaded_file($file['tmp_name'], $path);

		$profilePicture = str_replace('/home/code-academy/PHP', '', $path);
	}
}
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
    }
    .info{
        display: block;
        
    }
    .margin{
        margin-bottom: 10px;
        margin-left: 10px;
    }
    img{
        border-radius: 50%;
        width:200px;
        height:200px;
    }
</style>
<body>
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

            <div class="margin">   <strong>Programavimo kalbos: </strong>
                <?php foreach ($_POST['lang'] as $item):
                echo $item . ' '; ?>
                <?php endforeach; ?>
            </div>

            <div class="margin">
                <strong>Informacija: </strong><span><?php echo $_POST['textarea']; ?></span>
            </div>
    </div>
    </div>
                               
</body>
</html>