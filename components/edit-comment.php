<?
    ob_start();
    include_once('db.php');
    $id = $_POST['id'];
    $username = addslashes($_POST['username']);
    $comment = addslashes($_POST['comment']);
    $date = date('Y-m-d H:i', time());
    editComment($id, $username, $comment, $date);
    header("location: ../?route=profile");
    ob_end_flush();
?>