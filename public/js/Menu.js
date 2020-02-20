class Menu {
    constructor(app) {
        //변수선언
        this.app = app;

        this.initForm = document.querySelectorAll(".init-form > a");
        this.initBoard = document.querySelector("#init-board");
        this.main = document.querySelectorAll(".main");
        
        this.writeSaveBtn = document.querySelector("#write-save-btn");
        
        this.addEvent();
    }

    addEvent() {
        this.app.$menu.addEventListener("click", this.menu)
        
        this.initBoard.addEventListener("click", ()=>{
            $.ajax({
                url: '/board',
                method: 'post',
                success: (data)=>{
                    if(data === '로그인 후 가능한 기능입니다') {
                        this.toastMsg(data);
                        return;
                    }
                    this.createWriteView(data.list);

                    this.app.menuColor = "black";
                    this.changeMenuColor();

                    this.app.$menuIcon.prop("che cked", false);
                    this.app.$boardNavUser.load("/ .board-nav-user");

                    setTimeout(()=>{
                        console.log(this);
                        let board = new Board(this.app, this);
                    }, 100)
                }
            })
        })

        // viewForm
        setInterval(() => {
            this.initForm = document.querySelectorAll(".init-form > a");
            this.initForm.forEach(btn=>{
                btn.addEventListener("click", e=>{
                    let form = new Form(this.app, this, e);
                })
            });
        }, 1000);

    }
    
    menu = () => {
        let menuBar = document.querySelectorAll(".hamburger > label > span");
        this.menuIcon = document.querySelector("#menuicon");

        if(!this.menuIcon.checked){
            this.viewMenu();
            menuBar.forEach(bar=>{
                bar.style.backgroundColor = 'white';
            })
        } else {
            this.closeMenu();
            menuBar.forEach(bar=>{
                bar.style.backgroundColor = this.app.menuColor;
            })
        }
    }

    viewMenu() {
        // 화면전환
        this.app.$topDarkWrap.clearQueue().animate({
            'bottom':'0%',
            'opacity':'1'
        },'slow');
        // 
    }

    closeMenu() {
        // 화면전환
        this.app.$topDarkWrap.clearQueue().animate({
            'bottom' : '100%',
            'opacity':'0'
        },'slow');
        
        this.app.$login.clearQueue().animate({'opacity':'0'},'slow');
        this.app.$join.clearQueue().animate({'opacity':'0'},'slow');

        let leftDarkWrap = document.querySelector(".left-dark-wrap")
        let topDarkWrap = document.querySelector(".top-dark-wrap")
        setTimeout(() => {
            leftDarkWrap.style.visibility = 'visible';
            this.main.forEach(text=>{
                text.style.visibility = 'visible';
            });
            topDarkWrap.style.left = '45%';
            this.app.$leftDarkWrap.clearQueue().animate({'opacity':'0.4'},'slow');
            this.app.$main.clearQueue().animate({'opacity':'1'},'slow');
        }, 500);
        // 
    }

    //토스트 메시지
    
    toastMsg(msg){
        let toast = document.createElement("div");
        toast.id = 'toast';
        toast.style.zIndex = "200";
        toast.innerText = msg;

        if(document.querySelector("#toast") === null) 
            document.querySelector("body").appendChild(toast);
        else {
            toast.remove();
        }

        let $toast = $("#toast");
        $toast.clearQueue().animate({'opacity':'0.5'},'300');
        $toast.clearQueue().animate({'top':'85%'},'300');
        setTimeout(()=>{
            $toast.clearQueue().animate({'opacity':'0'},'300');
            $toast.clearQueue().animate({'top':'100%'},'300');
            setTimeout(() => {
                $toast.remove();
            }, 300);
        }, 2000)
    }

    ImageCheck(imageInput) {
        let filePath = imageInput.value;
        let fileKind = filePath.substr(filePath.length - 3, 3);
        let file = imageInput.files.length > 0 ? imageInput.files[0] : null;

        if(fileKind !== "jpg" && fileKind !== "gif" && fileKind !== "png")
        {
            alert("jpg, gif, png 확장자를 가진 이미지 파일만 올려주세요.");
            imageInput.value = "";
            imageInput.select();
            return;
        }
        this.url = URL.createObjectURL(file);
    }

    createWriteView(dataList) {
        let mainWriteView = document.querySelector("#board-main-write-view");
        this.app.$MainWriteView.empty();
        dataList.forEach((item)=>{
            $.ajax({
                url: '/commentLoad',
                method: 'post',
                data: item,
                success: (num)=>{
                    this.commentNum = num.commentData.length;
                    if(this.commentNum === undefined) this.commentNum = 0;

                    let boardMainWrite = document.createElement("form");
                    boardMainWrite.id = `write-view-${item.id}`;
                    boardMainWrite.classList.add("board-main-write"); 
                    boardMainWrite.classList.add(`${item.id}`); 
        
                    let write = `
                                <input type="hidden" name="write" class="write-select-input-${item.id}">
                                <input type="hidden" name="delete" class="write-delete-input-${item.id}">
                                <p class="main-write-title">${item.title}</p>
                                <p class="main-write-modifi">수정</p>
                                <p class="main-write-delete">삭제</p>
                                <p class="main-write-name">${item.writer}</p>
                                <p class="main-write-comments">${this.commentNum}</p>
                                <p class="main-write-day">${item.date}</p>`;
        
                    boardMainWrite.innerHTML = write;
                    mainWriteView.appendChild(boardMainWrite);
        
                    $(`.write-select-input-${item.id}`).val(`${item.id}`);
                    $(`.write-delete-input-${item.id}`).val(`${item.id}`);
                    
                    this.writes = document.querySelectorAll(".board-main-write");
                }
            })
        })

        return;
    }

    changeMenuColor() {
        let menuBar = document.querySelectorAll(".hamburger > label > span");
                            
        menuBar.forEach(bar=>{
            bar.style.backgroundColor = this.app.menuColor;
        })
    }

    viewWrite() {
        document.querySelector("#write-area").style.visibility = "visible";
        this.app.$writeArea.clearQueue().animate({'opacity':'1'},'slow');
    }

    /**
     * 계시판 닫기
     */
    closeBoard() {
        this.app.$board.clearQueue().animate({'top': '-100%'}, 'slow');
        this.closeMenu();
        this.app.menuColor = 'white';
    }
}