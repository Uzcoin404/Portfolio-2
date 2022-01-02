<?
include_once('./components/db.php');
$isMyProfile = $_SESSION['id'] ? true : false;
if($isMyProfile): header("Location: ../?route=profile");
else :
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Register</title>
    <link rel="stylesheet" href="../styles/all.min.css">
    <link rel="stylesheet" href="../styles/log-reg.css?v=<?= time();?>">
    <link rel="icon" href="../img/icon.jpg">
</head>
<body>

    <main class="main">
        <? if($_GET['error']): ?>
        <div class="error_alert">
            <h4 class="error_text">The email or password you entered is invalid</h4>
            <span class="error_close"><i class="fas fa-times"></i></span>
        </div>
        <?endif;?>
        <div class="container">
            <div class="forms">
                <div class="sign__blog">

                    <form method="post" action="../components/user-login.php" class="signin">

                        <div class="profile__img__blog">
                            <img src="../img/profile.svg" alt="" class="profile">
                        </div>
                        <h2 class="form_title">Sign in</h1>
                        <div class="input_item">
                            <input name="username" type="text" class="form_input" oninvalid="this.classList.add('invalid')" required>
                            <label for="username" class="form_label"><i class="fas fa-user"></i> Username</label>
                        </div>
                        <div class="input_item">
                            <span class="passwordEye"><i class="fas fa-eye-slash"></i></span>
                            <input name="password" type="password" class="form_input form_pass" oninvalid="this.classList.add('invalid')" required>
                            <label for="password" class="form_label"><i class="fas fa-lock"></i> Password</label>
                        </div>
                        <button type="submit" class="btn">Sign in</button>

                    </form>

                    <form method="post" action="../components/user-reg.php" enctype="multipart/form-data" class="register">

                        <h2 class="form_title">Register</h1>
                        <div class="form_steps">
                            <div class="steps">
                                <p class="steps_title">Name</p>
                                <span class="steps_numb">1</span>
                            </div>
                            <div class="steps">
                                <p class="steps_title">Password</p>
                                <span class="steps_numb">2</span>
                            </div>
                            <div class="steps">
                                <p class="steps_title">Avatar</p>
                                <span class="steps_numb step_end">3</span>
                            </div>
                        </div>
                        <div class="register_content">
                            <div class="form_pages">
                                <div class="form_page page_1">
                                    <div class="input_item">
                                        <input name="name" type="text" class="form_input" oninvalid="this.classList.add('invalid')" required>
                                        <label for="name" class="form_label"><i class="fas fa-user"></i> Name</label>
                                    </div>
                                    <div class="input_item">
                                        <input name="username" type="text" class="form_input" oninvalid="this.classList.add('invalid')" required>
                                        <label for="username" class="form_label"><i class="fas fa-user"></i> Username</label>
                                    </div>
                                    <div class="input_item">
                                        <input name="email" type="email" class="form_input form_email" oninvalid="this.classList.add('invalid')" required>
                                        <label for="email" class="form_label"><i class="fas fa-envelope"></i> Email adress</label>
                                        <p class="error_email">Email is wrong</p>
                                    </div>
                                    <div class="input_item">
                                        <input name="phone" type="number" class="form_input"  oninvalid="this.classList.add('invalid')" required>
                                        <label for="phone" class="form_label"><i class="fas fa-phone"></i> Phone number</label>
                                    </div>
                                    <button type="button" class="btn nextBtn">Next</button>
                                </div>
                                <div class="form_page page_2 page_password">
                                    <div class="input_item textarea_item">
                                        <textarea name="bio" maxlength="300" type="text" class="form_input form_textarea"  oninvalid="this.classList.add('invalid')" tabindex="-1" required></textarea>
                                        <label for="bio" class="form_label"><i class="fas fa-info"></i> Bio</label>
                                    </div>
                                    <div class="input_item password_item">
                                        <span class="passwordEye"><i class="fas fa-eye-slash"></i></span>
                                        <input name="password" type="password" class="form_input form_pass form_password" oninvalid="this.classList.add('invalid')" tabindex="-1" required>
                                        <label for="password" class="form_label"><i class="fas fa-lock"></i> Password</label>
                                    </div>
                                    <div class="password__content">
                                        <div class="password__indicator">
                                            <span></span>
                                        </div>
                                        <ul class="password__info">
                                            <li class="password__info__text"><i class="fas fa-check-circle" id="passWeak"></i> Minimum be at least 6 Characters</li>
                                            <li class="password__info__text"><i class="fas fa-check-circle" id="passMedium"></i> Minimum be at least 1 Number</li>
                                            <li class="password__info__text"><i class="fas fa-check-circle" id="passStrong"></i> Minimum be at least 1 Capital letter</li>
                                        </ul>
                                    </div>
                                    <div class="input_item password_item">
                                        <span class="passwordEye"><i class="fas fa-eye-slash"></i></span>
                                        <input name="re-password" type="password" class="form_input form_pass form_password" oninvalid="this.classList.add('invalid')" tabindex="-1" required>
                                        <label for="password" class="form_label"><i class="fas fa-lock"></i> Re-enter Password</label>
                                        <p class="error_pass">Password doesn't Match</p>
                                    </div>
                                    <div class="password__content">
                                        <div class="password__indicator">
                                            <span></span>
                                        </div>
                                        <ul class="password__info">
                                            <li class="password__info__text"><i class="fas fa-check-circle" id="passWeak"></i> Minimum be at least 6 Characters</li>
                                            <li class="password__info__text"><i class="fas fa-check-circle" id="passMedium"></i> Minimum be at least 1 Number</li>
                                            <li class="password__info__text"><i class="fas fa-check-circle" id="passStrong"></i> Minimum be at least 1 Capital letter</li>
                                        </ul>
                                    </div>
                                    <div class="register_buttons">
                                        <button type="button" class="btn backBtn" tabindex="-1">Back</button>
                                        <button type="button" class="btn nextBtn" tabindex="-1">Next</button>
                                    </div>
                                </div>
                                <div class="form_page page_3">
                                    <div class="input_item input_uploader">
                                        <div class="form__imgUploader">
                                            <div class="form__wrapper">
                                                <div class="form__image">
                                                    <img src="" alt="" class="form__img">
                                                </div>
                                                <div class="formUploader__content">
                                                    <div class="formUploader__icon"><i class="fas fa-cloud-upload-alt"></i></div>
                                                    <div class="formUploader__text">No photo Choosen, yet!</div>
                                                </div>
                                                <div class="formUploader__cancel"><i class="fas fa-times"></i></div>
                                                <div class="formUploader__fileName"><p>File name</p></div>
                                            </div>
                                            <input name="avatar" type="file" class="imgUploader" accept=".jpg, .jpeg, .png" name="avatar" tabindex="-1" hidden>
                                        </div>
                                    </div>
                                    <div class="register_buttons">
                                        <button type="button" class="btn backBtn" tabindex="-1">Back</button>
                                        <button type="submit" class="btn register_button" tabindex="-1" disabled>Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="invalid_info">Something entered Wrong! Please check it Out</p>
                    </form>

                </div>
            </div>

            <div class="panels__blog">

                <div class="panel left__panel">

                    <div class="content">

                        <h3 class="panel__title">New here ?</h3>
                        <p class="panel__text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ex fuga minima iure optio repudiandae ipsum?</p>
                        <button class="button transparent" id="register__btn">Register</button>

                    </div>
                    <img src="../img/login.svg" alt="" class="panel__img">
                </div>

                <div class="panel right__panel">

                    <div class="content">

                        <h3 class="panel__title">Already have account</h3>
                        <p class="panel__text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ex fuga minima iure optio repudiandae ipsum?</p>
                        <button class="button transparent" id="signin__btn">Sign in</button>

                    </div>
                    <img src="../img/register.svg" alt="" class="panel__img">
                </div>

            </div>

        </div>
    </main>
    <script src="../js/log-reg.js?v=<?= time();?>"></script>

</body>
</html>
<?endif;?>