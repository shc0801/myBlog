class SandWrite {
    constructor(app, menu, board, write) {
        this.app = app;
        this.menu = menu;
        this.board = board;
        this.write = write;
        
        this.addEvent();
    }

    addEvent() {
        this.writeProcess();
    }

    writeProcess() {
        let form = $(`#write`).serialize();
        $.ajax({
            url: '/write',
            method:'post',
            data:form,
            success:(data)=>{
                this.menu.toastMsg(data); 
                this.app.$MainWriteView.load("/ #board-main-write-view");
                this.boardLoad();
                
                this.write.closeWrite();
            }
        })
    }

    boardLoad() {
        $.ajax({
            url: '/board',
            method: 'post',
            success: (data)=>{
                if(data === '로그인 후 가능한 기능입니다') {
                    this.toastMsg(data);
                    return;
                }

                this.menu.createWriteView(data.list);
                this.writes = document.querySelectorAll(".board-main-write");

                let board = new Board(this.app, this);
            }
        })
    }
}