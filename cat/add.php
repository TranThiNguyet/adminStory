﻿<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/adminStory/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/adminStory/templates/admin/inc/leftbar.php'; ?>
<div id="page-wrapper">
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Thêm danh mục</h2>
                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php
                                    //kiểm tra người dùng bấm submit
                                    if (isset($_POST['submit'])) {
                                        $name = $_POST['name'];
                                        $query = "INSERT INTO cat(name) VALUES ('{$name}')";
                                        $result = $mysqli->query($query);
                                        if ($result) {
                                            HEADER("LOCATION:index.php?msg=Thêm thành công");
                                            die();
                                        } else {
                                            echo "Có lỗi khi thêm danh mục";
                                            die();
                                        }
                                    }
                                    ?>
                                    <form action="" method="post" role="form">
                                        <div class="form-group">
                                            <label>Tên danh mục</label>
                                            <input type="text" name="name" class="form-control" />
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-success btn-md">Thêm</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Form Elements -->
                </div>
            </div>
            <!-- /. ROW  -->
        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/adminStory/templates/admin/inc/footer.php'; ?>