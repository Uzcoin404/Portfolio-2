<?
    include_once('./components/db.php');
    $getId = $_GET['id'];
    $isMyProfile = $_SESSION['username'] && !$getId ? true : false;
    $myProfile = getUser($_SESSION['id']);
    $user = getUser($getId);
    $isProfile = $_GET['route'] == 'profile';
    if(!$isMyProfile && !$getId): header("Location: ../?route=main&nologin=true");
    else :
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
        
    <main class="main day profile_body">
        <div class="profile">

            <!-- <nav class="nav">
                <div class="container_glass">
                    <div class="nav_blog">
                        <a href="/" class="nav_logo"><p class="logo_text">Uzcoin</p></a>
                        <ul class="nav_list">
                            <li><a href="../#home" class="nav_link">Home</a></li>
                            <li><a href="../#about" class="nav_link">About</a></li>
                            <li><a href="../#skills" class="nav_link">Skills</a></li>
                            <li><a href="../#projects" class="nav_link">Projects</a></li>
                            <li><a href="../#service" class="nav_link">Service</a></li>
                            <li><a href="../#contact" class="nav_link">Contact</a></li>
                            <li><a href="../#comments" class="nav_link">Comments</a></li>
                        </ul>
                        <div class="nav_functions">
                            <a href="#" class="btn nav_button" style="display: <?= !$isMyProfile ? 'block' : 'none'?>;">Sign up</a>
                            <div class="profile_nav">
                                <div class="profile_image">
                                    <h5 class="profile_name">Suyunbek</h5>
                                    <img src="../img/icon.jpg" alt="" class="profile_img">
                                </div>
                                <div class="profile_content">
                                    <span><a href="profile.html" class="profile_text">Profile info</a></span>
                                    <span><p class="log_out">Log out</p></span>
                                </div>
                            </div>
                            <div class="day_night">
                                <div class="day_night_indicator"><i class="far fa-sun"></i></div>
                                <div class="day_night_content">
                                    <span class="day_icon"><i class="far fa-sun"></i>Day</span>
                                    <span class="night_icon"><i class="far fa-moon"></i>Night</span>    
                                </div>
                            </div>
                        </div>
                        <div class="menu_btn_blog">
                            <div class="menu_btn"></div>
                            <div class="menu_btn_span"></div>
                        </div>
                    </div>
                </div>
            </nav> -->
            <?include_once('nav.php');?>
            <div class="delete_alert">
                <p class="delete_alert_text">Do you really want to delete this comment</p>
                <a href="#" class="btn delete_alert_btn">Yes</a>
            </div>

            <div class="profile_info">
                <div class="container">
                    <div class="profile_panel">
                        <div class="user_avatar">
                            <img src="<?= $isMyProfile ? $myProfile['avatar'] : $user['avatar']?>" alt="" class="user_img">
                            <div class="user_avatar_content">
                                <a href="./?route=change-avatar&id=<?= $_SESSION['id'];?>" class="user_avatar_change"><span><i class="fas fa-edit"></i></span>Change photo</a>
                            </div>
                        </div>
                        <h2 class="user_title"><?= $isMyProfile ? $myProfile['name'] : $user['name']?></h2>
                        <p class="username"><?= $isMyProfile ? $myProfile['username'] : $user['username']?></p>
                        <p class="user_bio"><?= $isMyProfile ? $myProfile['bio'] : $user['bio']?></p>
                        <div class="social_media">
                            <a href="https://t.me/MrUzcoin" class="messangers">
                                <i class="fab fa-telegram"></i>
                                <span class="tooltiptext">MrUzcoin</span>
                            </a>
                            <a href="https://twitter.com/MrUzcoin" class="messangers">
                                <i class="fab fa-twitter"></i>
                                <span class="tooltiptext">MrUzcoin</span>
                            </a>
                            <a href="https://www.facebook.com/suyunbek.saydazimov.18/" class="messangers">
                                <i class="fab fa-facebook"></i>
                                <span class="tooltiptext">Suyunbek</span>
                            </a>
                        </div>
                    </div>
                    <div class="profile_main">
                        <div class="about_profile">
                            <h2 class="about_profile_title"><i class="fas fa-info-circle"></i> <?= $isMyProfile ? 'Your' : $user['name'] . "'s"?> Profile</h2>
                            <div class="user_info">
                                <div class="user_info_item">
                                    <p class="user_info_title">Name</p>
                                    <span class="user_info_text"><?= $isMyProfile ? $myProfile['name'] : $user['name']?></span>
                                </div>
                                <div class="user_info_item">
                                    <p class="user_info_title">Username</p>
                                    <span class="user_info_text"><?= $isMyProfile ? $myProfile['username'] : $user['username']?></span>
                                </div>
                                <?if($isMyProfile):?>
                                <div class="user_info_item">
                                    <p class="user_info_title">Email</p>
                                    <span class="user_info_text"><?= $myProfile['email']?></span>
                                </div>
                                <?endif;?>
                                <div class="user_info_item">
                                    <p class="user_info_title">Phone number</p>
                                    <span class="user_info_text">+<?= $isMyProfile ? $myProfile['phone'] : $user['phone']?></span>
                                </div>
                                <div class="user_info_item user_info_bio">
                                    <p class="user_info_title">Bio</p>
                                    <span class="user_info_text"><?= $isMyProfile ? $myProfile['bio'] : $user['bio']?></span>
                                </div>
                            </div>
                        </div>
                        <div class="edit_profile" style="display: <?= $isMyProfile ? 'block' : 'none'?>;">
                            <h2 class="edit_profile_title"><i class="fas fa-user-edit"></i> Edit your Profile</h2>
                            <form action="./components/edit-profile.php" method="post" class="profile_form">
                                <div class="form_items">
                                    <label for="name" class="form_label">Your name</label>
                                    <input type="text" name="name" class="form_input" value="<?= $myProfile['name']?>" placeholder="name..." required>
                                </div>
                                <div class="form_items">
                                    <label for="username" class="form_label">Your Username</label>
                                    <input type="text" name="username" class="form_input" value="<?= $myProfile['username']?>" placeholder="username..." required>
                                </div>
                                <div class="form_items" class="form_label">
                                    <label for="email" class="form_label">Your Email</label>
                                    <input type="email" name="email" class="form_input" value="<?= $myProfile['email']?>" placeholder="email..." required>
                                </div>
                                <div class="form_items" class="form_label">
                                    <label for="phone" class="form_label">Your Phone number</label>
                                    <input type="number" name="phone" class="form_input" value="<?= $myProfile['phone']?>" placeholder="phone number..." required>
                                </div>
                                <div class="form_items" class="form_label">
                                    <label for="password" class="form_label">Your Password</label>
                                    <input type="password" name="password" class="form_input form_password" placeholder="password..." required>
                                    <span class="password_eye" title="Show password"><i class="fas fa-eye"></i></span>
                                </div>
                                <div class="form_items" class="form_label">
                                    <label for="bio" class="form_label">Your Bio</label>
                                    <input type="text" name="bio" class="form_input" value="<?= $myProfile['bio']?>" placeholder="bio...">
                                </div>
                                <input type="hidden" name="id" value="<?= $_SESSION['id']?>">
                                <button type="submit" class="btn submit_btn" title="Save changes">Save <i class="fas fa-save"></i></button>
                                <button type="reset" class="btn reset_btn" title="Reset inputs">Reset All</button>
                            </form>
                        </div>
                    </div>
                    <div class="profile_comments">
                        <h2 class="profile_comments_title"><i class="fas fa-comments"></i> Your Comments</h2>
                        <div class="profile_comments_main">
                            <div class="profile_user_comments">
                                <div class="profile_comments_content">
                                    <div class="comment" data-aos="flip-left" data-aos-duration="1000" data-aos-delay="200">
                                        <div class="comment_img_blog">
                                            <a href="#"><img src="../img/about_img.jpeg" alt="" class="comment_img" title="View profile"></a>
                                        </div>
                                        <div class="comment_body">
                                            <div class="comment_item">
                                                <p class="comment_text">Welcome back! You can write feedback (Coming soon), For this Scroll up page | Xush Kelibsiz! Bu kommentariya tizimi. Bu yerda o'z fikr mulohazangizni yozasiz va boshqalar fikrini ham ko'ra olasiz (Tez orada) </p>
                                                <form action="" method="post" class="comment_edit_form" style="display: none;">
                                                    <textarea name="comment" class="comment_area" placeholder="Message" required></textarea>
                                                    <div class="edit_comment_buttons">
                                                        <button class="btn edit_comment_button edit_comment_btn" type="submit">Save</button>
                                                        <button class="btn edit_comment_button cancel_comment_btn" type="button">Cancel</button>
                                                    </div>
                                                </form>
                                                <div class="comment_functions" style="display: <?= $isMyProfile ? 'flex' : 'none'?>;">
                                                    <a href="#" class="comment_function" id="edit" title="Edit comment"><i class="fas fa-pen"></i></a href="#">
                                                    <a href="#" class="comment_function" id="delete" title="Delete comment"><i class="fas fa-trash"></i></a href="#">
                                                </div>
                                            </div>
                                            <div class="comment_footer">
                                                <a href="#" class="comment_name" title="View profile">Suyunbek</a>
                                                <p class="comment_date" title="Comment created Date">2021-10-26 09:42</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="comment" data-aos="flip-right" data-aos-duration="1000" data-aos-delay="300">
                                        <div class="comment_img_blog">
                                            <a href="#"><img src="../img/about_img.jpeg" alt="" class="comment_img" title="View profile"></a>
                                        </div>
                                        <div class="comment_body">
                                            <div class="comment_item">
                                                <p class="comment_text">Welcome back! You can write feedback (Coming soon), For this Scroll up page | Xush Kelibsiz! Bu kommentariya tizimi. Bu yerda o'z fikr mulohazangizni yozasiz va boshqalar fikrini ham ko'ra olasiz (Tez orada) </p>
                                                <form action="" method="post" class="comment_edit_form" style="display: none;">
                                                    <textarea name="comment" class="comment_area" maxlength="300" placeholder="Message" required></textarea>
                                                    <div class="edit_comment_buttons">
                                                        <button class="btn edit_comment_button edit_comment_btn" type="submit">Save</button>
                                                        <button class="btn edit_comment_button cancel_comment_btn" type="button">Cancel</button>
                                                    </div>
                                                </form>
                                                <div class="comment_functions">
                                                    <a href="#" class="comment_function" id="edit" title="Edit comment"><i class="fas fa-pen"></i></a href="#">
                                                    <a href="#" class="comment_function" id="delete" title="Delete comment"><i class="fas fa-trash"></i></a href="#">
                                                </div>
                                            </div>
                                            <div class="comment_footer">
                                                <a href="#" class="comment_name" title="View profile">Suyunbek</a>
                                                <p class="comment_date" title="Comment created Date">2021-10-26 09:42</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="comment">
                                        <div class="comment_img_blog">
                                            <a href="#"><img src="../img/about_img.jpeg" alt="" class="comment_img" title="View profile"></a>
                                        </div>
                                        <div class="comment_body">
                                            <div class="comment_item">
                                                <p class="comment_text">Welcome back! You can write feedback (Coming soon), For this Scroll up page | Xush Kelibsiz! Bu kommentariya tizimi. Bu yerda o'z fikr mulohazangizni yozasiz va boshqalar fikrini ham ko'ra olasiz (Tez orada) </p>
                                                <form action="" method="post" class="comment_edit_form" style="display: none;">
                                                    <textarea name="comment" class="comment_area" placeholder="Message" required></textarea>
                                                    <div class="edit_comment_buttons">
                                                        <button class="btn edit_comment_button edit_comment_btn" type="submit">Save</button>
                                                        <button class="btn edit_comment_button cancel_comment_btn" type="button">Cancel</button>
                                                    </div>
                                                </form>
                                                <div class="comment_functions">
                                                    <a href="#" class="comment_function" id="edit" title="Edit comment"><i class="fas fa-pen"></i></a href="#">
                                                    <a href="#" class="comment_function" id="delete" title="Delete comment"><i class="fas fa-trash"></i></a href="#">
                                                </div>
                                            </div>
                                            <div class="comment_footer">
                                                <a href="#" class="comment_name" title="View profile">Suyunbek</a>
                                                <p class="comment_date" title="Comment created Date">2021-10-26 09:42</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="comment">
                                        <div class="comment_img_blog">
                                            <a href="#"><img src="../img/about_img.jpeg" alt="" class="comment_img" title="View profile"></a>
                                        </div>
                                        <div class="comment_body">
                                            <div class="comment_item">
                                                <p class="comment_text">Welcome back! You can write feedback (Coming soon), For this Scroll up page | Xush Kelibsiz! Bu kommentariya tizimi. Bu yerda o'z fikr mulohazangizni yozasiz va boshqalar fikrini ham ko'ra olasiz (Tez orada) </p>
                                                <form action="" method="post" class="comment_edit_form" style="display: none;">
                                                    <textarea name="comment" class="comment_area" maxlength="300" placeholder="Message" required></textarea>
                                                    <div class="edit_comment_buttons">
                                                        <button class="btn edit_comment_button edit_comment_btn" type="submit">Save</button>
                                                        <button class="btn edit_comment_button cancel_comment_btn" type="button">Cancel</button>
                                                    </div>
                                                </form>
                                                <div class="comment_functions">
                                                    <a href="#" class="comment_function" id="edit" title="Edit comment"><i class="fas fa-pen"></i></a href="#">
                                                    <a href="#" class="comment_function" id="delete" title="Delete comment"><i class="fas fa-trash"></i></a href="#">
                                                </div>
                                            </div>
                                            <div class="comment_footer">
                                                <a href="#" class="comment_name" title="View profile">Suyunbek</a>
                                                <p class="comment_date" title="Comment created Date">2021-10-26 09:42</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="profile_write_comments" style="display: <?= $isMyProfile ? 'block' : 'none'?>;">
                                <form action="" method="post" class="write_comments_form">
                                    <textarea type="text" name="comment" class="comment_write" title="Please write comment here" placeholder="Your message..." required></textarea>
                                    <button class="comment_send_btn" type="submit"><i class="fas fa-paper-plane"></i></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="../js/aos.js"></script>
        <script src="../js/profile.js?v=<?= time();?>"></script>
    </main>
</body>
</html>
<?
endif;
?>