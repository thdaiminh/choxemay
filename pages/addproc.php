<?php require_once  __DIR__ . '/../partials/notification.php' ?>
<?php require_once __DIR__ . "/../autoload/autoload.php"?>

<?php require_once  __DIR__. "/../layouts/header.php"?>
<?php
$open = "product";
$open1 = "category";
$open2 = "users";

$_SESSION['post_user'] = $_SESSION['name_id'];

if (!isset($_SESSION['name_id']))
{
    header("location: /../choxemay/index.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $data =
        [
            "name"  =>  postInput('name'),
            "slug" => to_slug(postInput("name")),
            "category_id" => postInput('category_id'),
            "price" => postInput('price'),
            "content" => postInput('content'),
            "posted_by" => $_SESSION['post_user']
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
        _debug($data);
        if ($id_insert)
        {
            echo "<script>alert('Thêm sản phẩm thành công');location.href='/../choxemay/index.php'</script>";

        }
        else
        {
            $_SESSION['error'] = "Thêm sản phẩm thất bại";
        }

    }

}

?>

<div class="wrapper">

    <div class="clearfix"></div>
    <div class="container_fullwidth">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="category leftbar">
                        <h3 class="title">
                            Danh mục
                        </h3>
                        <ul>
                            <?php foreach ($category as $item): ?>
                                <li> <a href="danh-muc.php?id=<?php echo $item['id']?>"><?php echo $item['name']?></a> </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="clearfix">
                    </div>
                </div>

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

                        <div class="form-group col-md-10 text-center">
                            <button type="submit" class="btn btn-success" >Lưu</button>
                        </div>
                    </form>
                </div>

                <div class="clearfix"></div>
                <div class="our-brand">
                    <h3 class="title"><strong>Các hãng xe máy </strong></h3>
                    <div class="control"><a id="prev_brand" class="prev" href="#">&lt;</a><a id="next_brand" class="next" href="#">&gt;</a></div>
                    <ul id="braldLogo">
                        <li>
                            <ul class="brand_item">
                                <li>
                                    <a href="/../choxemay/pages/danh-muc.php?id=6">
                                        <div class="brand-logo"><img src="/../choxemay/public/frontend/images/kawabrand.png" alt=""></div>
                                    </a>
                                </li>
                                <li>
                                    <a href="/../choxemay/pages/danh-muc.php?id=7">
                                        <div class="brand-logo"><img src="/../choxemay/public/frontend/images/ducatibrand.png" alt=""></div>
                                    </a>
                                </li>
                                <li>
                                    <a href="/../choxemay/pages/danh-muc.php?id=2">
                                        <div class="brand-logo"><img src="/../choxemay/public/frontend/images/hondabrand.png" alt=""></div>
                                    </a>
                                </li>
                                <li>
                                    <a href="/../choxemay/pages/danh-muc.php?id=5">
                                        <div class="brand-logo"><img src="/../choxemay/public/frontend/images/symbrand.png" alt=""></div>
                                    </a>
                                </li>
                                <li>
                                    <a href="/../choxemay/pages/danh-muc.php?id=1">
                                        <div class="brand-logo"><img src="/../choxemay/public/frontend/images/yamahabrand.png" alt=""></div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <ul class="brand_item">
                                <li>
                                    <a href="/../choxemay/pages/danh-muc.php?id=4">
                                        <div class="brand-logo"><img src="/../choxemay/public/frontend/images/piaggiobrand.png" alt=""></div>
                                    </a>
                                </li>
                                <li>
                                    <a href="/../choxemay/pages/danh-muc.php?id=3">
                                        <div class="brand-logo"><img src="/../choxemay/public/frontend/images/suzukibrand.png" alt=""></div>
                                    </a>
                                </li>
                                <li>
                                    <a href="/../choxemay/pages/danh-muc.php?id=6">
                                        <div class="brand-logo"><img src="/../choxemay/public/frontend/images/kawabrand.png" alt=""></div>
                                    </a>
                                </li>
                                <li>
                                    <a href="/../choxemay/pages/danh-muc.php?id=7">
                                        <div class="brand-logo"><img src="/../choxemay/public/frontend/images/ducatibrand.png" alt=""></div>
                                    </a>
                                </li>
                                <li>
                                    <a href="/../choxemay/pages/danh-muc.php?id=2">
                                        <div class="brand-logo"><img src="/../choxemay/public/frontend/images/hondabrand.png" alt=""></div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="footer">
            <div class="footer-info">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="footer-logo"><a href="#"><img src="/../choxemay/public/frontend/images/logo.png" alt=""></a></div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <h4 class="title">Thông tin</h4>
                            <p>Call Us : Group-01</p>
                            <p>Email : 1653050@student.hcmus.edu.vn</p>
                        </div>

                    </div>
                </div>
            </div>
            <div class="copyright-info">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <p>Copyright © 2018. Designed by <a href="#">Group-01</a>. All rights reseved</p>
                        </div>
                        <div class="col-md-6">
                            <ul class="social-icon">
                                <li><a href="#" class="google-plus"></a></li>
                                <li><a href="#" class="facebook"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require_once  __DIR__. "/../layouts/footer.php"?>
