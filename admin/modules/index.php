
<?php
    require_once __DIR__ . "/../autoload/autoload.php";
    $category = $db -> fetchAll("category");

?>


<?php require_once __DIR__ . "/../layouts/header.php"; ?>

            <!-- Noi dung -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Chào bạn đến trang quản lý Choxemay.com
                    </h1>
                </div>
            </div>
            <!-- /.row -->
<?php require_once __DIR__ . "/../layouts/header.php";?>