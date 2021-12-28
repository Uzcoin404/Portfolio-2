<?
    ob_start();
    include_once('db.php');
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $bio = $_POST['bio'];
    $date = date('Y-m-d H:i:s', time());
    $ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
    $isEmpty = checkUsername($username) && checkEmail($email) ? true : false;
    if ($ext) {
        $imgPath = "../img/avatar/$username.$ext";
    } else {
        $imgPath = "../img/avatar/no-photo.jpg";
    }
    if (!$isEmpty) {
        echo 'Username or Email already exist!';
        header('Location: ../?route=login-register');
    } else {
        userReg($name, $username, $email, $phone, $password, $bio, $imgPath, $date);
        move_uploaded_file($_FILES['avatar']['tmp_name'], $imgPath);
        header('Location: ../?route=login-register');
        echo "<script>document.cookie = 'page=signin'</script>";
    }
    ob_end_flush();
?>