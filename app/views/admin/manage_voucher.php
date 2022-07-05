<?php 
    require_once ROOT . DS . 'services' . DS . 'VoucherService.php';
    require_once ROOT . DS . 'services' . DS . 'EventService.php';
 ?>

<!Doctype html>
<html>
    <head>
        <link rel="stylesheet" href="public/css/admin_root.css" />
        <link rel="stylesheet" href="public/css/admin_leftbar.css" />
        <link rel="stylesheet" href="public/css/admin_header.css" />
        <link rel="stylesheet" href="public/css/admin/dashboard.css" />
        <link rel="stylesheet" href="public/css/admin/voucher/manage_voucher.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="col-10" id="head-bar">
            <?php
                $title = 'Mã giảm giá';
                $subtitle = 'Danh sách mã giảm giá';
                require_once ROOT . DS . 'app' . DS . 'views' . DS . 'components' . DS . 'admin_header.php';
            ?>
        </div>
        <?php 
            require_once ROOT . DS . 'app' . DS . 'views' . DS . 'components' . DS . 'admin_leftbar.php';
        ?>
        <div class="col-10" id="content">
            <?php
                require 'voucher/manage.php'
            ?>
        </div>
    </body>
</html>