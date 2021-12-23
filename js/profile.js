AOS.init();
// day night mode
function dayNight(){
    const main = document.querySelector('.main');
    const day = document.querySelector('.day_icon');
    const night = document.querySelector('.night_icon');
    day.addEventListener('click', function(){
        main.classList.remove('night');
        main.classList.add('day');
    });
    night.addEventListener('click', function(){
        main.classList.remove('day');
        main.classList.add('night');
    });
}
dayNight();
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
const profileComments = document.querySelector('.profile_user_comments');
const commentEditForm = document.querySelectorAll('.comment_edit_form');
const editCommentBtn = document.querySelectorAll('#edit');
const delCommentBtn = document.querySelectorAll('#delete');
const deleteAlert = document.querySelector('.delete_alert');
const cancelCommentBtn = document.querySelectorAll('.cancel_comment_btn');
const commentText = document.querySelectorAll('.comment_text');
profileComments.querySelector('.profile_comments_content').style.maxHeight = profileComments.offsetHeight + 'px';
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