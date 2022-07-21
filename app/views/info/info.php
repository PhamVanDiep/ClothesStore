<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/header.css" />
    <link rel="stylesheet" href="public/css/root.css" />
    <link rel="stylesheet" href="public/css/info/info_header.css" />
    <link rel="stylesheet" href="public/css/info/info_body.css" />
    <link rel = "icon" href = "public\res\img\logo\online-shopping.png" type = "image/x-icon">
    <title>Thông tin cá nhân</title>
</head>
<body>
    <?php
        require 'info_header.php';
        require_once ROOT . DS . 'app' . DS . 'views' . DS . 'components' . DS . 'header.php';
        require 'info_body.php';
    ?>
</body>
</html>