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
    $isEmpty = true;
    if ($getUser['username'] != $username && $getUser['email'] != $email) {
        $isEmpty = checkUsername($username) && checkEmail($email) ? true : false;
    } if ($getUser['username'] != $username) {
        $isEmpty = checkEmail($email);
    } if ($getUser['email'] != $email) {
        $isEmpty = checkUsername($username);
    }

    if (!$isEmpty) {
        echo "<h1>Username or Email already Exist!</h1>";
    } else{
        editProfile($id, $name, $username, $email, $phone, $password, $bio);
        header("location: ../?route=profile");
    }
    ob_end_flush();
?>