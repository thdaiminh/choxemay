<!DOCTYPE html>
<html lang="en">

<?php require_once  __DIR__ . '/../../../partials/notification.php' ?>
<?php require_once __DIR__ . "/../../autoload/autoload.php";

$open = "admin";

$id = intval(getInput('id'));

$EditAdm = $db -> fetchID("admin", $id);
if(empty($EditAdm))
{
    $_SESSION['error'] = "Dữ liệu không tồn tại";
    redirectAdm("admin");
}

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $data  =
        [
            "name"  =>  postInput('name'),
            "email" => postInput('email'),
            "phone" => postInput('phone'),
            "address" => postInput('address'),
            "level" => postInput('level')
        ];
    $error = [];

    if (postInput('name') == '')
    {
        $error['name'] = "Xin vui lòng nhập đầy đủ họ và tên";
    }

    if (postInput('email') == '')
    {
        $error['email'] = "Xin vui lòng nhập email";
    }
    else
    {
        if(postInput("email") != $EditAdm['email'])
        {
            $is_check = $db ->fetchOne("admin", " email = '".$data['email']."' ");
            if($is_check != NULL)
            {
                $error['email'] = "Email đã tồn tại";
            }
        }

    }

    if (postInput('phone') == '')
    {
        $error['phone'] = "Xin vui lòng nhập số điện thoại";
    }

    if (postInput('password') == '')
    {
        $error['password'] = "Xin vui lòng nhập mật khẩu";
    }

    if (postInput('address') == '')
    {
        $error['address'] = "Xin vui lòng nhập địa chỉ";
    }

    if(postInput('password') != NULL && postInput("re_password") != NULL)
    {
        if(postInput('password') != postInput('re_password'))
        {
            $error['password'] = "Mật khẩu thay đổi không khớp";
        }
        else
        {
            $data['password'] = MD5(postInput("password"));
        }
    }

    if (empty($error))
    {

        $id_update = $db -> update("admin",$data,array("id"=>$id) );
        if ($id_update)
        {
            $_SESSION['success'] = "Cập nhật thành công";
            redirectAdm("admin");
        }
        else
        {
            $_SESSION['error'] = "Cập nhật thất bại";
            redirectAdm("admin");
        }

    }

}
?>

<?php require_once __DIR__ . '\..\../layouts\header.php'?>
<div id="content-wrapper">

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/../choxemay/public/index.php">Trang chủ</a>
            </li>
            <li class="breadcrumb-item">
                <a href="/../choxemay/admin/modules/admin/index.php">Quản lý người dùng</a>
            </li>
            <li class="breadcrumb-item active">Sửa người dùng</li>
        </ol>

        <!-- Page Content -->
        <h1> Sửa người dùng </h1>

        <hr>
    </div>

    <div class="clearfix"> </div>

    <div class="container-fluid">
        <form class = "form-horizontal" action="" method="POST"">
            <div class="form-group col-md-5">
                <label for="exampleInputEmail1">Họ và tên</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ex: Nguyễn Văn A"
                       name = "name" value = <?php echo $EditAdm ['name']?>>
                <?php if (isset($error['name'])): ?>
                    <p class="text-danger">
                        <?php echo $error['name'] ?>
                    </p>
                <?php endif ?>
            </div>



            <div class="form-group col-md-5">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="abcd@hotmail.com"
                       name = "email" value = <?php echo $EditAdm ['email']?>>
                <?php if (isset($error['email'])): ?>
                    <p class="text-danger">
                        <?php echo $error['email'] ?>
                    </p>
                <?php endif ?>
            </div>

            <div class="form-group col-md-5">
                <label for="exampleInputEmail1">Số điện thoại</label>
                <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="0912345678"
                       name = "phone" value = <?php echo $EditAdm ['phone']?>>
                <?php if (isset($error['phone'])): ?>
                    <p class="text-danger">
                        <?php echo $error['phone'] ?>
                    </p>
                <?php endif ?>
            </div>

            <div class="form-group col-md-5">
                <label for="exampleInputEmail1">Địa chỉ</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="001 Nguyễn Văn Cừ"
                       name = "address" value = <?php echo $EditAdm ['address']?>>
                <?php if (isset($error['address'])): ?>
                    <p class="text-danger">
                        <?php echo $error['address'] ?>
                    </p>
                <?php endif ?>
            </div>


            <div class="form-group col-md-5">
                <label for="exampleInputEmail1">Mật khẩu</label>
                <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="********" name = "password">
                <?php if (isset($error['password'])): ?>
                    <p class="text-danger">
                        <?php echo $error['password'] ?>
                    </p>
                <?php endif ?>
            </div>

            <div class="form-group col-md-5">
                <label for="exampleInputEmail1">Nhập lại mật khẩu</label>
                <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="********"  name = "re_password" required>
                <?php if (isset($error['re_password'])): ?>
                    <p class="text-danger">
                        <?php echo $error['re_password'] ?>
                    </p>
                <?php endif ?>
            </div>



            <?php /*
            <div class="form-group col-md-5">
                <label for="exampleInputEmail1">Phân cấp</label>
                <select class="form-control" name ="level">
                    <option value="1" <?php echo isset($EditAdm ['level']) && $EditAdm ['level'] == 1 ?
                        "selected = 'selected'": '' ?>>Seller</option>
                    <option value="2"<?php echo isset($EditAdm ['level']) && $EditAdm ['level'] ==  2 ?
                        "selected = 'selected'": '' ?>>Admin</option>
                </select>
                <?php if (isset($error['level'])): ?>
                    <p class="text-danger">
                        <?php echo $error['level'] ?>
                    </p>
                <?php endif ?>
            </div>
            */ ?>


            <div class="form-group col-md-5">
                <button type="submit" class="btn btn-success">Lưu</button>
            </div>
        </form>
    </div>
    <!--        <div class="form-group">-->
    <!--            <label for="exampleInputPassword1">Password</label>-->
    <!--            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">-->
    <!--        </div>-->

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
