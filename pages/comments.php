<?
    include_once('./components/db.php');
    $getId = $_GET['id'];
    $isMyProfile = $_SESSION['username'] ? true : false;
    $myProfile = getUser($_SESSION['id']);
    $comments = getComments();
    $commentDel = $_GET['del'];
    $isLatest = $_GET['latest'];
    $perPage = 8;
    $listIndex = $_GET['list'];
    $pages = ceil(sizeof($comments) / $perPage);
    $listIndex ? $list = $listIndex : $list = 1;
    $firstList = ($list-1) * $perPage;
    $allComments = commentsLimit($firstList, $perPage);
    if ($commentDel && $isMyProfile) {
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
        <title>Portfolio Comments</title>
        <link rel="stylesheet" href="../styles/all.min.css">
        <link rel="stylesheet" href="../styles/color.css?v=<?= time();?>">
        <link rel="stylesheet" href="../styles/style.css?v=<?= time();?>">
        <link rel="stylesheet" href="../styles/media.css?v=<?= time();?>">
        <link rel="icon" href="../img/icon.jpg">
    </head>
<body>
    <div class="comments_main">
        <main class="main day">

            <div class="loader">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" style="display: none;">
                    <symbol id="wave">
                    <path d="M420,20c21.5-0.4,38.8-2.5,51.1-4.5c13.4-2.2,26.5-5.2,27.3-5.4C514,6.5,518,4.7,528.5,2.7c7.1-1.3,17.9-2.8,31.5-2.7c0,0,0,0,0,0v20H420z"></path>
                    <path d="M420,20c-21.5-0.4-38.8-2.5-51.1-4.5c-13.4-2.2-26.5-5.2-27.3-5.4C326,6.5,322,4.7,311.5,2.7C304.3,1.4,293.6-0.1,280,0c0,0,0,0,0,0v20H420z"></path>
                    <path d="M140,20c21.5-0.4,38.8-2.5,51.1-4.5c13.4-2.2,26.5-5.2,27.3-5.4C234,6.5,238,4.7,248.5,2.7c7.1-1.3,17.9-2.8,31.5-2.7c0,0,0,0,0,0v20H140z"></path>
                    <path d="M140,20c-21.5-0.4-38.8-2.5-51.1-4.5c-13.4-2.2-26.5-5.2-27.3-5.4C46,6.5,42,4.7,31.5,2.7C24.3,1.4,13.6-0.1,0,0c0,0,0,0,0,0l0,20H140z"></path>
                    </symbol>
                </svg>
                <div class="box">
                    <div class="percent">
                    <div class="percentNum" id="count">0</div>
                    <div class="percentB">%</div>
                    </div>
                    <div id="water" class="water">
                    <svg viewBox="0 0 560 20" class="water_wave water_wave_back">
                        <use xlink:href="#wave"></use>
                    </svg>
                    <svg viewBox="0 0 560 20" class="water_wave water_wave_front">
                        <use xlink:href="#wave"></use>
                    </svg>
                    </div>
                </div>
            </div>

            <div class="delete_alert">
                <p class="delete_alert_text">Do you really want to delete this comment</p>
                <a href="#" class="btn delete_alert_btn">Yes</a>
            </div>

            <?include_once('./pages/nav.php')?>
            <div class="container_glass">
                <h2 class="title comments_title">All <span>Comments</span></h2>
                <div class="comments_body">
                    <?if(count($comments) > 0 && $isLatest):?>
                    <? for ($i=count($comments)-1; $i >= 0; $i--):
                        $isMyComments = $comments[$i]['userID'] == $_SESSION['id'] ? true : false;?>
                        <div class="comment" data-aos="flip-right" data-aos-duration="1000" data-aos-delay="300">
                            <div class="comment_img_blog">
                                <a href="./?route=profile&id=<?= $comments[$i]['userID']?>"><img src="<?= !$isMyComments ? $comments[$i]['avatar'] : $myProfile['avatar']?>" alt="" class="comment_img" title="View profile"></a>
                            </div>
                            <div class="comment_body">
                                <div class="comment_item">
                                    <p class="comment_text"><?= $comments[$i]['comment']?></p>
                                    <form action="../components/edit-comment.php" method="post" class="comment_edit_form" style="display: none;">
                                        <textarea name="comment" class="comment_area" value="<?= $comments[$i]['comment']?>" placeholder="Message" required></textarea>
                                        <input type="hidden" name="id" value="<?= $comments[$i]['id']?>">
                                        <input type="hidden" name="username" value="<?= $comments[$i]['username']?>">
                                        <div class="edit_comment_buttons">
                                            <button class="btn edit_comment_button edit_comment_btn" type="submit">Save</button>
                                            <button class="btn edit_comment_button cancel_comment_btn" type="button">Cancel</button>
                                        </div>
                                    </form>
                                    <div class="comment_functions" style="display: <?= $isMyComments ? 'flex' : 'none'?>;">
                                        <a href="#" class="comment_function" id="edit" title="Edit comment"><i class="fas fa-pen"></i></a href="#">
                                        <a href="./?route=profile&del=<?= $comments[$i]['id']?>" class="comment_function" id="delete" title="Delete comment"><i class="fas fa-trash"></i></a href="#">
                                    </div>
                                </div>
                                <div class="comment_footer">
                                    <a href="./?route=profile&id=<?= $comments[$i]['userID']?>" class="comment_name" title="View profile"><?= $comments[$i]['username']?></a>
                                    <p class="comment_date" title="Comment created Date"><?= $comments[$i]['date']?></p>
                                </div>
                            </div>
                        </div>
                    <?endfor;
                    else : ?>
                        <? for ($i=0; $i < count($allComments); $i++):
                        $isMyComments = $allComments[$i]['userID'] == $_SESSION['id'] ? true : false;?>
                        <div class="comment" data-aos="flip-right" data-aos-duration="1000" data-aos-delay="300">
                            <div class="comment_img_blog">
                                <a href="./?route=profile&id=<?= $allComments[$i]['userID']?>"><img src="<?= !$isMyComments ? $allComments[$i]['avatar'] : $myProfile['avatar']?>" alt="" class="comment_img" title="View profile"></a>
                            </div>
                            <div class="comment_body">
                                <div class="comment_item">
                                    <p class="comment_text"><?= $allComments[$i]['comment']?></p>
                                    <form action="../components/edit-comment.php" method="post" class="comment_edit_form" style="display: none;">
                                        <textarea name="comment" class="comment_area" value="<?= $allComments[$i]['comment']?>" placeholder="Message" required></textarea>
                                        <input type="hidden" name="id" value="<?= $allComments[$i]['id']?>">
                                        <input type="hidden" name="username" value="<?= $allComments[$i]['username']?>">
                                        <div class="edit_comment_buttons">
                                            <button class="btn edit_comment_button edit_comment_btn" type="submit">Save</button>
                                            <button class="btn edit_comment_button cancel_comment_btn" type="button">Cancel</button>
                                        </div>
                                    </form>
                                    <div class="comment_functions" style="display: <?= $isMyComments ? 'flex' : 'none'?>;">
                                        <a href="#" class="comment_function" id="edit" title="Edit comment"><i class="fas fa-pen"></i></a href="#">
                                        <a href="./?route=profile&del=<?= $allComments[$i]['id']?>" class="comment_function" id="delete" title="Delete comment"><i class="fas fa-trash"></i></a href="#">
                                    </div>
                                </div>
                                <div class="comment_footer">
                                    <a href="./?route=profile&id=<?= $allComments[$i]['userID']?>" class="comment_name" title="View profile"><?= $allComments[$i]['username']?></a>
                                    <p class="comment_date" title="Comment created Date"><?= $allComments[$i]['date']?></p>
                                </div>
                            </div>
                        </div>
                        <?endfor;?>
                    <?endif;?>
                </div>
                <?if (!$isLatest):?>
                    <div class="paginator">
                        <div class="pagination">
                            <ul>
                            <?if($listIndex-1 != 0 && $list-1 != 0):?>
                                <button><a href="../?route=comments&list=<?= $listIndex-1?>" class="btn prev"><i class="fas fa-angle-left"></i> Oldingi</a></button>
                            <?endif;?>
                            <?for ($list=1; $list <= $pages; $list++):?>
                                <a href="../?route=comments&list=<?= $list?>" class="numb <?= $listIndex == $list ? "active" : ""?>"><?= $list?></a>
                            <?endfor;?>
                            <?if($listIndex+1 <= $pages):?>
                                <button><a href="../?route=comments&list=<?= $listIndex ? $listIndex+1 : 2?>" class="btn next">Keyingi <i class="fas fa-angle-right"></i></a></button>
                            <?endif;?>
                            </ul>
                        </div>
                    </div>
                <?endif;?>
                <div class="pagination_controls">
                    <a href="../?route=comments&list=1">View All</a>
                    <a href="../?route=comments&latest=true">View latest</a>
                </div>
            </div>
        </main>
    </div>
    <script src="../js/aos.js"></script>
    <script src="../js/profile.js?v=<?= time();?>"></script>
</body>
</html>