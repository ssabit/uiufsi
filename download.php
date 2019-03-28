<?php
$error = "error";

$con = mysqli_connect("localhost","root","") or die($error);
mysqli_select_db($con,"ufsi") or die($error);

if(isset($_GET['dow'])){
    $path= $_GET['dow'];
    $res = mysqli_query($con,"SELECT * FROM questions WHERE path='$path'");

    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($path).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Content-Length: ' . filesize($path));
    readfile($path);
}




?>