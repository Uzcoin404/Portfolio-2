const signin__btn = document.querySelector("#signin__btn");
const signup__btn = document.querySelector("#register__btn");
const container = document.querySelector(".container");
let daysToExpire = new Date(2147483647 * 1000).toUTCString();

checkCookie('page') ? container.classList.add('signup-mode') : '';
signup__btn.addEventListener('click', () => {
    container.classList.add("signup-mode");
    document.cookie = `page=register; expires=${daysToExpire}`;
});
signin__btn.addEventListener('click', () => {
    container.classList.remove("signup-mode");
    document.cookie = `page=signin; expires=${daysToExpire}`;
});
const buttons = document.querySelector('#register__btn');

buttons.addEventListener('click', function(e) {

    let x = e.clientX - e.target.offsetLeft;
    let y = e.clientY - e.target.offsetTop;

    let ripples = document.createElement('span');
    ripples.style.left = x + 'px';
    ripples.style.top = y + 'px';

    this.appendChild(ripples);

    setTimeout(() => {
        ripples.remove()
    },750);
});

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
function checkCookie(name) {
    let cName = getCookie(name);
    if (cName != undefined && cName != 'signin') {
        return true;
    } else{
        return false;
    }
}

const inputs = document.querySelectorAll('.register input');
const passwordEye = document.querySelectorAll('.passwordEye');
const allPassword = document.querySelectorAll('.form_pass');
const email = document.querySelector('.form_email');
const errorMessage = document.querySelector('.error_email');
const errorPass = document.querySelector('.error_pass');
const passwordContent = document.querySelectorAll('.password__content');
const passwordIndicator = document.querySelectorAll('.password__indicator span');
const registerBtn = document.querySelector('.register_button');
const validateEmail = (eml) => {
    return String(eml)
      .toLowerCase()
      .match(
        /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        );
};
for (let i = 0; i < inputs.length; i++) {
    inputs[i].addEventListener('change', function(){
        this.classList.remove('is-invalid');
    });
}
for (let i = 0; i < passwordEye.length; i++) {
    passwordEye[i].addEventListener('click', function(){
        this.classList.toggle('show');
        if (this.classList.contains('show')) {
            allPassword[i].setAttribute('type', 'text');
        } else{
            allPassword[i].setAttribute('type', 'password');
        }
        allPassword[i].focus();
    })
}
const password = document.querySelectorAll('.form_password');
for (let i = 0; i < password.length; i++) {
    password[i].addEventListener('keyup', function(){
        var passValue = password[i].value;
        checkStrength(passValue, passwordIndicator[i], document.querySelectorAll('#passWeak')[i], document.querySelectorAll('#passMedium')[i], document.querySelectorAll('#passStrong')[i]);
        checkStrength(passValue, passwordIndicator[i], document.querySelectorAll('#passWeak')[i], document.querySelectorAll('#passMedium')[i], document.querySelectorAll('#passStrong')[i]) ? errorPass.style.display = 'none' : errorPass.style.display = 'block';
    })
    password[i].addEventListener('focus', function(){
        passwordContent[i].classList.add('active');
    });
    password[i].addEventListener('blur', function(){
        passwordContent[i].classList.remove('active');
    });
}
email.addEventListener('input', function(){
    if (this.value.length >= 1) {
        email.classList.add('filled');
        if (!validateEmail(this.value)) {
            errorMessage.style.display = 'block';
        } else{
            errorMessage.style.display = 'none';
        }
    } else{
        email.classList.remove('filled');
    }
    console.log(this.value);
    console.log(validateEmail(this.value));
});

function checkStrength(value, indicator, weak, medium, strong) {
    let strength = 0;
    if (value.length > 5) {
        strength += 1;
        weak.style.color = '#00ff00';
    } else{
        weak.style.color = '#ff2340';
    }
    if (value.match(/[0-9]/g)) {
        strength += 1;
        medium.style.color = '#00ff00';
    } else{
        medium.style.color = '#ff2340';
    }
    if (value.match(/[A-Z]/g)) {
        strength += 1;
        strong.style.color = '#00ff00';
    } else {
        strong.style.color = '#ff2340';
    }
    if (strength == 0) {
        indicator.style.width = '0%';
    }
    if (strength == 1) {
        indicator.style.width = '33.33%';
        indicator.style.background = '#ff2340';
    }
    if (strength == 2) {
        indicator.style.width = '66.66%';
        indicator.style.background = 'orange';
    }
    if (strength == 3) {
        indicator.style.width = '99.99%'
        indicator.style.background = '#00ff00';
        if (password[0].value === password[1].value) {
            registerBtn.disabled = false;
            return true;
        }
    } else{
        registerBtn.disabled = true;
        return false;
    }
}

class imgUploader {
    constructor(){
        const register = document.querySelector('.register');
        const formWrapper = document.querySelector('.form__wrapper');
        const formCancel = document.querySelector('.formUploader__cancel');
        const imgUploader = document.querySelector('.imgUploader');
        const formImg = document.querySelector('.form__img');
        const formPages = document.querySelector('.form_pages');
        const backBtn = document.querySelectorAll('.backBtn');
        const nextBtn = document.querySelectorAll('.nextBtn');
        const steps = document.querySelectorAll('.steps');
        const formImgName = document.querySelector('.formUploader__fileName p');
        let regExp = /[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/;
        formImg.addEventListener('click', function(){
            imgUploader.click();
        })
        imgUploader.addEventListener('change', function(){
            const formFile = this.files[0];
            if (formFile) {
                const reader = new FileReader();
                reader.onload = function(){
                    let result = reader.result;
                    formImg.src = result;
                    formWrapper.classList.add('active');
                }
                formCancel.addEventListener('click', function(){
                    formImg.src = "";
                    formWrapper.classList.remove('active');
                })
                reader.readAsDataURL(formFile);
            }
            if (this.value) {
                let valueStore = this.value.match(regExp);
                formImgName.innerHTML = valueStore;
            }
        });
        for (let i = 0; i < backBtn.length; i++) {            
            nextBtn[i].addEventListener('click', function(){
                formPages.style.transform = `translateX(-${i == 0 ? '33.33%' : i == 1 ? '66.66%' : ''})`;
                i == 0 ? steps[0].classList.add('active') : '';
                i == 1 ? steps[1].classList.add('active') : '';
            });
            backBtn[i].addEventListener('click', function(){
                formPages.style.transform = `translateX(-${i == 0 ? '0' : i == 1 ? '33.33%' : ''})`;
                i == 0 ? steps[0].classList.remove('active') : '';
                i == 1 ? steps[1].classList.remove('active') : '';
            });
        }
        registerBtn.addEventListener('click', function(){
            for (let i = 0; i < inputs.length; i++) {
                if (inputs[i].classList.contains('invalid')) {
                    register.classList.add('invalid');
                }
            }
         });
    }
}
const imguploader = new imgUploader();