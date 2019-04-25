<?php require_once  __DIR__. "/../layouts/header.php"?>

<?php require_once __DIR__ . "/../autoload/autoload.php";
    $id = intval(getInput('id'));

    $proc = $db -> fetchID("product",$id);
    $postedid = $proc['posted_by'];

    $sqlUser = "SELECT users.* FROM users WHERE users.id = $postedid";
    $Posted = $db -> fetchsql($sqlUser);
?>


<div class="wrapper">

    <div class="clearfix"></div>
    <div class="container_fullwidth">
        <div class="container">
            <div class="row">
            <div class="col-md-9">
                <div class="products-details">
                    <div class="preview_image">
                        <div class="preview-small">
                            <img src="/../choxemay/public/uploads/product/<?php echo $proc['img'] ?>" alt="<?php echo $proc['name'] ?>">
                        </div>
                    </div>
                    <div class="products-description">
                        <h5 class="name">
                            <?php echo $proc['name']; ?>
                        </h5>


                        <hr class="border">
                        <div class="price">
                            Giá :
                            <span class="new_price">
                              <?php echo adddotstring($proc['price']); ?>
                              <sup>
                                VNĐ
                              </sup>
                            </span>
                        </div>

                        <div class="clearfix">
                        </div>

                    </div>
                </div>
                <div class="clearfix">
                </div>
                <div class="tab-box">
                    <div id="tabnav">
                        <ul>
                            <li>
                                <a href="#Description">
                                    Mô tả
                                </a>
                            </li>

                        </ul>
                    </div>
                    <div class="tab-content-wrap">
                        <div class="tab-content" id="Description">
                            <p>
                                <?php echo $proc['content'] ?>
                            </p>

                        </div>
                    </div>
                </div>
                <div class="clearfix">
                </div>
                <div class="hot-products">
                    <h3 class="title"><strong>Sản phẩm nổi bật</strong> </h3>
                    <div class="control"><a id="prev_hot" class="prev" href="#">&lt;</a><a id="next_hot" class="next" href="#">&gt;</a></div>
                    <ul id="hot">
                        <li>
                            <div class="row">
                                <?php foreach ($ProcHot as $item) :  ?>
                                    <?php if ($item['hotitem'] = 1): ?>
                                        <div class="col-md-4 col-sm-4">
                                            <div class="products">
                                                <div class="thumbnail"><a href="/../choxemay/pages/details.php?id=<?php echo $item['id'] ?>"><img src="/../choxemay/public/uploads/product/<?php echo $item['img'] ?>" alt="<?php echo $item['name'] ?>"></a></div>
                                                <h5 class="productname"><?php echo $item['name'] ?> </h5>
                                                <h4 class="price"><?php echo adddotstring($item['price'])?> VNĐ</h4>
                                                <div class="button_group"><a href="/../choxemay/pages/details.php?id=<?php echo $item['id'] ?>"><button class="button add-cart" type="button">Chi tiết</button></a></div>
                                            </div>
                                        </div>
                                    <?php endif ?>
                                <?php endforeach; ?>
                            </div>
                        </li>

                        <li>
                            <div class="row">
                                <?php foreach ($ProcHot as $item) :  ?>
                                    <?php if ($item['hotitem'] = 1): ?>
                                        <div class="col-md-4 col-sm-4">
                                            <div class="products">
                                                <div class="thumbnail"><a><img src="/../choxemay/public/uploads/product/<?php echo $item['img'] ?>" alt="<?php echo $item['name'] ?>"></a></div>
                                                <h5 class="productname"><?php echo $item['name'] ?> </h5>
                                                <h4 class="price"><?php echo adddotstring($item['price'])?> VNĐ</h4>
                                                <div class="button_group"><a href="/../choxemay/pages/details.php?id=<?php echo $item['id'] ?>"><button class="button add-cart" type="button">Chi tiết</button></a></div>
                                            </div>
                                        </div>
                                    <?php endif ?>
                                <?php endforeach; ?>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="clearfix">
                </div>
            </div>
            <div class="col-md-3">
                <div class="category leftbar">
                    <h5 class="title">
                        Thông tin người đăng
                    </h5>
                        <ul>
                        <?php foreach ($Posted as $item) :  ?>
                                <li class="user">Tên: <?php echo $item['name'] ?> </li>
                                <li class="user">Địa chỉ: <?php echo $item['address'] ?> </li>
                                <li class="user">SĐT: <?php echo $item['phone'] ?> </li>
                        <?php endforeach; ?>

                        </ul>

                </div>
                <div class="clearfix">
                </div>
            </div>
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