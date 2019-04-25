<!DOCTYPE html>
<html lang="en">

<?php require_once __DIR__ . '\..\../layouts\header.php'?>
<?php require_once __DIR__ . "/../../autoload/autoload.php";

$open = "category";

$id = intval(getInput('id'));

$EditCategory = $db -> fetchID("category", $id);
if(empty($EditCategory))
{
    $_SESSION['error'] = "Dữ liệu không tồn tại";
    redirectCate("category");
}
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $data =
        [
            "name"  =>  postInput('name'),
            "slug" => to_slug(postInput("name"))
        ];
    $error = [];

    if (postInput('name') == '')
    {
        $error['name'] = "Xin vui lòng nhập đầy đủ tên danh mục";
    }
    if (empty($error)) {
        if ($EditCategory['name'] != $data['name']) {
            $isset = $db->fetchOne("category", "name = '" . $data['name'] . " ' ");
            if (count($isset) > 0) {
                $_SESSION['error'] = " Tên danh mục đã tồn tại ! ";
            } else {
                $id_update = $db->update("category", $data, array("id" => $id));

                if ($id_update > 0) {
                    $_SESSION['success'] = "Cập nhật thành công";
                    redirectCate("category");

                } else {
                    $_SESSION['error'] = "Dữ liệu không thay đổi";
                    redirectCate("category");
                }
            }
        } else {
            $id_update = $db->update("category", $data, array("id" => $id));

            if ($id_update > 0) {
                $_SESSION['success'] = "Cập nhật thành công";
                redirectCate("category");

            } else {
                $_SESSION['error'] = "Dữ liệu không thay đổi";
                redirectCate("category");
            }
        }
    }

}
?>
<?php
//$category = $db -> fetchAll("category");
//var_dump($category)
//?>

<div id="content-wrapper">

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/../choxemay/public/index.php">Trang chủ</a>
            </li>
            <li class="breadcrumb-item">
                <a href="/../choxemay/admin/modules/category/index.php">Danh sách danh mục</a>
            </li>
            <li class="breadcrumb-item active">Chỉnh sửa</li>
        </ol>

        <!-- Page Content -->
        <h1>Chỉnh sửa danh mục
        </h1>

        <hr>



    </div>

    <div class="clearfix">
        <?php if(isset($_SESSION['error'])) :?>
            <div class = "alert alert-danger">
                <?php echo $_SESSION['error'];
                unset($_SESSION['error']) ?>
            </div>
        <?php endif; ?>

    </  div>
    <div class="container-fluid">
        <form class = "form-horizontal" action="" method="POST">
            <div class="form-group">
                <label for="exampleInputEmail1">Tên danh mục</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tên item" name = "name"
                value = "<?php echo $EditCategory['name']?>"
                >
                <?php if (isset($error['name'])): ?>
                    <p class="text-danger">
                        <?php echo $error['name'] ?>
                    </p>
                <?php endif ?>


            </div>
            <!--        <div class="form-group">-->
            <!--            <label for="exampleInputPassword1">Password</label>-->
            <!--            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">-->
            <!--        </div>-->
            <button type="submit" class="btn btn-success">Lưu</button>
        </form>
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



</html>
