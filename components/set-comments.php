<?
ob_start();
include('db.php');
$username = $_POST['username'];
$userID = $_POST['userID'];
$avatar = $_POST['avatar'];
$comment = $_POST['comment'];
$date = date('Y-m-d H:i', time());
setComments($username, $userID, $comment, $avatar, $date);
header('Location: ../?route=profile');
ob_end_flush();
?>