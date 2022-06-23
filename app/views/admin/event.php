<!Doctype html>
<html>
    <head>
    <link rel="stylesheet" href="public/css/admin_root.css" />
        <link rel="stylesheet" href="public/css/admin_leftbar.css" />
        <link rel="stylesheet" href="public/css/admin_header.css" />
        <link rel="stylesheet" href="public/css/admin/event.css" />
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
    <div class="col-10" id="head-bar">
            <?php 
                require_once ROOT . DS . 'app' . DS . 'views' . DS . 'components' . DS . 'admin_header.php';
            ?>
        </div>
        <?php 
            require_once ROOT . DS . 'app' . DS . 'views' . DS . 'components' . DS . 'admin_leftbar.php';
        ?>
        <div id="content" class="col-10">
            <div id="body">
                <table>
                    <thead> 
                        <tr>
                            <td>ID</td>
                            <td>Tên sự kiện</td>
                            <!-- <td>Đối tượng</td> -->
                            <td>Bắt đầu</td>
                            <td>Kết thúc</td>
                            <td></td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#123456</td>
                            <td>Sự kiện sale sập sàn</td>
                            <!-- <td>Quần âu nam, Áo sơ mi nam, Áo sơ mi nữ</td> -->
                            <td>15:30 11/11/2022</td>
                            <td>15:30 12/12/2022</td>
                            <td><img src="public/res/img/admin/edit.png" class="edit-button crud"></td>
                            <td><img src="public/res/img/admin/delete.png" class="delete-button crud"></td>
                        </tr>
                        <tr>
                            <td>#123456</td>
                            <td>Sự kiện sale sập sàn</td>
                            <!-- <td>Quần âu nam, Áo sơ mi nam, Áo sơ mi nữ</td> -->
                            <td>11/11/2022</td>
                            <td>12/12/2022</td>
                            <td><img src="public/res/img/admin/edit.png" class="edit-button crud"></td>
                            <td><img src="public/res/img/admin/delete.png" class="delete-button crud"></td>
                        </tr>
                        <tr>
                            <td>#123456</td>
                            <td>Sự kiện sale sập sàn</td>
                            <!-- <td>Quần âu nam, Áo sơ mi nam, Áo sơ mi nữ</td> -->
                            <td>11/11/2022</td>
                            <td>12/12/2022</td>
                            <td><img src="public/res/img/admin/edit.png" class="edit-button crud"></td>
                            <td><img src="public/res/img/admin/delete.png" class="delete-button crud"></td>
                        </tr>
                        <tr>
                            <td>#123456</td>
                            <td>Sự kiện sale sập sàn</td>
                            <!-- <td>Quần âu nam, Áo sơ mi nam, Áo sơ mi nữ</td> -->
                            <td>11/11/2022</td>
                            <td>12/12/2022</td>
                            <td><img src="public/res/img/admin/edit.png" class="edit-button crud"></td>
                            <td><img src="public/res/img/admin/delete.png" class="delete-button crud"></td>
                        </tr>
                        <tr>
                            <td>#123456</td>
                            <td>Sự kiện sale sập sàn</td>
                            <!-- <td>Quần âu nam, Áo sơ mi nam, Áo sơ mi nữ</td> -->
                            <td>11/11/2022</td>
                            <td>12/12/2022</td>
                            <td><img src="public/res/img/admin/edit.png" class="edit-button crud"></td>
                            <td><img src="public/res/img/admin/delete.png" class="delete-button crud"></td>
                        </tr>
                        <tr>
                            <td>#123456</td>
                            <td>Sự kiện sale sập sàn</td>
                            <!-- <td>Quần âu nam, Áo sơ mi nam, Áo sơ mi nữ</td> -->
                            <td>11/11/2022</td>
                            <td>12/12/2022</td>
                            <td><img src="public/res/img/admin/edit.png" class="edit-button crud"></td>
                            <td><img src="public/res/img/admin/delete.png" class="delete-button crud"></td>
                        </tr>
                        <tr>
                            <td>#123456</td>
                            <td>Sự kiện sale sập sàn</td>
                            <!-- <td>Quần âu nam, Áo sơ mi nam, Áo sơ mi nữ</td> -->
                            <td>11/11/2022</td>
                            <td>12/12/2022</td>
                            <td><img src="public/res/img/admin/edit.png" class="edit-button crud"></td>
                            <td><img src="public/res/img/admin/delete.png" class="delete-button crud"></td>
                        </tr>
                        <tr>
                            <td>#123456</td>
                            <td>Sự kiện sale sập sàn</td>
                            <!-- <td>Quần âu nam, Áo sơ mi nam, Áo sơ mi nữ</td> -->
                            <td>11/11/2022</td>
                            <td>12/12/2022</td>
                            <td><img src="public/res/img/admin/edit.png" class="edit-button crud"></td>
                            <td><img src="public/res/img/admin/delete.png" class="delete-button crud"></td>
                        </tr>
                        <tr>
                            <td>#123456</td>
                            <td>Sự kiện sale sập sàn</td>
                            <!-- <td>Quần âu nam, Áo sơ mi nam, Áo sơ mi nữ</td> -->
                            <td>11/11/2022</td>
                            <td>12/12/2022</td>
                            <td><img src="public/res/img/admin/edit.png" class="edit-button crud"></td>
                            <td><img src="public/res/img/admin/delete.png" class="delete-button crud"></td>
                        </tr>
                        <tr>
                            <td>#123456</td>
                            <td>Sự kiện sale sập sàn</td>
                            <!-- <td>Quần âu nam, Áo sơ mi nam, Áo sơ mi nữ</td> -->
                            <td>11/11/2022</td>
                            <td>12/12/2022</td>
                            <td><img src="public/res/img/admin/edit.png" class="edit-button crud"></td>
                            <td><img src="public/res/img/admin/delete.png" class="delete-button crud"></td>
                        </tr>
                        <tr>
                            <td>#123456</td>
                            <td>Sự kiện sale sập sàn</td>
                            <!-- <td>Quần âu nam, Áo sơ mi nam, Áo sơ mi nữ</td> -->
                            <td>11/11/2022</td>
                            <td>12/12/2022</td>
                            <td><img src="public/res/img/admin/edit.png" class="edit-button crud"></td>
                            <td><img src="public/res/img/admin/delete.png" class="delete-button crud"></td>
                        </tr>
                        <tr>
                            <td>#123456</td>
                            <td>Sự kiện sale sập sàn</td>
                            <!-- <td>Quần âu nam, Áo sơ mi nam, Áo sơ mi nữ</td> -->
                            <td>11/11/2022</td>
                            <td>12/12/2022</td>
                            <td><img src="public/res/img/admin/edit.png" class="edit-button crud"></td>
                            <td><img src="public/res/img/admin/delete.png" class="delete-button crud"></td>
                        </tr>
                        <tr>
                            <td>#123456</td>
                            <td>Sự kiện sale sập sàn</td>
                            <!-- <td>Quần âu nam, Áo sơ mi nam, Áo sơ mi nữ</td> -->
                            <td>11/11/2022</td>
                            <td>12/12/2022</td>
                            <td><img src="public/res/img/admin/edit.png" class="edit-button crud"></td>
                            <td><img src="public/res/img/admin/delete.png" class="delete-button crud"></td>
                        </tr>
                        <tr>
                            <td>#123456</td>
                            <td>Sự kiện sale sập sàn</td>
                            <!-- <td>Quần âu nam, Áo sơ mi nam, Áo sơ mi nữ</td> -->
                            <td>11/11/2022</td>
                            <td>12/12/2022</td>
                            <td><img src="public/res/img/admin/edit.png" class="edit-button crud"></td>
                            <td><img src="public/res/img/admin/delete.png" class="delete-button crud"></td>
                        </tr>
                        <tr>
                            <td>#123456</td>
                            <td>Sự kiện sale sập sàn</td>
                            <!-- <td>Quần âu nam, Áo sơ mi nam, Áo sơ mi nữ</td> -->
                            <td>11/11/2022</td>
                            <td>12/12/2022</td>
                            <td><img src="public/res/img/admin/edit.png" class="edit-button crud"></td>
                            <td><img src="public/res/img/admin/delete.png" class="delete-button crud"></td>
                        </tr>
                        <tr>
                            <td>#123456</td>
                            <td>Sự kiện sale sập sàn</td>
                            <!-- <td>Quần âu nam, Áo sơ mi nam, Áo sơ mi nữ</td> -->
                            <td>11/11/2022</td>
                            <td>12/12/2022</td>
                            <td><img src="public/res/img/admin/edit.png" class="edit-button crud"></td>
                            <td><img src="public/res/img/admin/delete.png" class="delete-button crud"></td>
                        </tr>
                        <tr>
                            <td>#123456</td>
                            <td>Sự kiện sale sập sàn</td>
                            <!-- <td>Quần âu nam, Áo sơ mi nam, Áo sơ mi nữ</td> -->
                            <td>11/11/2022</td>
                            <td>12/12/2022</td>
                            <td><img src="public/res/img/admin/edit.png" class="edit-button crud"></td>
                            <td><img src="public/res/img/admin/delete.png" class="delete-button crud"></td>
                        </tr>
                        <tr>
                            <td>#123456</td>
                            <td>Sự kiện sale sập sàn</td>
                            <!-- <td>Quần âu nam, Áo sơ mi nam, Áo sơ mi nữ</td> -->
                            <td>11/11/2022</td>
                            <td>12/12/2022</td>
                            <td><img src="public/res/img/admin/edit.png" class="edit-button crud"></td>
                            <td><img src="public/res/img/admin/delete.png" class="delete-button crud"></td>
                        </tr>
                        <tr>
                            <td>#123456</td>
                            <td>Sự kiện sale sập sàn</td>
                            <!-- <td>Quần âu nam, Áo sơ mi nam, Áo sơ mi nữ</td> -->
                            <td>11/11/2022</td>
                            <td>12/12/2022</td>
                            <td><img src="public/res/img/admin/edit.png" class="edit-button crud"></td>
                            <td><img src="public/res/img/admin/delete.png" class="delete-button crud"></td>
                        </tr>
                        <tr>
                            <td>#123456</td>
                            <td>Sự kiện sale sập sàn</td>
                            <!-- <td>Quần âu nam, Áo sơ mi nam, Áo sơ mi nữ</td> -->
                            <td>11/11/2022</td>
                            <td>12/12/2022</td>
                            <td><img src="public/res/img/admin/edit.png" class="edit-button crud"></td>
                            <td><img src="public/res/img/admin/delete.png" class="delete-button crud"></td>
                        </tr>
                        <tr>
                            <td>#123456</td>
                            <td>Sự kiện sale sập sàn</td>
                            <!-- <td>Quần âu nam, Áo sơ mi nam, Áo sơ mi nữ</td> -->
                            <td>11/11/2022</td>
                            <td>12/12/2022</td>
                            <td><img src="public/res/img/admin/edit.png" class="edit-button crud"></td>
                            <td><img src="public/res/img/admin/delete.png" class="delete-button crud"></td>
                        </tr>
                        <tr>
                            <td>#123456</td>
                            <td>Sự kiện sale sập sàn</td>
                            <!-- <td>Quần âu nam, Áo sơ mi nam, Áo sơ mi nữ</td> -->
                            <td>11/11/2022</td>
                            <td>12/12/2022</td>
                            <td><img src="public/res/img/admin/edit.png" class="edit-button crud"></td>
                            <td><img src="public/res/img/admin/delete.png" class="delete-button crud"></td>
                        </tr>
                        <tr>
                            <td>#123456</td>
                            <td>Sự kiện sale sập sàn</td>
                            <!-- <td>Quần âu nam, Áo sơ mi nam, Áo sơ mi nữ</td> -->
                            <td>11/11/2022</td>
                            <td>12/12/2022</td>
                            <td><img src="public/res/img/admin/edit.png" class="edit-button crud"></td>
                            <td><img src="public/res/img/admin/delete.png" class="delete-button crud"></td>
                        </tr>
                        <tr>
                            <td>#123456</td>
                            <td>Sự kiện sale sập sàn</td>
                            <!-- <td>Quần âu nam, Áo sơ mi nam, Áo sơ mi nữ</td> -->
                            <td>14:30 11/11/2022</td>
                            <td>14:30 12/12/2022</td>
                            <td><img src="public/res/img/admin/edit.png" class="edit-button crud"></td>
                            <td><img src="public/res/img/admin/delete.png" class="delete-button crud"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>