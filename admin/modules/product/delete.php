<?php
require_once __DIR__ . "/../../autoload/autoload.php";
$open = "product";
$id = intval(getInput('id'));

$EditProc = $db -> fetchID("product", $id);
if(empty($EditProc))
{
    $_SESSION['error'] = "Dữ liệu không tồn tại";
    redirectProc("product");
}

$num = $db->delete("product",$id);
if($num > 0)
{
    $_SESSION['success'] = "Xóa thành công";
    redirectProc("product");
}
else
{
    $_SESSION['error'] = "Xóa thất bại";
    redirectProc("product");
}

?>