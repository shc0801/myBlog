class Board {
    constructor(app, menu) {
        this.app = app;
        this.menu = menu;
        
        this.initWrite = document.querySelector("#init-write");
        this.boardHomeBtn = document.querySelector(".board-logo-text");
        this.navBtn = document.querySelectorAll(".board-nav-viewAll");
        this.commentSaveBtn = document.querySelector("#comment-save-btn");

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
                if(e.target.classList[0] !== 'main-write-title') return;
                this.loadWrite(write);
                setTimeout(()=>{
                    this.loadComment();
                }, 100)
            });
        });

        this.navBtn.forEach(btn=>{
            btn.addEventListener("click", ()=>{
                this.closeViewArea();
            })
        })

        this.commentSaveBtn.addEventListener("click", (e)=>{
            if($("#comment").val() === '') {
                this.menu.toastMsg("입력칸이 공백이여서는 안됩니다");
                return;
            }
            let sandComment =  new SandComment(this.app, this.menu, this);
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
            url: '/writeLoad',
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
        write.id = `write-${data.writeData.id}`;
        write.classList.add('write-view');
        write.classList.add(`${data.id}`); 

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

        this.app.$commentWriteId.val(`${data.writeData.id}`);
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

    loadComment() {
        let comment = $("#comment-form").serialize();
        $.ajax({
            url: '/commentLoad',
            method: 'post',
            data: comment,
            success: (data)=>{
                console.log(data);
                this.createCommentForm(data);
            }
        })
    }

    createCommentForm(data) {
        let commentArea = document.querySelector("#comment-area");
        this.app.$commentArea.empty();
        
        let commentNum = document.createElement("div");
        commentNum.id = "comment-Num";
        commentNum.innerHTML = `댓글 ${data.commentData.length}개`;
        commentArea.prepend(commentNum);
        
        data.commentData.forEach(data=>{

            let comment = document.createElement("div");
            comment.id = `comment-${data.id}`;
            comment.classList.add('comment-area');
            comment.classList.add(`${data.id}`); 

            let commentData = `
                               <img id="comment-user-profilePic" src="../upload/${data.image}" alt="">
                               <div class="comment-user-name">${data.user_id}</div>
                               <div class="comment-user-date">2020-02-15 01:41</div>
                               <div class="comment-user-content">${data.comment}</div>`;
            comment.innerHTML = commentData; 

            commentArea.appendChild(comment);
        })   
    }
}