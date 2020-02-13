class Menu {
    constructor(app) {
        //변수선언
        this.app = app;

        this.initForm = document.querySelectorAll(".init-form > a");
        this.initBoard = document.querySelector("#init-board");
        this.main = document.querySelectorAll(".main");
        
        this.addEvent();
    }

    addEvent() {
        this.app.$menu.addEventListener("click", this.menu)
        
        this.initBoard.addEventListener("click", ()=>{
            let board = new Board(this.app, this);
        })

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
        },'slow');
        // 
    }

    closeMenu() {
        // 화면전환
        this.app.$topDarkWrap.clearQueue().animate({
            'bottom' : '100%',
            'opacity':'0'
        },'slow');
        
        this.app.$login.clearQueue().animate({'opacity':'0'},'slow');
        this.app.$join.clearQueue().animate({'opacity':'0'},'slow');

        let leftDarkWrap = document.querySelector(".left-dark-wrap")
        let topDarkWrap = document.querySelector(".top-dark-wrap")
        setTimeout(() => {
            leftDarkWrap.style.visibility = 'visible';
            this.main.forEach(text=>{
                text.style.visibility = 'visible';
            });
            topDarkWrap.style.left = '45%';
            this.app.$leftDarkWrap.clearQueue().animate({'opacity':'0.4'},'slow');
            this.app.$main.clearQueue().animate({'opacity':'1'},'slow');
        }, 300);
        // 
    }

    //토스트 메시지
    /**
     * ㅂㅈㄷㅂㅈㄷㅂㅈㄷ
     * @param {toast} msg 우와 너무 신기하다!
     */
    toastMsg(msg){
        let toast = document.createElement("div");
        toast.id = 'toast';
        toast.style.zIndex = "200";
        toast.innerText = msg;

        if(document.querySelector("#toast") === null) 
            document.querySelector("body").appendChild(toast);
        else {
            toast.remove();
        }

        let $toast = $("#toast");
        $toast.clearQueue().animate({'opacity':'0.5'},'300');
        $toast.clearQueue().animate({'top':'85%'},'300');
        setTimeout(()=>{
            $toast.clearQueue().animate({'opacity':'0'},'300');
            $toast.clearQueue().animate({'top':'100%'},'300');
            setTimeout(() => {
                $toast.remove();
            }, 300);
        }, 2000)
    }
}