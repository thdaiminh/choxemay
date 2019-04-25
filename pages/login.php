<?php require_once  __DIR__ . '/../partials/notification.php' ?>
<?php require_once __DIR__ . "/../autoload/autoload.php"?>

<?php require_once  __DIR__. "/../layouts/header.php"?>
<?php
$open = "users";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $data =
        [
            "email" => postInput('email'),
            "password" => MD5(postInput('password')),
        ];
    $error = [];

    if (postInput('email') == '')
    {
        $error['email'] = "Xin vui lòng nhập email";
    }


    if (postInput('password') == '')
    {
        $error['password'] = "Xin vui lòng nhập mật khẩu";
    }


    if (empty($error))
    {
        $is_check = $db -> fetchOne("users", " email = '".$data['email']."' AND password = '".($data['password'])."' ");

        if($is_check != NULL)
        {
            $_SESSION['name_user'] = $is_check['name'];
            $_SESSION['name_id'] = $is_check['id'];
            echo "<script>alert('Đăng nhập thành công');location.href='/../choxemay/index.php'</script>";

        }
        else
        {
            $_SESSION['error'] = "";

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
                        <h3 class ="title"><strong>Đăng nhập</strong></h3>
                        <?php if (isset($_SESSION['success'])): ?>
                            <div class="alert alert-success">
                                <strong style="color: #3c763d">Đăng nhập thành công</strong>
                                <?php echo $_SESSION['success'] ; unset($_SESSION['success']) ?>
                            </div>
                        <?php endif; ?>

                        <?php if (isset($_SESSION['error'])): ?>
                            <div class="alert alert-danger">
                                <strong style="color: #721c24">Đăng nhập thất bại</strong>
                                <?php echo $_SESSION['error'] ; unset($_SESSION['error']) ?>
                            </div>
                        <?php endif; ?>
                    </section>
                    <div class="clearfix"></div>
                    <div class="step-description">
                        <form class = "form-horizontal" action="" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="your-details">
                                        <div class="form-row">
                                            <label class="lebel-abs">
                                                Email
                                            </label>
                                            <input type="email" class="input namefild" name="email" placeholder="abcd@hotmail.com">
                                            <?php if (isset($error['email'])): ?>
                                                <p class="text-danger">
                                                    <?php echo $error['email'] ?>
                                                </p>
                                            <?php endif ?>
                                        </div>

                                        <div class="pass-wrap">
                                            <div class="form-row">
                                                <label class="lebel-abs">
                                                    Mật khẩu
                                                </label>
                                                <input type="password" class="input namefild" name="password" placeholder="********">
                                                <?php if (isset($error['password'])): ?>
                                                    <p class="text-danger">
                                                        <?php echo $error['password'] ?>
                                                    </p>
                                                <?php endif ?>
                                            </div>

                                            <button type="submit" >Đăng nhập</button>
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
