<?php require_once  __DIR__. "/../choxemay/layouts/header.php";
?>

    <div class="clearfix"></div>
    <div class="hom-slider">
        <div class="container">
            <div id="sequence">
                <div class="sequence-prev"><i class="fa fa-angle-left"></i></div>
                <div class="sequence-next"><i class="fa fa-angle-right"></i></div>
                <ul class="sequence-canvas">
                    <li class="animate-in">
                        <div class="flat-caption caption1 formLeft delay300 text-center"><span class="suphead">Air Blade 2018</span></div>

                        <div class="flat-caption caption3 formLeft delay400 text-center">
                            <p>Tỏa sáng ngoạn mục.<br>
                                Mạnh mẽ và cuốn hút. Đẳng cấp và tiện nghi. <br>
                                Air Blade với thiết kế thon gọn cùng những đường nét sắc sảo, tinh tế <br>
                                và đậm chất tương lai giúp người lái nổi bất và cuốn hút tuyệt đối.
                            </p>
                        </div>
                        <div class="flat-image formBottom delay200" data-duration="5" data-bottom="true"><img src="/../choxemay/public/frontend/images/slider-image-01.png" alt=""></div>
                    </li>

                    <li>
                        <div class="flat-caption caption2 formLeft delay400">
                            <h1>Star SR 125</h1>
                        </div>
                        <div class="flat-caption caption3 formLeft delay500">
                            <p>Hãng xe máy SYM Đài Loan tại Việt Nam vừa chính thức ra mắt dòng sản phẩm <br>xe máy SYM Star SR 125 EFI phiên bản côn tay mới. <br>
                                Với diện mạo và kiểu dáng underbone, Star SR 125 EFI đúng chuẩn là <br> dòng xe thích hợp cho những bạn trẻ cá tính. <br>  </p>

                        </div>
                        <div class="flat-image formBottom delay200" data-bottom="true"><img src="/../choxemay/public/frontend/images/slider-image-02.png" alt=""></div>
                    </li>

                    <li>
                        <div class="flat-caption caption2 formLeft delay400 text-center">
                            <h1>YAMAHA R15</h1>
                        </div>
                        <div class="flat-caption caption3 formLeft delay500 text-center">
                            <p>Với kiểu dáng mạnh mẽ, cá tính và thể thao,<br>
                                đây sẽ là một lựa chọn không tồi cho các bạn trẻ đam mê dòng xe thể thao này <br>
                            </p>
                        </div>

                        <div class="flat-image formBottom delay200" data-bottom="true"><img src="/../choxemay/public/frontend/images/slider-image-03.png" alt=""></div>
                    </li>
                </ul>
            </div>
        </div>
    <div class="container_fullwidth">
        <div class="container">

            <div class="hot-products">
                <h3 class="title"><strong>Sản phẩm nổi bật</strong> </h3>
                <div class="control"><a id="prev_hot" class="prev" href="#">&lt;</a><a id="next_hot" class="next" href="#">&gt;</a></div>
                <ul id="hot">
                    <li>
                        <div class="row">
                            <?php foreach ($ProcHot as $item) :  ?>
                                <?php if ($item['hotitem'] = 1): ?>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="products">
                                            <div class="thumbnail"><a href="/../choxemay/pages/details.php?id=<?php echo $item['id'] ?>" ><img src="public/uploads/product/<?php echo $item['img'] ?>" alt="<?php echo $item['name'] ?>"></a></div>
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
                                    <div class="col-md-3 col-sm-6">
                                        <div class="products">
                                            <div class="thumbnail"><a href="/../choxemay/pages/details.php?id=<?php echo $item['id'] ?>"><img src="public/uploads/product/<?php echo $item['img'] ?>" alt="<?php echo $item['name'] ?>"></a></div>
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

            <div class="clearfix"></div>

            <div class="featured-products">
                <h3 class="title"><strong>Sản phẩm mới</strong></h3>
                <div class="control"><a id="prev_featured" class="prev" href="#">&lt;</a><a id="next_featured" class="next" href="#">&gt;</a></div>
                <ul id="featured">
                    <li>
                        <div class="row">
                            <?php foreach ($ProcNew as $item) :  ?>
                            <?php if ($item['id'] < 5): ?>
                            <div class="col-md-3 col-sm-6">
                                <div class="products">
                                    <div class="thumbnail"><a href="/../choxemay/pages/details.php?id=<?php echo $item['id'] ?>"><img src="public/uploads/product/<?php echo $item['img'] ?>" alt="<?php echo $item['name'] ?>"></a></div>
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
                            <?php foreach ($ProcNew as $item) :  ?>
                            <?php if ($item['id'] >= 5): ?>
                            <div class="col-md-3 col-sm-6">
                                <div class="products">
                                    <div class="thumbnail"><a href="/../choxemay/pages/details.php?id=<?php echo $item['id'] ?>"><img src="public/uploads/product/<?php echo $item['img'] ?>" alt="<?php echo $item['name'] ?>"></a></div>
                                    <h5 class="productname"><?php echo $item['name'] ?> </h5>
                                    <h4 class="price"><?php echo adddotstring($item['price'])?> VNĐ</h4>
                                    <div class="button_group"><a href="/../choxemay/pages/details.php?id=<?php echo $item['id'] ?>"> <button class="button add-cart" type="button">Chi tiết</button></a></div>
                                </div>
                            </div>
                                <?php endif ?>
                            <?php endforeach; ?>
                        </div>
                    </li>
                </ul>
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
                                    <div class="brand-logo"><img src="public/frontend/images/kawabrand.png" alt=""></div>
                                </a>
                            </li>
                            <li>
                                <a href="/../choxemay/pages/danh-muc.php?id=7">
                                    <div class="brand-logo"><img src="public/frontend/images/ducatibrand.png" alt=""></div>
                                </a>
                            </li>
                            <li>
                                <a href="/../choxemay/pages/danh-muc.php?id=2">
                                    <div class="brand-logo"><img src="public/frontend/images/hondabrand.png" alt=""></div>
                                </a>
                            </li>
                            <li>
                                <a href="/../choxemay/pages/danh-muc.php?id=5">
                                    <div class="brand-logo"><img src="public/frontend/images/symbrand.png" alt=""></div>
                                </a>
                            </li>
                            <li>
                                <a href="/../choxemay/pages/danh-muc.php?id=1">
                                    <div class="brand-logo"><img src="public/frontend/images/yamahabrand.png" alt=""></div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <ul class="brand_item">
                            <li>
                                <a href="/../choxemay/pages/danh-muc.php?id=4">
                                    <div class="brand-logo"><img src="public/frontend/images/piaggiobrand.png" alt=""></div>
                                </a>
                            </li>
                            <li>
                                <a href="/../choxemay/pages/danh-muc.php?id=3">
                                    <div class="brand-logo"><img src="public/frontend/images/suzukibrand.png" alt=""></div>
                                </a>
                            </li>
                            <li>
                                <a href="/../choxemay/pages/danh-muc.php?id=6">
                                    <div class="brand-logo"><img src="public/frontend/images/kawabrand.png" alt=""></div>
                                </a>
                            </li>
                            <li>
                                <a href="/../choxemay/pages/danh-muc.php?id=7">
                                    <div class="brand-logo"><img src="public/frontend/images/ducatibrand.png" alt=""></div>
                                </a>
                            </li>
                            <li>
                                <a href="/../choxemay/pages/danh-muc.php?id=2">
                                    <div class="brand-logo"><img src="public/frontend/images/hondabrand.png" alt=""></div>
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
                        <div class="footer-logo"><a href="#"><img src="public/frontend/images/logo.png" alt=""></a></div>
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
    <?php require_once  __DIR__. "/../choxemay/layouts/footer.php"?>