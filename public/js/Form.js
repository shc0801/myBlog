class Form {
    constructor(app, menu, e) {
        this.app = app;
        this.menu = menu;
        this.e = e; 
        
        // dom
        this.loginForm = document.querySelector("#login");
        this.joinForm = document.querySelector("#join");
        this.difForm = document.querySelectorAll(".init-dif-form");

        this.formBtn = document.querySelectorAll(".form-btn");

        this.input = document.querySelectorAll("input");
        this.imageInput = document.querySelector("#Profile-picture");

        this.addEvent();
    }

    addEvent() {
        this.viewForm(this.e);

        //다른 폼으로 전환
        this.difForm.forEach(dif=>{
            dif.addEventListener("click", e=>{
                this.changeForm(e);
            })
        })
        
        this.imageInput.addEventListener("change", ()=>{
            this.menu.ImageCheck(this.imageInput)
        })

        //로그인, 회원가입 
        this.formBtn.forEach(btn=>{
            btn.addEventListener("click", (e)=>{
                let id = document.querySelector(`#${e.target.id}`).parentNode.parentNode.id;
                let sandUser = new SandUser(this.app, this.menu, this, id);
                setTimeout(()=>{
                    this.input.forEach(input=>{
                        input.value = '';
                    })
                }, 1000)
            })
        })
    }
    
    viewForm(e) {
        if(e.target.classList[0] === 'loginBtn') {
            this.loginForm = document.querySelector("#login").style.opacity = '1';
            document.querySelector("#login").style.visibility = "visible";
            document.querySelector("#join").style.visibility = "hidden";
        } else if(e.target.classList[0] === 'joinBtn') {
            this.joinForm = document.querySelector("#join").style.opacity = '1';
            document.querySelector("#login").style.visibility = "hidden";
            document.querySelector("#join").style.visibility = "visible";
        } else {
            $.ajax({
                url: `/logout`,
                method:'post',
                success:(data)=>{
                    this.menu.toastMsg(data);
                    this.menu.closeMenu();

                    this.app.$menuIcon.prop("checked", false);
                    this.menu.closeBoard();
                    setTimeout(() => {
                        this.app.$initForm.load("/ .init-form");
                    }, 300);
                }
            });
            return;
        }
        // 화면전환
        this.app.$topDarkWrap.clearQueue().animate({'left':'-55%'},'slow');
        this.app.$leftDarkWrap.clearQueue().animate({'opacity':'0'},'slow');
        this.app.$main.clearQueue().animate({'opacity':'0'},'slow');

        let leftDarkWrap = document.querySelector(".left-dark-wrap")
        setTimeout(() => {
            leftDarkWrap.style.visibility = 'hidden';
            this.menu.main.forEach(text=>{
                text.style.visibility = 'hidden';
            });
        }, 500);
        // 
    }

    changeForm(e) {
        if(e.target.classList[0] === 'dif-login') {
            document.querySelector("#login").style.visibility = "hidden";
            document.querySelector("#join").style.visibility = "visible";
            
            this.app.$login.clearQueue().animate({'opacity':'0'},1000);
            this.app.$join.clearQueue().animate({'opacity':'1'},1000);
        } else if(e.target.classList[0] === 'dif-join') {
            document.querySelector("#login").style.visibility = "visible";
            document.querySelector("#join").style.visibility = "hidden";

            this.app.$login.clearQueue().animate({'opacity':'1'},1000);
            this.app.$join.clearQueue().animate({'opacity':'0'},1000);
        }
    }
}