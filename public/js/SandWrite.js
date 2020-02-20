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
                    console.log(data)
                    this.menu.toastMsg(data); 
                    setTimeout(()=>{
                        this.boardLoad();
                        this.menu.writes = document.querySelectorAll(".board-main-write");
                        this.write.closeWrite();
                        this.write.clearWrite();
                    }, 500)
                }
            })
        } 
        
        else if(this.menu.writeSaveBtn.classList[0] === 'update') {
            let update_delete = document.querySelector("#update-delete");
            console.log(update_delete)
            update_delete.value = (`${this.menu.writeSaveBtn.classList[1]}`);

            let $form = $(`#write`).serialize();
            $.ajax({
                url: '/update',
                method:'post',
                data:$form,
                success:(data)=>{
                    console.log(data)
                    this.menu.toastMsg(data); 
                    setTimeout(()=>{
                        this.boardLoad();
                        this.menu.writes = document.querySelectorAll(".board-main-write");
                        this.write.closeWrite();
                        this.write.clearWrite();
                    }, 500)
                }
            })
        } 
        
        else if(this.menu.writeSaveBtn.classList[0] === 'delete') {
            let update_delete = document.querySelector("#update-delete");
            update_delete.value = `${this.menu.writeSaveBtn.classList[1]}`;

            let $form = $(`#write`).serialize();
            $.ajax({
                url: '/delete',
                method:'post',
                data:$form,
                success:(data)=>{
                    console.log(data)
                    this.menu.toastMsg(data); 
                    setTimeout(()=>{
                        this.boardLoad();
                        this.menu.writes = document.querySelectorAll(".board-main-write");
                        this.write.closeWrite();
                        this.write.clearWrite();
                    }, 500)
                }
            })
        }
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
            }
        })
    }
}