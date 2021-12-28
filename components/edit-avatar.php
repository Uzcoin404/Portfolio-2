<?
    ob_start();
    include_once('db.php');
    $id = $_POST['id'];
    $ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
    $oldAvatar = getUser($id)['avatar'];
    if ($ext) {
        $imgPath = "../img/avatar/".getUser($id)['username'].".$ext";
    } else {
        $imgPath = "../img/avatar/no-photo.jpg";
    }
    $isEdit = editAvatar($id, $imgPath);
    if (!$isEdit) {
        echo "<h1>Something went wrong</h1>";
    } else {
        if ($oldAvatar != "../img/avatar/no-photo.jpg" && file_exists($oldAvatar)) {
            unlink($oldAvatar);
        }
        editAvatar($id, $imgPath);
        move_uploaded_file($_FILES['avatar']['tmp_name'], $imgPath);
        clearstatcache();
        header('Location: ../?route=profile');
    }
    ob_end_flush();
?>