<?php
require_once __DIR__ . "/../../autoload/autoload.php";
$open = "admin";
$id = intval(getInput('id'));

$EditAdm = $db -> fetchID("admin", $id);
if(empty($EditAdm))
{
    $_SESSION['error'] = "Dữ liệu không tồn tại";
    redirectAdm("admin");
}

$num = $db->delete("admin",$id);
if($num > 0)
{
    $_SESSION['success'] = "Xóa thành công";
    redirectAdm("admin");
}
else
{
    $_SESSION['error'] = "Xóa thất bại";
    redirectAdm("admin");
}

?>