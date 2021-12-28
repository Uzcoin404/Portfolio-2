<?
ob_start();
include('db.php');
$username = $_POST['username'];
$comment = $_POST['comment'];
$date = date('Y-m-d H:i', time());
setComments($username, $comment, $date);
header('Location: ../?route=profile');
ob_end_flush();
?>