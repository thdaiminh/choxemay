<?php
    session_start();
    unset($_SESSION['name_user']);
    unset($_SESSION['name_id']);
    header("location: /../choxemay/index.php ");
?>