<?php
    require_once ROOT . DS . 'services' . DS . 'EventService.php';
    require_once ROOT . DS . 'services' . DS . 'VoucherService.php';
    $event_service = new EventService();
    $events = $event_service->getAll();

    $voucher_service = new VoucherService();
    $voucher = $voucher_service->getOnce($voucherID);

    $voucher_name = $voucher['name'];
    $discountPercent = $voucher['discountPercent'];
    $eventID = $voucher['eventID'];
    $maxDiscount = $voucher['maxDiscount'];
    $minOrderPrice = $voucher['minOrderPrice'];
    $timeStart = $voucher['timeStart'];
    $timeEnd = $voucher['timeEnd'];

    $startArr = explode('-', $timeStart);
    $endArr = explode('-', $timeEnd);

?>

<div class="body col-11">
    <h1 class="title">Sửa mã giảm giá</h1>
    <form action="libraries/admin/voucher/edit_voucher.php" method="post">
        <div class="wrap-input">
            <label for="">Tên mã giảm giá:</label>
            <input type="text" name="voucherName" placeholder="Nhập tên của mã giảm giá" value=<?php echo "'" . $voucher_name . "'"?>><br>
        </div>
        <div class="wrap-input">
            <label for="">Sự kiện:</label>
            <select name="eventID" id="">
                <?php
                    foreach($events as $event) {
                        if ($event['eventID'] == $eventID) {
                            echo "<option selected value='" . $event['eventID'] . "'>" . $event['name'] . "</option>"; 
                        } else {
                            echo "<option value='" . $event['eventID'] . "'>" . $event['name'] . "</option>";
                        }
                    }
                ?>
                <!-- <option value="Valentine">Valentine</option>
                <option value="Black Friday">Black Friday</option> -->
            </select><br>
        </div>
        <div class="wrap-input">
            <label for="">Phần trăm giảm:</label>
            <input type="text" name="discountPercent" value=<?php echo "'" . $discountPercent ."'" ?> placeholder="Giá trị là một số từ 0-100">
        </div>
        <div class="wrap-input">
            <label for="">Giá trị giảm tối đa:</label>
            <input type="text" name="maxDiscount" value=<?php echo "'" . $maxDiscount ."'" ?> placeholder="Nhập giá trị giảm tối đa của voucher"><br>
        </div>
        <div class="wrap-input">
            <label for="">Giá trị đơn hàng tối thiểu:</label>
            <input type="text" name="minOrderPrice" value=<?php echo "'" . $minOrderPrice ."'" ?> placeholder="Giá trị phải là một số, tính theo đơn vị VNĐ"><br>
        </div>
        <div class="wrap-input">
            <label for="">Thời gian bắt đầu:</label>
            <select id="day" name="startDay">
                <?php
                    for ($i = 1; $i <= 31; $i++) {
                        if ($i == $startArr[2]) {
                            echo '<option selected value="'.$i.'">'.$i.'</option>'; 
                        } else {
                            echo '<option value="'.$i.'">'.$i.'</option>';
                        }
                    }
                ?>
            </select>
            <select id="month" name="startMonth">
                <?php
                    for ($i = 1; $i <= 12; $i++) {
                        if ($i == $startArr[1]) {
                            echo '<option selected value="'.$i.'">'.$i.'</option>'; 
                        } else {
                            echo '<option value="'.$i.'">'.$i.'</option>';
                        }
                    }
                ?>
            </select>
            <select id="year" name="startYear">
                <?php
                    $mydate = getdate();
                    $year = (int)"$mydate[year]";
                    for ($i = $year+1; $i >= 2000; $i--) {
                        if ($i == $startArr[0]) {
                            echo '<option selected value="'.$i.'">'.$i.'</option>'; 
                        } else {
                            echo '<option value="'.$i.'">'.$i.'</option>';
                        }
                    }
                ?>
            </select>
        </div>
        <div class="wrap-input">
            <label for="">Thời gian kết thúc:</label>
            <select id="day" name="endDay">
                <?php
                    for ($i = 1; $i <= 31; $i++) {
                        if ($i == $endArr[2]) {
                            echo '<option selected value="'.$i.'">'.$i.'</option>'; 
                        } else {
                            echo '<option value="'.$i.'">'.$i.'</option>';
                        }
                    }
                ?>
            </select>
            <select id="month" name="endMonth">
                <?php
                    for ($i = 1; $i <= 12; $i++) {
                        if ($i == $endArr[1]) {
                            echo '<option selected value="'.$i.'">'.$i.'</option>'; 
                        } else {
                            echo '<option value="'.$i.'">'.$i.'</option>';
                        }
                    }
                ?>
            </select>
            <select id="year" name="endYear">
                <?php
                    $mydate = getdate();
                    $year = (int)"$mydate[year]";
                    for ($i = $year+1; $i >= 2000; $i--) {
                        if ($i == $endArr[0]) {
                            echo '<option selected value="'.$i.'">'.$i.'</option>'; 
                        } else {
                            echo '<option value="'.$i.'">'.$i.'</option>';
                        }
                    }
                ?>
            </select>
        </div>

        <input type="hidden" name="voucherID" value="<?php echo $voucherID?>">
        
        <div class="wrap-submit">
            <input type="submit" value="Xác nhận">
        </div>
    </form>
</div>