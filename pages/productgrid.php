<?php
//require_once  __DIR__. "/../autoload/autoload.php";
//
//$sqlHomecate = "SELECT name, id FROM category WHERE home = 1 ORDER BY update_time";
//$CategoryHome = $db ->fetchsql($sqlHomecate);
//
//$data = [];
//
//foreach ($CategoryHome as $item)
//{
//    $cateID = intval($item['id']);
//    $sql = " SELECT * FROM product WHERE category_id = $cateID";
//    $ProductHome = $db -> fetchsql($sql);
//    $data[$item['name']] = $ProductHome;
//}
//_debug($data);
//?>

<?php require_once  __DIR__. "/../layouts/header.php";
require_once  __DIR__. "/../autoload/autoload.php";
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
                    <div class="clearfix"></div>

                    <ul class="products-listItem">
                        <?php foreach ($ProcAll as $item) :  ?>
                            <li class="products">
                                <div class="thumbnail"><a href="/../choxemay/pages/details.php?id=<?php echo $item['id'] ?>"><img src="/../choxemay/public/uploads/product/<?php echo $item['img'] ?>" alt="<?php echo $item['name'] ?>"></a></div>
                                <div class="product-list-description">
                                    <div class="productname"><?php echo $item['name'] ?> </div>
                                    <p>
                                        <div class="item-description"><?php echo $item['content'] ?> </div>

                                    </p>
                                </div>
                                    <div class="price">
                                        <span class="new_price">
                                             <?php echo adddotstring($item['price'])?> VNĐ
                                        </span>
                                    </div>
                                <div class="button_group"><a href="/../choxemay/pages/details.php?id=<?php echo $item['id'] ?>"><button class ="button" >Chi tiết</button></a></div>

                            </li>
                        <?php endforeach; ?>
                    </ul>

                    <div class="clearfix"></div>

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