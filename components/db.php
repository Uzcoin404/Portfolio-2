<?
date_default_timezone_set('Asia/Tashkent');
session_start();
function pdo(){
    $dbName = 'portfolio_2';
    $dbUser = 'root';
    $dbPass = '';
    $host = '127.0.0.1';
    return new PDO("mysql:host=$host; dbname=$dbName;", $dbUser, $dbPass);
}
function userReg($name, $username, $email, $phone, $password, $bio, $avatar, $date){
    $password = password_hash($password , PASSWORD_DEFAULT);
    $pdo = pdo();
    $query = "INSERT INTO users (name, username, email, phone, password, bio, avatar, date) VALUES (?,?,?,?,?,?,?,?)";
    $driver = $pdo->prepare($query);
    $result = $driver->execute([$name, $username, $email, $phone, $password, $bio, $avatar, $date]);
    if ($driver->errorInfo()[0] != '00000') {
        var_dump($driver->errorInfo());
    }
    return $result;
}
function checkUsername($username){
    $pdo = pdo();
    $query = "SELECT username FROM users WHERE username = '$username'";
    $driver = $pdo->prepare($query);
    $result = $driver->execute();
    $user = $driver->fetch(PDO::FETCH_ASSOC);
    if (isset($user) && !empty($user)){
        return false;
    } else {
        return true;
    }
}
function checkEmail($email){
    $pdo = pdo();
    $query = "SELECT email FROM users WHERE email = '$email'";
    $driver = $pdo->prepare($query);
    $result = $driver->execute();
    $user = $driver->fetch(PDO::FETCH_ASSOC);
    if (isset($user) && !empty($user)){
        return false;
    } else {
        return true;
    }
}
function userSign($username, $password){
    $pdo = pdo();
    $query = "SELECT * FROM users WHERE username = ?";
    $driver = $pdo->prepare($query);
    $result = $driver->execute([$username]);
    $user = $driver->fetch(PDO::FETCH_ASSOC);
    if ($user['username'] == $username && password_verify($password, $user['password'])) {
        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        return true;
    }
    else{
        return false;
    }
}
function getUser($id){
    $pdo = pdo();
    $query = "SELECT * FROM users WHERE id=(?)";
    $driver = $pdo->prepare($query);
    $result = $driver->execute([$id]);
    $user = $driver->fetch(PDO::FETCH_ASSOC);
    if ($driver->errorInfo()[0] != '00000') {
        var_dump($driver->errorInfo());
    }
    return $user;
}
function editAvatar($id, $imgPath){
    $pdo = pdo();
    $query = "UPDATE users SET avatar = '$imgPath' WHERE id = (?)";
    $driver = $pdo->prepare($query);
    $result = $driver->execute([$id]);
    if ($driver->errorInfo()[0] != '00000') {
        var_dump($driver->errorInfo());
    }
    return $result;
}
function editProfile($id, $name, $username, $email, $phone, $password, $bio, $avatar){
    $password = password_hash($password , PASSWORD_DEFAULT);
    $pdo = pdo();
    $query = "UPDATE users SET name='$name',username='$username',email='$email',phone='$phone',password='$password',bio='$bio',avatar='$avatar' WHERE id = (?)";
    $driver = $pdo->prepare($query);
    $result = $driver->execute([$id]);
    if ($driver->errorInfo()[0] != '00000') {
        var_dump($driver->errorInfo());
    }
    return $result;
}
function setComments($username, $userID, $comment, $avatar, $date){
    $pdo = pdo();
    $query = "INSERT INTO `comments` (`username`, `userID`, `comment`, `avatar`, `date`) VALUES (?,?,?,?,?)";
    $driver = $pdo->prepare($query);
    $result = $driver->execute([$username, $userID, $comment, $avatar, $date]);
    if ($driver->errorInfo()[0] != '00000') {
        var_dump($driver->errorInfo());
    }
    return $result;
}
function getComments(){
    $pdo = pdo();
    $query = "SELECT * FROM comments";
    $driver = $pdo->prepare($query);
    $result = $driver->execute();
    $comments = $driver->fetchAll(PDO::FETCH_ASSOC);
    return $comments;
}
function getMyComments($username){
    $pdo = pdo();
    $query = "SELECT * FROM comments WHERE username=(?)";
    $driver = $pdo->prepare($query);
    $result = $driver->execute([$username]);
    $comments = $driver->fetchAll(PDO::FETCH_ASSOC);
    if ($driver->errorInfo()[0] != '00000') {
        var_dump($driver->errorInfo());
    }
    return $comments;
}
function editComment($id, $username, $comment, $date){
    $pdo = pdo();
    $query = "UPDATE comments SET username='$username',comment='$comment',date='$date' WHERE id = (?)";
    $driver = $pdo->prepare($query);
    $result = $driver->execute([$id]);
    if ($driver->errorInfo()[0] != '00000') {
        var_dump($driver->errorInfo());
    }
    return $result;
}
function editUsername($oldUsername, $username){
    $pdo = pdo();
    $query = "UPDATE comments SET username='$username' WHERE username = (?)";
    $driver = $pdo->prepare($query);
    $result = $driver->execute([$oldUsername]);
    if ($driver->errorInfo()[0] != '00000') {
        var_dump($driver->errorInfo());
    }
    return $result;
}
function deleteComment($id){
    $pdo = pdo();
    $query = "DELETE FROM comments WHERE id = (?)";
    $driver = $pdo->prepare($query);
    $result = $driver->execute([$id]);
    if ($driver->errorInfo()[0] != '00000') {
        var_dump($driver->errorInfo());
    }
    return $result;
}
function commentsLimit($begin, $perPage){
    $pdo = pdo();
    $query = "SELECT * FROM comments LIMIT $begin,$perPage";
    $driver = $pdo->prepare($query);
    $result = $driver->execute();
    $comments = $driver->fetchAll(PDO::FETCH_ASSOC);
    return $comments;
}
?>