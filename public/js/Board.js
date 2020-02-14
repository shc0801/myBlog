class Board {
    constructor(app, menu) {
        this.app = app;
        this.menu = menu;
        
        this.initWrite = document.querySelector("#init-write");
        this.boardHomeBtn = document.querySelector(".board-logo-text");

        this.addEvent();
    }

    addEvent() {
        this.viewBoard();

        this.initWrite.addEventListener("click", ()=>{
            let write = new Write(this.app, this.menu, this);
        })

        this.boardHomeBtn.addEventListener("click", ()=>{
            this.closeBoard();
        })
    }
    
    viewBoard() {
        this.app.$board.clearQueue().animate({'top': '0'}, 'slow');
        this.menu.closeMenu();
    }
    
    closeBoard() {
        this.app.$board.clearQueue().animate({'top': '-100%'}, 'slow');
        this.menu.closeMenu();
    }
}