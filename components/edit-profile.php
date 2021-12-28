<?
    ob_start();
    include_once('db.php');
    $id = $_POST['id'];
    $name = addslashes($_POST['name']);
    $username = addslashes($_POST['username']);
    $email = addslashes($_POST['email']);
    $phone = addslashes($_POST['phone']);
    $password = addslashes($_POST['password']);
    $bio = addslashes($_POST['bio']);
    $getUser = getUser($id);
    $getComment = getMyComments($getUser['username']);
    $oldUsername = $getComment[0]['username'];
    $ext = pathinfo($getUser['avatar'], PATHINFO_EXTENSION);
    $imgPath = "../img/avatar/$username.$ext";
    $isEmpty = true;

    if ($getUser['username'] != $username && $getUser['email'] != $email) {
        $isEmpty = checkUsername($username) && checkEmail($email) ? true : false;
    } if ($getUser['username'] != $username) {
        $isEmpty = checkUsername($username);
    } if ($getUser['email'] != $email) {
        $isEmpty = checkEmail($email);
    }
    if (!$isEmpty) {
        echo "<h1>Username or Email already Exist!</h1>";
    } else{
        editProfile($id, $name, $username, $email, $phone, $password, $bio, $imgPath);
        if ($getUser['username'] !== $username) {
            editUsername($oldUsername, $username);
            copy($getUser['avatar'], $imgPath);
            unlink($getUser['avatar']);
        }
        header("location: ../?route=profile");
    }
    ob_end_flush();
?>