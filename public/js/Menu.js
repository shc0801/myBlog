class Menu {
    constructor(app) {
        //변수선언
        this.app = app;

        this.$initForm = document.querySelectorAll(".init-form > a");
        this.main = document.querySelectorAll(".main");

        this.addEvent();
    }

    addEvent() {
        this.app.$menu.addEventListener("click", this.menu)
        
        // viewForm
        this.$initForm.forEach(btn=>{
            btn.addEventListener("click", e=>{
                let form = new Form(this.app, this, e);
            })
        });
    }
    
    menu = () => {
        this.$menuIcon = document.querySelector("#menuicon");
        if(!this.$menuIcon.checked){
            this.viewMenu();
        } else {
            this.closeMenu();
        }
    }

    viewMenu() {
        // 화면전환
        $(".top-dark-wrap").clearQueue().animate({
            'bottom':'0%',
            'opacity':'1'
        },500);
        // 
    }

    closeMenu() {
        // 화면전환
        $(".top-dark-wrap").clearQueue().animate({
            'bottom' : '100%',
            'opacity':'0'
        },500);
        
        $("#login").clearQueue().animate({'opacity':'0'},500);
        $("#join").clearQueue().animate({'opacity':'0'},500);

        let leftDarkWrap = document.querySelector(".left-dark-wrap")
        let topDarkWrap = document.querySelector(".top-dark-wrap")
        setTimeout(() => {
            leftDarkWrap.style.visibility = 'visible';
            this.main.forEach(text=>{
                text.style.visibility = 'visible';
            });
            topDarkWrap.style.left = '45%';
            $(".left-dark-wrap").clearQueue().animate({'opacity':'0.4'},500);
            $(".main").clearQueue().animate({'opacity':'1'},500);
        }, 500);
        // 
    }
}