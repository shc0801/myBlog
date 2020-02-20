const selection = window.getSelection();

class Write {
    constructor(app, menu, board) {
        this.app = app;
        this.menu = menu;
        this.board = board;

        // dom
        this.writeTitle = document.querySelector(".write-title");
        this.writeContent = document.querySelector(".write-content");
        
        this.writeSelect = document.querySelectorAll(".write-select");
        this.writeHeadTool = document.querySelector("#title-tool");
        this.writeContentTool = document.querySelector("#content-tool");
        this.writeToolBtn = document.querySelectorAll(".tool-btn");
        this.writeArea = document.querySelector("#write-area");

        this.closeIcon = document.querySelector("#write-back-btn");
        this.imageInput = document.querySelector("#image-change-input");
        this.imageIcon = document.querySelector("#image-icon");
        this.imageForm = document.querySelector(".imageForm");
        this.imageViewBtn = document.querySelector(".imageForm-icon");
        this.linkForm = document.querySelector(".linkForm");
        this.linkViewBtn = document.querySelector("#CreateLink");
        this.linkBtn = document.querySelector(".CreateLink");
        
        // jqurey
        this.$urlImage= $("#file-url-link");
        this.$urlLink = $("#link-url-link");

        this.nowFocus;
        this.nowNode;
        
        this.endNode = {
            title: null,
            content: null
        }

        this.addEvent();
    }

    addEvent() {
        this.init();
        
        this.writeToolBtn.forEach(btn=>{
            btn.addEventListener("click", e=>{
                this.toolEvent(btn, e);
            });
        });

        this.writeArea.addEventListener("click", e=>{
            this.setFocus(e);
        });

        this.imageViewBtn.addEventListener("click", ()=>{
            this.viewImageForm();
        })

        this.imageInput.addEventListener("change", ()=>{
            this.menu.ImageCheck(this.imageInput);
            setTimeout(()=>{
                this.url = this.menu.url
            })
            return;
        })

        this.imageIcon.addEventListener("click", this.uploadImg)

        this.linkViewBtn.addEventListener("click", ()=>{
            this.viewLinkForm()
        });

        this.linkBtn.addEventListener("click", this.createLink);

        this.closeIcon.addEventListener("click", this.closeWrite);

        this.menu.writeSaveBtn.addEventListener("click", this.saveWrite);

        
        document.addEventListener('selectionchange', () => {
            let {anchorNode} = document.getSelection();
            // console.log(document.getSelection())
            if((anchorNode) && ((anchorNode.parentNode === this.writeContent || anchorNode.parentNode.parentNode === this.writeContent) || (anchorNode.parentNode === this.writeTitle || anchorNode.parentNode.parentNode === this.writeTitle))) {
                
                this.nowNode = document.getSelection().anchorNode;
                this.nowFocus = document.getSelection().anchorOffset;
                if(anchorNode.parentNode === this.writeTitle || anchorNode.parentNode.parentNode === this.writeTitle) {
                    this.endNode.title = this.writeTitle.childNodes[this.writeTitle.childNodes.length - 1].firstChild;
                    if(this.endNode.title === null) 
                        this.endNode.title = this.nowNode;
                }
                
                else {
                    this.endNode.content = this.writeContent.childNodes[this.writeContent.childNodes.length - 1].firstChild;
                    if(this.endNode.content === null) 
                        this.endNode.content = this.nowNode
                }
            }
        });
    }

    init() {
        this.menu.closeMenu();
        this.menu.viewWrite();
        this.app.$menuIcon.prop("checked", false);

        this.menu.writeSaveBtn.className = 'write';
    }

    closeWrite = () => {
        this.app.$menuIcon.prop("checked", false);
        this.clearWrite();

        this.app.$writeArea.clearQueue().animate({'opacity':'0'},'slow');
        setTimeout(() => {
            document.querySelector("#write-area").style.visibility = "hidden";
        }, 500);
    }

    toolEvent(btn, e) {
        if(document.getSelection().anchorOffset !== document.getSelection().focusOffset)
            return;
        
        if(btn.parentNode.id === 'content-tool') {
            selection.collapse(this.nowNode, this.nowFocus);
        }
        else if(btn.parentNode.id === 'title-tool'){
            selection.collapse(this.nowNode, this.nowFocus);
        }

        document.execCommand(`${btn.id}`);
    }

    setFocus(e) {
        if(e.target.classList[0] === 'linkForm' || e.target.parentNode.classList[0] === 'linkForm'|| e.target.classList[2] === 'linkForm-icon') return;
        if(e.target.id === 'link-url-link' || e.target.id === 'file-url-link') return;
        if(e.target.classList[0] === "write-image") return;

        if(e.clientY < 260 && e.clientY > 137) {
            this.app.$writeTitle.focus();
        } else if(e.clientY > 260) {
            this.app.$writeContent.focus();
        }

        if(document.activeElement === this.writeTitle)  {
            this.writeHeadTool.style.display = "block";
            this.writeContentTool.style.display = "none";

            this.focus(this.writeTitle, e)
        } else if(document.activeElement === this.writeContent) {
            this.writeHeadTool.style.display = "none";
            this.writeContentTool.style.display = "block";

            this.focus(this.writeContent, e)
        }
    }

    viewImageForm() {
        if(this.imageForm.style.visibility === "visible") 
            this.imageForm.style.visibility = "hidden";
        else 
            this.imageForm.style.visibility = "visible";
    }

    uploadImg() {
        let imageWidth = document.querySelector("#image-width-input").value;
        let imageHeight = document.querySelector("#image-height-input").value;
        
        selection.collapse(this.nowNode, this.nowFocus);

        console.log(this.url)
        let html = `<img src=${this.url} width="${imageWidth}" height="${imageHeight}">`;
        document.execCommand("insertHTML", false, html)
    }

    viewLinkForm = () => {
        if(this.linkForm.style.visibility === "visible") 
            this.linkForm.style.visibility = "hidden";
        else 
            this.linkForm.style.visibility = "visible";
    }

    createLink = () => {
        selection.collapse(this.nowNode, this.nowFocus);
        document.execCommand('CreateLink', false, `${this.$urlLink.val()}`);
    }

    focus(nowFocus, e) {
        if(e.target.classList[0] === 'write-title' || e.target.classList[0] === 'write-content') return;
        if(e.target.parentNode.classList[0] === 'write-title' || e.target.parentNode.classList[0] === 'write-content') return;
        
        if(nowFocus === this.writeTitle && this.endNode.title !== null) {
            selection.collapse(this.endNode.title, this.endNode.title.length);
        }

        else if(nowFocus === this.writeContent && this.endNode.content !== null) {
            selection.collapse(this.endNode.content, this.endNode.content.length);
        }
    } 

    saveWrite = () => {
        if(this.app.$writeTitle.text() === '') {
            this.menu.toastMsg("제목을 입력해주세요");
            return;
        } else if(this.app.$writeContent.text() === '') {
            this.menu.toastMsg("본문을 입력해주세요");
            return;
        }

        let year = new Date().getFullYear();
        let month = new Date().getMonth() + 1;
        let day = new Date().getDate();
        
        this.app.$writeTitleInput.val(`${this.app.$writeTitle.html()}`) ;
        this.app.$writeContentInput.val(`${this.app.$writeContent.html()}`);
        this.app.$writeDateInput.val(`${year}-${month}-${day}`);

        let sandWrite = new SandWrite(this.app, this.menu, this.board, this);
    }

    
    clearWrite() {
        this.viewImageForm();
        this.viewLinkForm();

        this.app.$writeTitle.text('')
        this.app.$writeContent.text('')

        this.app.$writeTitleInput.val('');
        this.app.$writeContentInput.val('');
        this.app.$writeDateInput.val('');

        return;
    }
}