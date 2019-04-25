<?php require_once __DIR__ . '\..\../layouts\header.php'?>
<?php require_once __DIR__ . "/../../autoload/autoload.php"?>
<?php


$open = "admin";


$sql = "SELECT admin.* FROM admin ORDER BY id DESC";

$admin = $db -> fetchJone("admin",$sql);

?>

<div id="content-wrapper">

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/../choxemay/public/index.php">Trang chủ</a>
            </li>
            <li class="breadcrumb-item active">Quản lý quản trị viên</li>
        </ol>

        <!-- Page Content -->
        <h1>Quản lý quản trị viên

            <a href="add.php" class="btn btn-success">Thêm mới</a>


        </h1>

        <hr>


    </div>
    <div class = "clearfix"></div>

    <!--   Thông báo notice-->
    <?php require_once __DIR__ . "/../../../partials/notification.php";?>



    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Danh sách quản trị viên</div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Edit</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php $stt = 1; foreach ($admin as $item): ?>
                        <tr>
                            <td><?php echo $stt ?></td>
                            <td><?php echo $item['name'] ?></td>
                            <td><?php echo $item['email'] ?></td>
                            <td><?php echo $item['phone'] ?></td>
                            <td><?php echo $item['address'] ?></td>

                            <td>
                                <a class="btn btn-xs btn-info" href="edit.php?id=<?php echo $item['id'] ?>"> <i class="fa fa-edit"></i> Sửa</a>
                                <a class="btn btn-xs btn-danger"href="delete.php?id=<?php echo $item['id'] ?>"><i class="fa fa-times"></i> Xóa</a>
                            </td>

                        </tr>
                        <?php $stt++ ; endforeach; ?>


                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    <!-- Sticky Footer -->
    <footer class="sticky-footer">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Choxemay.com Group 01</span>
            </div>
        </div>
    </footer>

</div>
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . "/../../layouts/footer.php" ?>

