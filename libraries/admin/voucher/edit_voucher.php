<?php
    require_once '../../library_config.php';
    require_once ROOT . DS . 'config' . DS . 'config.php';
    require_once ROOT . DS . 'app' . DS . 'models' . DS . 'Voucher.php';
    require_once ROOT . DS . 'services' . DS . 'VoucherService.php';
    require_once ROOT . DS . 'app' . DS . 'controllers' . DS . 'Router.php';

    // $targetDir = "../../../public/res/img/events/";
    if (isset($_POST)) {
        $voucherID = $_POST['voucherID'];
        $name = $_POST['voucherName'];
        $eventID = $_POST['eventID'];
        $discountPercent = $_POST['discountPercent'];
        $maxDiscount = $_POST['maxDiscount'];
        $minOrderPrice = $_POST['minOrderPrice'];
        $timeStart = $_POST['startYear'] . "-" . $_POST['startMonth'] . "-" . $_POST['startDay'];
        $timeEnd = $_POST['endYear'] . "-" . $_POST['endMonth'] . "-" . $_POST['endDay'];

     

        // insert event
        $voucher = new Voucher($voucherID, $name, $discountPercent, $eventID, $maxDiscount, $minOrderPrice, $timeStart, $timeEnd);
        $voucher_service = new VoucherService();
        $voucher_service->update($voucher);

        header('Location: ../../../manage-voucher');
    }