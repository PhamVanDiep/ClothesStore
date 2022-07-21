<?php
    require_once '../../library_config.php';
    require_once ROOT . DS . 'services' . DS . 'VoucherService.php';

    if (isset($_GET)) {
        $voucherID = $_GET['voucherID'];
        $voucher_service = new VoucherService();
        $voucher_service->delete($voucherID);

        echo "Xóa voucher thành công!";
    }