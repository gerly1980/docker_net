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
}if (isset($_SESSION['admin'])) {
    unset($_SESSION['admin']);
}
echo "<script>url=\"/\";window.location.href=url;</script>";
?>