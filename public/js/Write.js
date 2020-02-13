const selection = window.getSelection();

class Write {
    constructor(app, menu) {
        this.app = app;
        this.menu = menu;

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

        this.writeSaveBtn = document.querySelector("#write-save-btn");
        
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

        this.imageViewBtn.addEventListener("click", this.viewImageForm)

        this.imageInput.addEventListener("change", this.ImageCheck)

        this.imageIcon.addEventListener("click", this.uploadImg)

        this.linkViewBtn.addEventListener("click", this.viewLinkForm);

        this.linkBtn.addEventListener("click", this.createLink);

        this.closeIcon.addEventListener("click", this.closeWrite);

        this.writeSaveBtn.addEventListener("click", this.saveWrite);

        
        document.addEventListener('selectionchange', () => {
            let {anchorNode} = document.getSelection();
            if((anchorNode) && ((anchorNode.parentNode === this.writeContent || anchorNode.parentNode.parentNode === this.writeContent) || (anchorNode.parentNode === this.writeTitle || anchorNode.parentNode.parentNode === this.writeTitle))) {
                
                this.nowNode = anchorNode.anchorNode;
                this.nowFocus = anchorNode.anchorOffset;
                
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
        this.viewWrite();
        this.app.$menuIcon.prop("checked", false);
    }

    viewWrite() {
        document.querySelector("#write-area").style.visibility = "visible";
        this.app.$writeArea.clearQueue().animate({'opacity':'1'},'slow');
    }

    closeWrite = () => {
        this.menu.closeMenu();
        this.app.$menuIcon.prop("checked", false);

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

        setTimeout(()=>{
            document.execCommand(`${btn.id}`);
        }, 100)
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

    viewImageForm = () => {
        if(this.imageForm.style.visibility === "visible") 
            this.imageForm.style.visibility = "hidden";
        else 
            this.imageForm.style.visibility = "visible";
    }
 
    ImageCheck = () => {
        let filePath = this.imageInput.value;
        let fileKind = filePath.substr(filePath.length - 3, 3);
        let file = this.imageInput.files.length > 0 ? this.imageInput.files[0] : null;

        if(fileKind !== "jpg" && fileKind !== "gif" && fileKind !== "png")
        {
            alert("jpg, gif, png 확장자를 가진 이미지 파일만 올려주세요.");
            this.imageInput.value = "";
            this.imageInput.select();
            this.imageInput.clear();
            return;
        }
        this.url = URL.createObjectURL(file);
    }

    uploadImg = () => {
        let imageWidth = document.querySelector("#image-width-input").value;
        let imageHeight = document.querySelector("#image-height-input").value;
        
        selection.collapse(this.nowNode, this.nowFocus);

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
        this.app.$writeTitleInput.val(`${this.app.$writeTitle.html()}`) ;
        this.app.$writeContentInput.val(`${this.app.$writeContent.html()}`);
            
        let sandWrite = new SandWrite(this.app, this.menu, this);
    }
}