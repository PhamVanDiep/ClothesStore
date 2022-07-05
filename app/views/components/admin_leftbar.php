<?php global $path_project; ?>
<div class="col-2" id="left-bar">
    <div id="homepage" class="col-12">
        <a href= <?php echo "/" . $path_project . "/"; ?>>THDD</a>
    </div>
    <a href= <?php echo "/" . $path_project . "/dashboard"; ?>><div class="list-managements col-12" id="dashboard-wrap">
        <div class="leftbar-icon-wrap">
            <img src="public/res/img/admin/dashboard.png" class="left-icon">
        </div><div class="leftbar-title-wrap">
            <span class="left-title">Tổng quan</span>
        </div>
    </div></a>
    <div class="list-managements col-12" id="order-wrap">
        <div class="leftbar-icon-wrap">
            <img src="public/res/img/admin/order.png" class="left-icon">
        </div><div class="leftbar-title-wrap">
            <span class="left-title">Đơn hàng</span>
        </div><div class="leftbar-extend-wrap">
            <img src="public/res/img/admin/right.png" id="order-extend-icon">
        </div>
    </div>
    <div class="col-12" id="list-order-wrap">
        <div class="leftbar-small-title-wrap">
            <span class="left-title">Tất cả đơn hàng</span>
        </div><div class="leftbar-small-title-wrap">
            <span class="left-title">Đơn hàng mới</span>
        </div><div class="leftbar-small-title-wrap">
            <span class="left-title">Đơn hàng đang giao</span>
        </div><div class="leftbar-small-title-wrap">
            <span class="left-title">Đơn hàng đã giao</span>
        </div><div class="leftbar-small-title-wrap">
            <span class="left-title">Đơn hàng đã hủy</span>
        </div>
    </div>
    <div class="list-managements col-12" id="product-wrap">
        <div class="leftbar-icon-wrap">
            <img src="public/res/img/admin/product.png" class="left-icon">
        </div><div class="leftbar-title-wrap">
            <span class="left-title">Sản phẩm</span>
        </div><div class="leftbar-extend-wrap">
            <img src="public/res/img/admin/right.png" id="product-extend-icon">
        </div>
    </div>
    <div class="col-12" id="list-product-wrap">
        <div class="leftbar-small-title-wrap">
            <span class="left-title">Danh sách sản phẩm</span>
        </div><div class="leftbar-small-title-wrap">
            <span class="left-title">Thêm sản phẩm</span>
        </div>
    </div>
    <div class="list-managements col-12" id="event-wrap">
        <div class="leftbar-icon-wrap">
            <img src="public/res/img/admin/event.png" class="left-icon">
        </div><div class="leftbar-title-wrap">
            <span class="left-title">Sự kiện</span>
        </div><div class="leftbar-extend-wrap">
            <img src="public/res/img/admin/right.png" id="event-extend-icon">
        </div>
    </div>
    <div class="col-12" id="list-event-wrap">
        <a href= <?php echo "/" . $path_project . "/event-management"; ?>><div class="leftbar-small-title-wrap">
            <span class="left-title">Danh sách sự kiện</span>
        </div></a><a href= <?php echo "/" . $path_project . "/add-event"; ?>><div class="leftbar-small-title-wrap">
            <span class="left-title">Thêm sự kiện</span>
        </div></a>
    </div>
    <div class="list-managements col-12" id="voucher-wrap">
        <div class="leftbar-icon-wrap">
            <img src="public/res/img/admin/voucher.png" class="left-icon">
        </div><div class="leftbar-title-wrap">
            <span class="left-title">Mã giảm giá</span>
        </div><div class="leftbar-extend-wrap">
            <img src="public/res/img/admin/right.png" id="voucher-extend-icon">
        </div>
    </div>
    <div class="col-12" id="list-voucher-wrap">
        <div class="leftbar-small-title-wrap">
            <span class="left-title">Danh sách mã giảm giá</span>
        </div><a href= <?php echo "/" . $path_project . "/add-event"; ?>><div class="leftbar-small-title-wrap">
            <span class="left-title">Thêm mã giảm giá</span>
        </div></a>
    </div>
</div>
<!-- <script src="public/js/admin_leftbar.js"></script> -->
<script>
    // Category hover 
    const listManagements = document.getElementsByClassName("list-managements");
    for (let index = 0; index < listManagements.length; index++) {
        const element = listManagements[index];
        element.onmouseenter = function () {
            element.style.backgroundColor = "#5994c6";
        }
        element.onmouseleave = function () {
            element.style.backgroundColor = "#0a0f55";
        }
    }

    // list of orders hover
    const orderType = document.getElementsByClassName("leftbar-small-title-wrap");
    for (let index = 0; index < orderType.length; index++) {
        const element = orderType[index];
        element.onmouseenter = function () {
            element.style.backgroundColor = "#5994c6";
        }
        element.onmouseleave = function () {
            element.style.backgroundColor = "#0a0f55";
        }
    }

    // Show and hide list of orders
    let isListOrderOpened = false;
    const orderList = document.getElementById("list-order-wrap");
    const orderExtendIcon = document.getElementById("order-extend-icon");
    listManagements[1].onclick = function () {
        if (!isListOrderOpened) {
            isListOrderOpened = true;
            orderList.style.display = "block";
            orderExtendIcon.setAttribute("src", "public/res/img/admin/down.png");
        }else{
            isListOrderOpened = false;
            orderList.style.display = "none";
            orderExtendIcon.setAttribute("src", "public/res/img/admin/right.png");
        }
    }

    // Show and hide list of events
    let isListEventOpened = false;
    const eventList = document.getElementById("list-event-wrap");
    const eventExtendIcon = document.getElementById("event-extend-icon");
    listManagements[3].onclick = function () {
        if (!isListEventOpened) {
            isListEventOpened = true;
            eventList.style.display = "block";
            eventExtendIcon.setAttribute("src", "public/res/img/admin/down.png");
        }else{
            isListEventOpened = false;
            eventList.style.display = "none";
            eventExtendIcon.setAttribute("src", "public/res/img/admin/right.png");
        }
    }

    // Show and hide list of products
    let isListProductOpened = false;
    const productList = document.getElementById("list-product-wrap");
    const productExtendIcon = document.getElementById("product-extend-icon");
    listManagements[2].onclick = function () {
        if (!isListProductOpened) {
            isListProductOpened = true;
            productList.style.display = "block";
            productExtendIcon.setAttribute("src", "public/res/img/admin/down.png");
        }else{
            isListProductOpened = false;
            productList.style.display = "none";
            productExtendIcon.setAttribute("src", "public/res/img/admin/right.png");
        }
    }

    // Show and hide list of vouchers
    let isListVoucherOpened = false;
    const voucherList = document.getElementById("list-voucher-wrap");
    const voucherExtendIcon = document.getElementById("voucher-extend-icon");
    listManagements[4].onclick = function () {
        if (!isListVoucherOpened) {
            isListVoucherOpened = true;
            voucherList.style.display = "block";
            voucherExtendIcon.setAttribute("src", "public/res/img/admin/down.png");
        }else{
            isListVoucherOpened = false;
            voucherList.style.display = "none";
            voucherExtendIcon.setAttribute("src", "public/res/img/admin/right.png");
        }
    }
</script>