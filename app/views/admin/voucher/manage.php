<?php
    global $path_project;
?>

<div class="body">
    <div class="list-voucher">
        <table>
            <thead>
                <tr>
                    <th>Tên mã giảm giá</th>
                    <th>Phần trăm giảm</th>
                    <th>Tên sự kiện</th>
                    <th>Giá trị giảm tối đa</th>
                    <th>Giá trị đơn tối thiểu</th>
                    <th>Thời gian bắt đầu</th>
                    <th>Thời gian kết thúc</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $voucherService = new VoucherService();
                    $vouchers = $voucherService->getAll();
                    $eventService = new EventService();
                    foreach($vouchers as $voucher) {
                        $event = $eventService->getOnce($voucher["eventID"]);
                        $eventName = $event["name"];
                        echo "<tr id='row_" .  $voucher['voucherID'] . "'>" 
                                . "<td>" . $voucher["name"] . "</td>"
                                . "<td>" . $voucher["discountPercent"] . "</td>"
                                . "<td>" . $eventName . "</td>"
                                . "<td>" . $voucher["maxDiscount"] . "</td>"
                                . "<td>" . $voucher["minOrderPrice"] . "</td>"
                                . "<td>" . $voucher["timeStart"] . "</td>"
                                . "<td>" . $voucher["timeEnd"] . "</td>"
                                . "<td style='text-align:center;'><a href='/$path_project/update-voucher?voucherID=" . $voucher['voucherID'] . "'><img style='width:16px;' src='public/res/img/admin/edit.png' alt=''></a></td>"
                                . "<td style='text-align:center;'><img style='width:16px;' src='public/res/img/admin/delete.png' alt='' onclick=deleteEvent(" . $voucher['voucherID'] . ")></td>"
                            . "</tr>";
                    }
                ?>
            </tbody>

            
        </table>
    </div>
</div>
<script>
        function deleteEvent(voucherID) {
            let option = confirm('Bạn có chắc chắn muốn xoá voucher này không?');
            if(!option) return;
            let table = document.getElementsByTagName('table');
            let row = document.getElementById('row_' + voucherID);
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    alert(this.responseText);
                    row.style.display = "none";
                }
            };
            xhttp.open("GET", "libraries/admin/voucher/delete_voucher.php?voucherID=" + voucherID, false);
            xhttp.send();
        }
    </script>

