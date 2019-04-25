<?php require_once __DIR__ . "/../autoload/autoload.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/../choxemay/public/frontend/images/favicon.png">
    <title>Chợ xe máy</title>
    <link href="/../choxemay/public/frontend/css/bootstrap.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,700,500italic,100italic,100' rel='stylesheet' type='text/css'>
    <link href="/../choxemay/public/frontend/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/../choxemay/public/frontend/css/flexslider.css" type="text/css" media="screen"/>
    <link href="/../choxemay/public/frontend/css/sequence-looptheme.css" rel="stylesheet" media="all"/>
    <link href="/../choxemay/public/frontend/css/style.css" rel="stylesheet">
    <!--[if lt IE 9]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script><script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script><![endif]-->
</head>
<body id="home">
<div class="wrapper">
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-2">
                    <div class="logo"><a href="/../choxemay/index.php"><img src="/../choxemay/public/frontend/images/logo.png" alt="Choxemay.com"></a></div>
                </div>
                <div class="col-md-10 col-sm-10">
                    <div class="header_top">
                        <div class="row">


                            <div class="col-md-13">
                                <ul class="usermenu">
                                    <?php
                                    if (isset($_SESSION['name_user'])): ?>
                                        <h5 size="36" style="color:#b0b0b0" >Xin chào <?php echo $_SESSION['name_user'] ?></h5>
                                    <?php endif; ?>
                                    <?php
                                        if (!isset($_SESSION['name_user'])): ?>
                                            <li><a href="/../choxemay/pages/login.php" class="log">Đăng nhập</a></li>
                                            <li><a href="/../choxemay/pages/register.php" class="reg">Đăng ký</a></li>
                                    <?php endif; ?>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="header_bottom">
                        <?php
                        if (isset($_SESSION['name_user'])): ?>
                            <ul class="option">

                                <li>
                                    <a href="/../choxemay/pages/addproc.php" class ="addproc">
                                    <button type="button" class="btn btn-default btn-sm">
                                        <span class="glyphicon glyphicon-plus"></span> Đăng bán
                                    </button>
                                    </a>


                                    <a href="/../choxemay/pages/logout.php" class ="logout">
                                        <button   type="button" class="btn btn-default btn-sm">
                                            <span class="glyphicon glyphicon-log-out"></span> Đăng xuất
                                        </button>
                                    </a>

                                </li>

                            </ul>
                        <?php endif; ?>
                        <div class="navbar-header"><button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button></div>
                        <div class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">

                                <li><a href="/../choxemay/index.php">Trang chủ</a></li>

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Danh mục</a>
                                    <div class="dropdown-menu mega-menu">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <ul class="mega-menu-links">
                                                    <?php foreach ($category as $item): ?>
                                                        <li> <a href="/../choxemay/pages/danh-muc.php?id=<?php echo $item['id']?>"><?php echo $item['name']?></a> </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <<li><a href="/../choxemay/pages/productgrid.php">Sản phẩm</a></li>

                                <li><a href="/../choxemay/pages/contact.php">Liên hệ</a></li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--    <div class="clearfix"></div>-->
<!--    <div class="hom-slider">-->
<!--        <div class="container">-->
<!--            <div id="sequence">-->
<!--                <div class="sequence-prev"><i class="fa fa-angle-left"></i></div>-->
<!--                <div class="sequence-next"><i class="fa fa-angle-right"></i></div>-->
<!--                <ul class="sequence-canvas">-->
<!--                    <li class="animate-in">-->
<!--                        <div class="flat-caption caption1 formLeft delay300 text-center"><span class="suphead">Air Blade 2018</span></div>-->
<!---->
<!--                        <div class="flat-caption caption3 formLeft delay400 text-center">-->
<!--                            <p>Tỏa sáng ngoạn mục.<br>-->
<!--                                Mạnh mẽ và cuốn hút. Đẳng cấp và tiện nghi. <br>-->
<!--                                Air Blade với thiết kế thon gọn cùng những đường nét sắc sảo, tinh tế <br>-->
<!--                                và đậm chất tương lai giúp người lái nổi bất và cuốn hút tuyệt đối.-->
<!--                            </p>-->
<!--                        </div>-->
<!--                        <div class="flat-image formBottom delay200" data-duration="5" data-bottom="true"><img src="/../choxemay/public/frontend/images/slider-image-01.png" alt=""></div>-->
<!--                    </li>-->
<!---->
<!--                    <li>-->
<!--                        <div class="flat-caption caption2 formLeft delay400">-->
<!--                            <h1>Star SR 125</h1>-->
<!--                        </div>-->
<!--                        <div class="flat-caption caption3 formLeft delay500">-->
<!--                            <p>Hãng xe máy SYM Đài Loan tại Việt Nam vừa chính thức ra mắt dòng sản phẩm <br>xe máy SYM Star SR 125 EFI phiên bản côn tay mới. <br>-->
<!--                                Với diện mạo và kiểu dáng underbone, Star SR 125 EFI đúng chuẩn là <br> dòng xe thích hợp cho những bạn trẻ cá tính. <br>  </p>-->
<!---->
<!--                        </div>-->
<!--                        <div class="flat-image formBottom delay200" data-bottom="true"><img src="/../choxemay/public/frontend/images/slider-image-02.png" alt=""></div>-->
<!--                    </li>-->
<!---->
<!--                    <li>-->
<!--                        <div class="flat-caption caption2 formLeft delay400 text-center">-->
<!--                            <h1>YAMAHA R15</h1>-->
<!--                        </div>-->
<!--                        <div class="flat-caption caption3 formLeft delay500 text-center">-->
<!--                            <p>Với kiểu dáng mạnh mẽ, cá tính và thể thao,<br>-->
<!--                                đây sẽ là một lựa chọn không tồi cho các bạn trẻ đam mê dòng xe thể thao này <br>-->
<!--                            </p>-->
<!--                        </div>-->
<!---->
<!--                        <div class="flat-image formBottom delay200" data-bottom="true"><img src="/../choxemay/public/frontend/images/slider-image-03.png" alt=""></div>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </div>-->
<!--        </div>-->
        <!--        <div class="promotion-banner">-->
        <!--            <div class="container">-->
        <!--                <div class="row">-->
        <!--                    <div class="col-md-4 col-sm-4 col-xs-4">-->
        <!--                        <div class="promo-box"><img src="public/frontend/images/promotion-01.png" alt=""></div>-->
        <!--                    </div>-->
        <!--                    <div class="col-md-4 col-sm-4 col-xs-4">-->
        <!--                        <div class="promo-box"><img src="public/frontend/images/promotion-02.png" alt=""></div>-->
        <!--                    </div>-->
        <!--                    <div class="col-md-4 col-sm-4 col-xs-4">-->
        <!--                        <div class="promo-box"><img src="public/frontend/images/promotion-03.png" alt=""></div>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
    </div>
