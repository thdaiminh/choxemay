<?php
require_once __DIR__ . "/../../autoload/autoload.php";
$open = "users";
$id = intval(getInput('id'));

$EditUsers = $db -> fetchID("users", $id);
if(empty($EditUsers))
{
    $_SESSION['error'] = "Dữ liệu không tồn tại";
    redirectUsers("user");
}

$num = $db->delete("users",$id);
if($num > 0)
{
    $_SESSION['success'] = "Xóa thành công";
    redirectUsers("user");
}
else
{
    $_SESSION['error'] = "Xóa thất bại";
    redirectUsers("user");
}

?>