class App{
    constructor(){
        //변수선언
        this.$menu = document.querySelector(".hamburger > label");

        // jqurey-dom
        this.$login = $("#login");
        this.$join = $("#join");

        this.$topDarkWrap = $(".top-dark-wrap");
        this.$leftDarkWrap = $(".left-dark-wrap");
        this.$main = $(".main");
        
        this.$menuIcon = $("#menuicon");
        this.$initForm = $("#init-form");
        // 

        let menu = new Menu(this);
        let write = new Write(this);
    }
}

window.addEventListener("load", ()=>{
    let app = new App;
}); 
