<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/header.css" />
    <link rel="stylesheet" href="public/css/root.css" />
    <link rel="stylesheet" href="public/css/footer.css" />
    <link rel="stylesheet" href="public/css/login/login.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel = "icon" href = "public\res\img\logo\online-shopping.png" type = "image/x-icon">
    <title>Đăng ký</title>
</head>
<body>
    <?php
        require 'register_header.php';
        require 'register_body.php';
        require_once ROOT . DS . 'app' . DS . 'views' . DS . 'components' . DS . 'footer.php';
    ?>
</body>
</html>