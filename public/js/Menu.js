class Menu {
    constructor(app) {
        //변수선언
        this.app = app;

        this.initForm = document.querySelectorAll(".init-form > a");
        this.main = document.querySelectorAll(".main");

        this.addEvent();
    }

    addEvent() {
        this.app.$menu.addEventListener("click", this.menu)

        // viewForm
        setInterval(() => {
            this.initForm = document.querySelectorAll(".init-form > a");
            this.initForm.forEach(btn=>{
                btn.addEventListener("click", e=>{
                    let form = new Form(this.app, this, e);
                })
            });
        }, 1000);

    }
    
    menu = () => {
        this.menuIcon = document.querySelector("#menuicon");
        if(!this.menuIcon.checked){
            this.viewMenu();
        } else {
            this.closeMenu();
        }
    }

    viewMenu() {
        // 화면전환
        this.app.$topDarkWrap.clearQueue().animate({
            'bottom':'0%',
            'opacity':'1'
        },500);
        // 
    }

    closeMenu() {
        // 화면전환
        this.app.$topDarkWrap.clearQueue().animate({
            'bottom' : '100%',
            'opacity':'0'
        },500);
        
        this.app.$login.clearQueue().animate({'opacity':'0'},500);
        this.app.$join.clearQueue().animate({'opacity':'0'},500);

        let leftDarkWrap = document.querySelector(".left-dark-wrap")
        let topDarkWrap = document.querySelector(".top-dark-wrap")
        setTimeout(() => {
            leftDarkWrap.style.visibility = 'visible';
            this.main.forEach(text=>{
                text.style.visibility = 'visible';
            });
            topDarkWrap.style.left = '45%';
            this.app.$leftDarkWrap.clearQueue().animate({'opacity':'0.4'},500);
            this.app.$main.clearQueue().animate({'opacity':'1'},500);
        }, 300);
        // 
    }
}