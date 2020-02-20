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
        if(this.menu.writeSaveBtn.classList[0] === 'write') {
            let $form = $(`#write`).serialize();
            $.ajax({
                url: '/write',
                method:'post',
                data:$form,
                success:(data)=>{
                    this.menu.toastMsg(data); 
                    setTimeout(()=>{
                        this.board.boardLoad();
                        this.menu.writes = document.querySelectorAll(".board-main-write");
                        this.write.closeWrite();
                        this.write.clearWrite();
                    }, 500)
                }
            })
        } 
        
        else if(this.menu.writeSaveBtn.classList[0] === 'update') {
            let update = document.querySelector("#update");
            update.value = (`${this.menu.writeSaveBtn.classList[1]}`);

            let $form = $(`#write`).serialize();
            $.ajax({
                url: '/update',
                method:'post',
                data:$form,
                success:(data)=>{
                    this.menu.toastMsg(data); 
                    setTimeout(()=>{
                        this.board.boardLoad();
                        this.menu.writes = document.querySelectorAll(".board-main-write");
                        this.write.closeWrite();
                        this.write.clearWrite();
                    }, 500)
                }
            })
        }
    }
}