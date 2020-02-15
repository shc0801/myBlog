class Board {
    constructor(app, menu) {
        this.app = app;
        this.menu = menu;
        
        this.initWrite = document.querySelector("#init-write");
        this.boardHomeBtn = document.querySelector(".board-logo-text");
        this.navBtn = document.querySelectorAll(".board-nav-viewAll");

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

        this.menu.writes.forEach(write=>{
            write.addEventListener("click", e=>{
                this.loadWrite(write);
            });
        });

        this.navBtn.forEach(btn=>{
            btn.addEventListener("click", ()=>{
                this.closeViewArea();
            })
        })
    }
    
    /**
     * 계시판 열기
    */
    viewBoard() {
        this.app.$board.clearQueue().animate({'top': '0'}, 'slow');
        this.menu.closeMenu();
    }
    
    /**
     * 계시판 닫기
     */
    closeBoard() {
        this.app.$board.clearQueue().animate({'top': '-100%'}, 'slow');
        this.menu.closeMenu();
    }

    /**
     * @param {글 불러오기} num 그 글의 아이디 번호 
     */
    loadWrite(write) {
        let writeForm = $(`#${write.id}`).serialize();
        $.ajax({
            url: '/load',
            method: 'post',
            data:writeForm,
            success: (data)=>{
                this.createViewForm(data);
                this.viewWriteForm();
            }
        })
    }

    createViewForm(data) {
        let writeViewWrite = document.querySelector(".write-view-write");
        this.app.$writeViewWrite.empty();

        let write = document.createElement("div");
        write.id = `write-${data.id}`;
        write.classList.add('write-view');

        let writeData = `<div class="write-view-area-header">
                            <p class="write-view-title">${data.writeData.title}</p>
                            <p class="write-view-name">by ${data.writeData.writer}</p>
                            <p class="write-view-day">${data.writeData.date}</p>
                        </div>
                        <div class="write-view-area-content">
                            ${data.writeData.content}
                        </div>`;
        write.innerHTML = writeData;
        writeViewWrite.appendChild(write);
    }

    viewWriteForm() {
        let writeViewArea = document.querySelector("#write-view-area");

        writeViewArea.style.visibility = 'visible';
        this.app.$writeViewArea.clearQueue().animate({'opacity': '1'});
    }

    closeViewArea() {
        let writeViewArea = document.querySelector("#write-view-area");
        writeViewArea.style.visibility = 'hidden';
        this.app.$writeViewArea.clearQueue().animate({'opacity': '0'});
    }
}