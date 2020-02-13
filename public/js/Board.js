class Board {
    constructor(app, menu) {
        this.app = app;
        this.menu = menu;
        
        this.initWrite = document.querySelector("#init-write");

        this.addEvent();
    }

    addEvent() {
        this.viewBoard();

        this.initWrite.addEventListener("click", ()=>{
            let write = new Write(this.app, this.menu, this);
        })
    }
    /**
     * 
     */
    viewBoard() {
        this.app.$board.clearQueue().animate({'top': '0'});
        this.menu.closeMenu();
    }
}