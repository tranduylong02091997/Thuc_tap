<?php
session_start();
if(session_destroy()) {
    header("Location: dang_nhap.php");
}
?>