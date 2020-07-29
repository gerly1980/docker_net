<?php
session_start();
header("Content-Type: text/html;charset=utf-8");
?>
<?php
if (isset($_SESSION['teacher'])) {
    unset($_SESSION['teacher']);
}
if (isset($_SESSION['student'])) {
    unset($_SESSION['student']);
}
echo "<script>url=\"/\";window.location.href=url;</script>";
?>