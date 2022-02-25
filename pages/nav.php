            <nav class="nav">
                <div class="container_glass">
                    <div class="nav_blog">
                        <a href="/" class="nav_logo"><p class="logo_text">Uzcoin</p></a>
                        <ul class="nav_list">
                            <li><a href="<?= $isProfile || $_GET['route'] == 'comments' ? '../' : ''?>#home" class="nav_link">Home</a></li>
                            <li><a href="<?= $isProfile || $_GET['route'] == 'comments' ? '../' : ''?>#about" class="nav_link">About</a></li>
                            <li><a href="<?= $isProfile || $_GET['route'] == 'comments' ? '../' : ''?>#skills" class="nav_link">Skills</a></li>
                            <li><a href="<?= $isProfile || $_GET['route'] == 'comments' ? '../' : ''?>#projects" class="nav_link">Projects</a></li>
                            <li><a href="<?= $isProfile || $_GET['route'] == 'comments' ? '../' : ''?>#service" class="nav_link">Service</a></li>
                            <li><a href="<?= $isProfile || $_GET['route'] == 'comments' ? '../' : ''?>#contact" class="nav_link">Contact</a></li>
                            <li><a href="../?route=comments" class="nav_link">Comments</a></li>
                        </ul>
                        <div class="nav_functions">
                            <a href="./?route=login-register" class="btn nav_button" style="display: <?= !$_SESSION['id'] ? 'block' : 'none'?>;">Sign in</a>
                            <div class="profile_nav" style="display: <?= $_SESSION['id'] ? 'block' : 'none'?>;">
                                <div class="profile_image">
                                    <h5 class="profile_name"><?= $myProfile['name']?></h5>
                                    <img src="<?= $myProfile['avatar']?>" alt="" class="profile_img">
                                </div>
                                <div class="profile_content">
                                    <span><a href="./?route=profile" class="profile_text">My Profile</a></span>
                                    <span><p class="log_out"><a href="./components/user-login.php">Log out</a></p></span>
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
            </nav>