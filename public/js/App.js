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

        this.$board = $("#board");

        this.$writeArea = $("#write-area"); 
        this.$writeTitle = $(".write-title");
        this.$writeTitleInput = $("#write-title-input");
        this.$writeContent = $(".write-content");
        this.$writeContentInput = $("#write-content-input");
        this.$writeDateInput = $("#write-date-input");
        // 

        let menu = new Menu(this);
    }
}

window.addEventListener("load", ()=>{
    let app = new App;
}); 
