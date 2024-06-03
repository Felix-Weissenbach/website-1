<?php
session_start();

if (isset($_POST['logout']) && $_POST['logout'] == 1) {
    session_unset();
    session_destroy();
    echo '<script type="text/javascript">window.location.href="index.php?page=home";</script>';
    exit();
}
?>