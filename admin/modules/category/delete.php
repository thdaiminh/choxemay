<?php
    require_once __DIR__ . "/../../autoload/autoload.php";
    $open = "category";
    $id = intval(getInput('id'));

    $EditCategory = $db -> fetchID("category", $id);
    if(empty($EditCategory))
    {
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectCate("category");
    }

    $is_product = $db->fetchOne("product","category_id = $id ");



    if($is_product == NULL)
    {
        $num = $db->delete("category",$id);
        if($num > 0)
        {
            $_SESSION['success'] = "Xóa thành công";
            redirectCate("category");
        }
        else
        {
            $_SESSION['error'] = "Xóa thất bại";
            redirectCate("category");
        }
    }

    else
    {
        $_SESSION['error'] = "Đang có sản phẩm sử dụng danh mục này";
        redirectCate("category");
    }

?>