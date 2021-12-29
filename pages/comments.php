<?
    include_once('./components/db.php');
    $getId = $_GET['id'];
    $isMyProfile = $_SESSION['username'] && !$getId ? true : false;
    $myProfile = getUser($_SESSION['id']);
    $user = getUser($getId);
    $myComments = getMyComments($myProfile['username']);
    $userComments = getMyComments($user['username']);
    $commentDel = $_GET['del'];
    if ($commentDel) {
        deleteComment($commentDel);
        header("Location: ./?route=profile");
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Suyunbek Profile</title>
        <link rel="stylesheet" href="../styles/all.min.css">
        <link rel="stylesheet" href="../styles/color.css?v=<?= time();?>">
        <link rel="stylesheet" href="../styles/style.css?v=<?= time();?>">
        <link rel="stylesheet" href="../styles/media.css?v=<?= time();?>">
        <link rel="icon" href="../img/icon.jpg">
    </head>
<body>
<?if(count($myComments) > 0):?>
    <? for ($i=count($myComments)-1; $i >= 0; $i--): ?>
        <div class="comment" data-aos="flip-right" data-aos-duration="1000" data-aos-delay="300">
            <div class="comment_img_blog">
                <a href="./?route=profile&id=<?= $comments[$i]['userID']?>"><img src="<?= $comments[$i]['avatar']?>" alt="" class="comment_img" title="View profile"></a>
            </div>
            <div class="comment_body">
                <div class="comment_item">
                    <p class="comment_text"><?= $comments[$i]['comment']?></p>
                    <div class="comment_functions" style="display: none;">
                        <a href="#" class="comment_function" id="edit" title="Edit comment"><i class="fas fa-pen"></i></a href="#">
                        <a href="#" class="comment_function" id="delete" title="Delete comment"><i class="fas fa-trash"></i></a href="#">
                    </div>
                </div>
                <div class="comment_footer">
                    <a href="./?route=profile" class="comment_name" title="View profile"><?= $comments[$i]['username']?></a>
                    <p class="comment_date" title="Comment created Date"><?= $comments[$i]['date']?></p>
                </div>
            </div>
        </div>
    <?endfor;
else : "<h1>Comments not found</h1>";
endif;?>
    <script src="../js/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>