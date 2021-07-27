﻿<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/adminStory/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/adminStory/templates/admin/inc/leftbar.php'; ?>
<?php
//tổng số dòng
$queryTSD = "SELECT COUNT(*) AS TSD  FROM contact";
$resultTSD = $mysqli->query($queryTSD);
$arTSD = mysqli_fetch_assoc($resultTSD);
$TongSoDong = $arTSD['TSD'];
//Lấy truyện trên một trang
$row_count = ROW_COUNT;
//tổng số trang
$TongSoTrang = ceil($TongSoDong / $row_count);
//trang hiện tại
$current_page = 1;
if (isset($_GET['page'])) {
    $current_page = $_GET['page'];
}
//offset
$offset = ($current_page - 1) * $row_count;
?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Quản lý liên hệ</h2>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />
        <?php
        if (isset($_GET['msg'])) {
            echo $_GET['msg'];
        }
        ?>
        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <div class="row">
                                <div class="col-sm-6">

                                </div>
                                <div class="col-sm-6" style="text-align: right;">
                                    <form method="post" action="">
                                        <input type="submit" name="search" value="Tìm kiếm" class="btn btn-warning btn-sm" style="float:right" />
                                        <input type="search" class="form-control input-sm" placeholder="Nhập tên truyện" style="float:right; width: 300px;" />
                                        <div style="clear:both"></div>
                                    </form><br />
                                </div>
                            </div>

                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên</th>
                                        <th>Email</th>
                                        <th>Website</th>
                                        <th>Nội dung</th>
                                        <th width="160px">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT * FROM contact ORDER BY contact_id DESC LIMIT {$offset}, {$row_count} ";
                                    $result = $mysqli->query($query);
                                    while ($arItem = mysqli_fetch_assoc($result)) {
                                        $contact_id = $arItem['contact_id'];
                                        $name = $arItem['name'];
                                        $email = $arItem['email'];
                                        $Website = $arItem['website'];
                                        $content = $arItem['content'];
                                    ?>
                                        <tr class="gradeX">
                                            <td><?php echo $contact_id; ?></td>
                                            <td><?php echo $name; ?></td>
                                            <td><?php echo $email; ?></td>
                                            <td><?php echo $Website; ?></td>
                                            <td><?php echo $content; ?></td>

                                            <td class="center">

                                                <a href="del.php?id=<?php echo $contact_id; ?>" onclick="return confirm('Bạn thực sự muốn xóa danh mục này?')" title="" class="btn btn-danger"><i class="fa fa-pencil"></i> Xóa</a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="dataTables_info" id="dataTables-example_info" style="margin-top:27px">Trang <?php echo $current_page; ?> của <?php echo $TongSoTrang; ?> truyện</div>
                                </div>
                                <div class="col-sm-6" style="text-align: right;">
                                    <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
                                        <ul class="pagination">
                                            <?php
                                            if ($current_page > 1 && $TongSoTrang > 1) {
                                            ?>
                                                <li class="paginate_button previous " aria-controls="dataTables-example" tabindex="0" id="dataTables-example_previous"><a href="index.php?page=<?php echo ($current_page - 1) ?>">Trang trước</a></li>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            for ($i = 1; $i <= $TongSoTrang; $i++) {
                                                if ($i == $current_page) {
                                            ?>
                                                    <li class="paginate_button active" aria-controls="dataTables-example" tabindex="0"><a href="#"><?php echo $current_page; ?></a></li>
                                                <?php
                                                } else {

                                                ?>
                                                    <li class="paginate_button " aria-controls="dataTables-example" tabindex="0"><a href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                                <?php
                                                }
                                                ?>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if ($current_page < $TongSoTrang && $TongSoTrang > 1) {
                                            ?>
                                                <li class="paginate_button next" aria-controls="dataTables-example" tabindex="0" id="dataTables-example_next"><a href="index.php?page=<?php echo ($current_page + 1) ?>">Trang tiếp</a></li>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/adminStory/templates/admin/inc/footer.php'; ?>