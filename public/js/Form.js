class Form {
    constructor(app, menu, e) {
        this.app = app;
        this.menu = menu;
        this.e = e; 

        this.loginForm = document.querySelector("#login");
        this.joinForm = document.querySelector("#join");
        this.difForm = document.querySelectorAll(".init-dif-form");

        this.addEvent();
    }

    addEvent() {
        this.viewForm(this.e);

        this.difForm.forEach(dif=>{
            dif.addEventListener("click", e=>{
                this.changeForm(e);
            })
        })
    }
    
    viewForm(e) {
        if(e.target.classList[0] === 'loginBtn') {
            this.loginForm = document.querySelector("#login").style.opacity = '1';
            document.querySelector("#login").style.visibility = "visible";
            document.querySelector("#join").style.visibility = "hidden";
        } else {
            this.joinForm = document.querySelector("#join").style.opacity = '1';
            document.querySelector("#login").style.visibility = "hidden";
            document.querySelector("#join").style.visibility = "visible";
        }
        // 화면전환
        $(".top-dark-wrap").clearQueue().animate({'left':'-55%'},500);
        $(".left-dark-wrap").clearQueue().animate({'opacity':'0'},500);
        $(".main").clearQueue().animate({'opacity':'0'},500);

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
        console.log(e.target)
        if(e.target.classList[0] === 'dif-login') {
            document.querySelector("#login").style.visibility = "hidden";
            document.querySelector("#join").style.visibility = "visible";
            $("#login").clearQueue().animate({'opacity':'0'},1000);
            $("#join").clearQueue().animate({'opacity':'1'},1000);
        } else if(e.target.classList[0] === 'dif-join') {
            console.log("asd")
            document.querySelector("#login").style.visibility = "visible";
            document.querySelector("#join").style.visibility = "hidden";
            $("#login").clearQueue().animate({'opacity':'1'},1000);
            $("#join").clearQueue().animate({'opacity':'0'},1000);
        }
    }
}