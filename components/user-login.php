<?
ob_start();
include('db.php');
$username = $_POST['username'];
$password = $_POST['password'];
$isTrue = userSign($username, $password);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!$isTrue) {
        header("Location: ../?route=login-register&error=true");
        echo "<script>document.cookie = 'page=signin'</script>";
    } else {
        userSign($username,$password);
        header("Location: ../?route=profile");
    };
} else{
    unset($_SESSION['id']);
    unset($_SESSION['username']);
    header("location: ../?route=main");
}
ob_end_flush();
?>