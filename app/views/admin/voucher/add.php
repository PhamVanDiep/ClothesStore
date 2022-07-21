<?php

    require_once ROOT . DS . 'services' . DS . 'EventService.php';
    $event_service = new EventService();
    $events = $event_service->getAll();

?>

<div class="body col-11">
    <h1 class="title">Thêm mã giảm giá</h1>
    <form action="libraries/admin/voucher/insert_voucher.php" method="post">
        <div class="wrap-input">
            <label for="">Tên mã giảm giá:</label>
            <input type="text" name="voucherName" placeholder="Nhập tên của mã giảm giá" required><br>
        </div>
        <div class="wrap-input">
            <label for="">Sự kiện:</label>
            <select name="eventID" id="">
                <?php
                    foreach($events as $event) {
                        echo "<option value='" . $event['eventID'] . "'>" . $event['name'] . "</option>";
                    }
                ?>
                <!-- <option value="Valentine">Valentine</option>
                <option value="Black Friday">Black Friday</option> -->
            </select><br>
        </div>
        <div class="wrap-input">
            <label for="">Phần trăm giảm:</label>
            <input type="text" name="discountPercent" placeholder="Giá trị là một số từ 0-100" required>
        </div>
        <div class="wrap-input">
            <label for="">Giá trị giảm tối đa:</label>
            <input type="text" name="maxDiscount" placeholder="Nhập giá trị giảm tối đa của voucher" required><br>
        </div>
        <div class="wrap-input">
            <label for="">Giá trị đơn hàng tối thiểu:</label>
            <input type="text" name="minOrderPrice" placeholder="Giá trị phải là một số, tính theo đơn vị VNĐ" required><br>
        </div>
        <div class="wrap-input">
            <label for="">Thời gian bắt đầu:</label>
            <select id="day" name="startDay">
                <?php
                    for ($i = 1; $i <= 31; $i++) {
                        echo '<option value="'.$i.'">'.$i.'</option>';
                    }
                ?>
            </select>
            <select id="month" name="startMonth">
                <?php
                    for ($i = 1; $i <= 12; $i++) {
                        echo '<option value="'.$i.'">'.$i.'</option>';
                    }
                ?>
            </select>
            <select id="year" name="startYear">
                <?php
                    $mydate = getdate();
                    $year = (int)"$mydate[year]";
                    for ($i = $year+1; $i >= 2000; $i--) {
                        echo '<option value="'.$i.'">'.$i.'</option>';
                    }
                ?>
            </select>
        </div>
        <div class="wrap-input">
            <label for="">Thời gian kết thúc:</label>
            <select id="day" name="endDay">
                <?php
                    for ($i = 1; $i <= 31; $i++) {
                        echo '<option value="'.$i.'">'.$i.'</option>';
                    }
                ?>
            </select>
            <select id="month" name="endMonth">
                <?php
                    for ($i = 1; $i <= 12; $i++) {
                        echo '<option value="'.$i.'">'.$i.'</option>';
                    }
                ?>
            </select>
            <select id="year" name="endYear">
                <?php
                    $mydate = getdate();
                    $year = (int)"$mydate[year]";
                    for ($i = $year+1; $i >= 2000; $i--) {
                        echo '<option value="'.$i.'">'.$i.'</option>';
                    }
                ?>
            </select>
        </div>
        
        <div class="wrap-submit">
            <input type="submit" value="Xác nhận">
        </div>
    </form>
</div>