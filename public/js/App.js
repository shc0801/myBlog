class App{
    constructor(){
        //변수선언
        this.$menu = document.querySelector(".hamburger > label");
        let menu = new Menu(this);
    }
}

window.addEventListener("load", ()=>{
    let app = new App;
}); 
