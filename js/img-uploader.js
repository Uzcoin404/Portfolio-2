class imgUploader {
    constructor(){
        const formContent = document.querySelector('.form__content');
        const formWrapper = document.querySelector('.form__wrapper');
        const customBtn = document.querySelector('.customBtn');
        const formCancel = document.querySelector('.formUploader__cancel');
        const imgUploader = document.querySelector('.imgUploader');
        const formImg = document.querySelector('.form__img');
        const formImgName = document.querySelector('.formUploader__fileName p');
        const doneBtn = document.querySelector('.doneBtn');
        const skipBtn = document.querySelector('.skipBtn');
        const nextBtn = document.querySelector('.nextBtn');
        let regExp = /[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/;
        customBtn.addEventListener('click', function(){
            imgUploader.click();
        })
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
                    skipBtn.disabled = true;
                    doneBtn.disabled = false;
                }
                formCancel.addEventListener('click', function(){
                    formImg.src = "";
                    formWrapper.classList.remove('active');
                    skipBtn.disabled = false;
                    doneBtn.disabled = true;
                })
                reader.readAsDataURL(formFile);
            }
            if (this.value) {
                let valueStore = this.value.match(regExp);
                formImgName.innerHTML = valueStore;
            }
        });
    }
}
const imguploader = new imgUploader();