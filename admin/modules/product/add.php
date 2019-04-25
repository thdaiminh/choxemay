<!DOCTYPE html>
<html lang="en">

<?php require_once  __DIR__ . '/../../../partials/notification.php' ?>
<?php require_once __DIR__ . "/../../autoload/autoload.php";

$open = "product";
$open1 = "category";
$product = $db ->fetchAll("product");
$category = $db ->fetchAll("category");

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $data =
        [
            "name"  =>  postInput('name'),
            "slug" => to_slug(postInput("name")),
            "category_id" => postInput('category_id'),
            "price" => postInput('price'),
            "content" => postInput('content')
        ];
    $error = [];

    if (postInput('name') == '')
    {
        $error['name'] = "Xin vui lòng nhập đầy đủ tên sản phẩm";
    }

    if (postInput('category_id') == '')
    {
        $error['category_id'] = "Xin vui lòng chọn hãng xe";
    }

    if (postInput('price') == '')
    {
        $error['price'] = "Xin vui lòng nhập giá sản phẩm";
    }

    if (postInput('content') == ' ')
    {
        $error['content'] = "Xin vui lòng nhập thông tin sản phẩm";
    }

    if (!isset($_FILES['img']))
    {
        $error['img'] = "Xin vui lòng thêm hình ảnh";
    }

    //_debug($error);



    if (empty($error) == true)
    {
        if (isset($_FILES['img']))
        {
            $file_name = $_FILES['img']['name'];
            $file_tmp = $_FILES['img']['tmp_name'];
            $file_type = $_FILES['img']['type'];
            $file_error = $_FILES['img']['error'];

            if($file_error == 0)
            {
                $part = ROOT ."product/";
                $data['img'] = $file_name;
                move_uploaded_file($file_tmp,$part.$file_name);
                printf($part);
            }
        }

        $id_insert = $db -> insert("product",$data);
         if ($id_insert)
            {

                $_SESSION['success'] = "Thêm sản phẩm thành công";
                redirectProc("product");
            }
            else
            {
                $_SESSION['error'] = "Thêm sản phẩm thất bại";
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
                    <a href="/../choxemay/admin/modules/product/index.php">Danh sách sản phẩm</a>
                </li>
                <li class="breadcrumb-item active">Thêm mới</li>
            </ol>

            <!-- Page Content -->
            <h1> Thêm mới sản phẩm </h1>

            <hr>
        </div>

        <div class="clearfix"> </div>

        <div class="container-fluid">
            <form class = "form-horizontal" action="" method="POST" enctype="multipart/form-data">
                <div class="form-group col-md-5">
                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tên item" name = "name">
                    <?php if (isset($error['name'])): ?>
                        <p class="text-danger">
                            <?php echo $error['name'] ?>
                        </p>
                    <?php endif ?>
                </div>

                <div class="form-group col-md-5">
                    <label for="exampleInputEmail1">Hãng xe</label>
                    <select class="form-control col-md-13" name = "category_id">
                        <option value=""> - Mời bạn chọn hãng xe - </option>
                        <?php foreach ($category as $item): ?>
                            <option value ="<?php echo $item['id'] ?>">
                                <?php echo $item['name'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <?php if (isset($error['category_id'])): ?>
                        <p class="text-danger">
                            <?php echo $error['category_id'] ?>
                        </p>
                    <?php endif ?>
                </div>

                <div class="form-group col-md-5">
                    <label for="exampleInputEmail1">Giá sản phẩm</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ex: 9000000" name = "price">
                    <?php if (isset($error['price'])): ?>
                        <p class="text-danger">
                            <?php echo $error['price'] ?>
                        </p>
                    <?php endif ?>
                </div>

                <div class="form-group col-md-5">
                    <label for="exampleInputEmail1">Hình ảnh:  </label>
                    <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name = "img" >
                    <?php if (isset($error['img'])): ?>
                        <p class="text-danger">
                    <?php echo $error['img'] ?>
                            </p>
                        <?php endif ?>
                </div>



                <div class="form-group col-md-5">
                    <label for="exampleInputEmail1">Nội dung</label>
                    <textarea class="form-control" name = "content" rows="4"> </textarea>
                    <?php if (isset($error['content'])): ?>
                        <p class="text-danger">
                            <?php echo $error['content'] ?>
                        </p>
                    <?php endif ?>
                </div>

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
