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
        let $form = $(`#write`).serialize();
        $.ajax({
            url: '/write',
            method:'post',
            data:$form,
            success:(data)=>{
                this.menu.toastMsg(data); 
                setTimeout(()=>{
                    
                    this.boardLoad();
                    this.menu.writes = document.querySelectorAll(".board-main-write");
                    this.write.closeWrite();
                }, 500)
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

                setTimeout(()=>{
                    this.writes = document.querySelectorAll(".board-main-write");
                }, 100)

                let board = new Board(this.app, this.menu);
            }
        })
    }
}