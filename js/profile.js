AOS.init();
// day night mode
let daysToExpire = new Date(2147483647 * 1000).toUTCString();
function getCookie(cName) {
    let name = cName + '=';
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
}

// day night mode
const main = document.querySelector('.main');
const day = document.querySelector('.day_icon');
const night = document.querySelector('.night_icon');
function dayNight(){
    day.addEventListener('click', function(){
        main.classList.remove('night');
        main.classList.add('day');
        document.cookie = `theme=day; expires=${daysToExpire}; path=/`;
    });
    night.addEventListener('click', function(){
        main.classList.remove('day');
        main.classList.add('night');
        document.cookie = `theme=night; expires=${daysToExpire}; path=/`;
    });
}
dayNight();
if (getCookie('theme') == 'day') {
    main.classList.remove('night');
    main.classList.add('day');
} else if (getCookie('theme') == 'night') {
    main.classList.remove('day');
    main.classList.add('night');
}
document.querySelector('.user_img').style.height = document.querySelector('.user_img').offsetWidth + 'px';
window.addEventListener('resize', function(){
    document.querySelector('.user_img').style.height = document.querySelector('.user_img').offsetWidth + 'px';
});

const inputs = document.querySelectorAll('.form_input');
const password = document.querySelector('.form_password');
const passwordEye = document.querySelector('.password_eye');
for (let i = 0; i < inputs.length; i++) {
    inputs[i].addEventListener('input', function(){
        if (this.value.length > 0) {
            this.classList.add('filled');
        } else{
            this.classList.remove('filled');
        }
    });
}
passwordEye.addEventListener('click', function(){
    this.classList.toggle('active');
    if (this.classList.contains('active')) {
        password.type = 'text';
    } else{
        password.type = 'password';
    }
});
const menuBtn = document.querySelector('.menu_btn_blog');
const nav = document.querySelector('nav');
let isMenu = false;
menuBtn.addEventListener('click', function(){
    if (!isMenu) {
        this.classList.add('active');
        nav.classList.add('active');
        isMenu = true;
    } else{
        this.classList.remove('active');
        nav.classList.remove('active');
        isMenu = false;
    }
});
const navList = document.querySelector('.nav_list');
const menuIcon = document.querySelector('.menu_btn');
const menuSpan = document.querySelector('.menu_btn_span');
window.addEventListener('click', function(e) {
    if (isMenu) {   
        if (e.target != menuIcon && e.target != menuSpan && e.target != navList) {
            menuBtn.classList.remove('active');
            nav.classList.remove('active');
            isMenu = false;
        } else{
            nav.classList.add('active');
            menuBtn.classList.add('active');
        }
    }
});
const profileComments = document.querySelector('.profile_user_comments');
const profilePanel = document.querySelector('.profile_panel');
const commentEditForm = document.querySelectorAll('.comment_edit_form');
const editCommentBtn = document.querySelectorAll('#edit');
const delCommentBtn = document.querySelectorAll('#delete');
const deleteAlert = document.querySelector('.delete_alert');
const cancelCommentBtn = document.querySelectorAll('.cancel_comment_btn');
const commentText = document.querySelectorAll('.comment_text');
profileComments.querySelector('.profile_comments_content').style.height = profilePanel.offsetHeight - 50 + 'px';
for (let i = 0; i < editCommentBtn.length; i++) {   
    editCommentBtn[i].addEventListener('click', function(e){
        e.preventDefault();
        commentText[i].style.display = 'none';
        commentEditForm[i].style.display = 'block';
    });
    cancelCommentBtn[i].addEventListener('click', function(){
        commentText[i].style.display = 'block';
        commentEditForm[i].style.display = 'none';
    });
    delCommentBtn[i].addEventListener('click', function(e){
        e.preventDefault();
        let delHref = this.getAttribute('href');
        deleteAlert.querySelector('.btn').href = delHref;
    });
}
window.addEventListener('click', function(e){
    for (let i = 0; i < delCommentBtn.length; i++) { 
        if (e.target != delCommentBtn[i] && e.target != delCommentBtn[i].querySelector('i') && e.target != deleteAlert) {
            deleteAlert.classList.remove('active');
            document.body.style.overflow = 'auto';
        } else{
            deleteAlert.classList.add('active');
            document.body.style.overflow = 'hidden';
            break;
        }
    }
});