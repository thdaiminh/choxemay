<?php require_once  __DIR__ . '/../partials/notification.php' ?>
<?php require_once __DIR__ . "/../autoload/autoload.php"?>

<?php require_once  __DIR__. "/../layouts/header.php"?>
<?php
    $open = "users";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $data =
        [
            "name"  =>  postInput('name'),
            "email" => postInput('email'),
            "phone" => postInput('phone'),
            "password" => MD5(postInput('password')),
            "address" => postInput('address'),
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
        $is_check = $db ->fetchOne("admin", " email = '".$data['email']."' ");
        if($is_check != NULL)
        {
            $error['email'] = "Email đã tồn tại";
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

    if ($data['password'] != MD5(postInput("re_password")))
    {
        $error['re_password'] = "Mật khẩu không khớp";
    }


    if (empty($error))
    {
        $id_insert = $db -> insert("users",$data);

        if ($id_insert)
        {
         $_SESSION['success'] = "Thêm người dùng thành công";
         redirectHome("home");
        }
        else
        {
            $_SESSION['error'] = "Thêm người dùng thất bại";
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

                <div class="col-md-9">
                    <section class="boxwrap">
                        <h3 class ="title"><strong>Đăng ký thành viên</strong></h3>
                    </section>
                    <div class="clearfix"></div>
                    <div class="step-description">
                        <form class = "form-horizontal" action="" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="your-details">
                                        <h5>
                                            Thông tin cá nhân
                                        </h5>
                                        <div class="form-row">
                                            <label class="lebel-abs">
                                                Tên
                                                <strong class="red">
                                                    *
                                                </strong>
                                            </label>
                                            <input type="text" class="input namefild" name="name" placeholder="Nguyễn Văn A">
                                            <?php if (isset($error['name'])): ?>
                                                <p class="text-danger">
                                                    <?php echo $error['name'] ?>
                                                </p>
                                            <?php endif ?>
                                        </div>

                                        <div class="form-row">
                                            <label class="lebel-abs">
                                                Email
                                                <strong class="red">
                                                    *
                                                </strong>
                                            </label>
                                            <input type="email" class="input namefild" name="email" placeholder="abcd@hotmail.com">
                                            <?php if (isset($error['email'])): ?>
                                                <p class="text-danger">
                                                    <?php echo $error['email'] ?>
                                                </p>
                                            <?php endif ?>
                                        </div>
                                        <div class="form-row">
                                            <label class="lebel-abs">
                                                Điện thoại
                                                <strong class="red">
                                                    *
                                                </strong>
                                            </label>
                                            <input type="number" class="input namefild" name="phone" placeholder="0912345678">
                                            <?php if (isset($error['phone'])): ?>
                                                <p class="text-danger">
                                                    <?php echo $error['phone'] ?>
                                                </p>
                                            <?php endif ?>
                                        </div>

                                        <div class="form-row">
                                            <label class="lebel-abs">
                                                Địa chỉ
                                                <strong class="red">
                                                    *
                                                </strong>
                                            </label>
                                            <input type="text" class="input namefild" name="address" placeholder="001 Nguyễn Văn Cừ">
                                            <?php if (isset($error['address'])): ?>
                                                <p class="text-danger">
                                                    <?php echo $error['address'] ?>
                                                </p>
                                            <?php endif ?>
                                        </div>

                                        <div class="pass-wrap">
                                            <div class="form-row">
                                                <label class="lebel-abs">
                                                    Mật khẩu
                                                    <strong class="red">
                                                        *
                                                    </strong>
                                                </label>
                                                <input type="password" class="input namefild" name="password" placeholder="********">
                                                <?php if (isset($error['password'])): ?>
                                                    <p class="text-danger">
                                                        <?php echo $error['password'] ?>
                                                    </p>
                                                <?php endif ?>
                                            </div>
                                            <div class="form-row">
                                                <label class="lebel-abs">
                                                    Xác nhận mật khẩu
                                                    <strong class="red">
                                                        *
                                                    </strong>
                                                </label>
                                                <input type="password" class="input cpass" name="re_password" placeholder="********" required>
                                                <?php if (isset($error['re_password'])): ?>
                                                    <p class="text-danger">
                                                        <?php echo $error['re_password'] ?>
                                                    </p>
                                                <?php endif ?>
                                            </div>
                                            <button type="submit" >Xong</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>


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
