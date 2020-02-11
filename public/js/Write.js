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
        this.imageBtn = document.querySelector("#image-btn");
        this.imageIcon = document.querySelector("#image-icon");
        this.imageInput = document.querySelector("#file-url-link");
        this.linkForm = document.querySelector(".linkForm");
        this.linkViewBtn = document.querySelector("#CreateLink");
        this.linkBtn = document.querySelector(".CreateLink");

        this.writeSaveBtn = document.querySelector("#write-save-btn");

        // jqurey
        this.$urlImage= $("#file-url-link");
        this.$urlLink = $("#link-url-link");

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

        this.imageIcon.addEventListener("click", this.uploadImage)

        this.linkViewBtn.addEventListener("click", this.viewLinkForm);

        this.linkBtn.addEventListener("click", this.createLink);

        this.closeIcon.addEventListener("click", this.closeWrite);

        this.writeSaveBtn.addEventListener("click", this.saveWrite);

        this.hideTool();
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
        if(btn.parentNode.id === 'content-tool') 
            this.app.$writeContent.focus();
        else if(btn.parentNode.id === 'title-tool')
            this.app.$writeTitle.focus();

        if(btn.style.color === '') 
            btn.style.color = "rgb(252, 34, 70)";
        else 
            btn.style.color = '';

        document.execCommand(`${btn.id}`);
    }

    setFocus(e) {
        if(e.target.classList[0] === 'linkForm' || e.target.parentNode.classList[0] === 'linkForm'|| e.target.classList[2] === 'linkForm-icon') return;
        if(e.target.id === 'link-url-link' || e.target.id === 'file-url-link') return;
        if(e.clientY < 213 && e.clientY > 122) {
            this.app.$writeTitle.focus();
        } else if(e.clientY > 213) {
            this.app.$writeContent.focus();
        }
    }

    uploadImage = () => {
        let filePath = this.imageInput.value;
        let fileKind = filePath.substr(filePath.length - 3, 3);
        if(fileKind !== "jpg" && fileKind !== "gif" && fileKind !== "png")
        {
            alert("jpg, gif, png 확장자를 가진 이미지 파일만 올려주세요.");
            this.imageInput.value = "";
            this.imageInput.select();
            this.imageInput.clear();
            return;
        }

        this.app.$writeContent.focus();
        document.execCommand('insertImage', false, `${this.$urlImage.val()}`);
    }

    viewLinkForm = () => {
        if(this.linkViewBtn.style.color === '') 
            this.linkForm.style.visibility = "hidden";
        else 
            this.linkForm.style.visibility = "visible";
    }

    createLink = () => {
        this.app.$writeContent.focus();
        document.execCommand('CreateLink', false, `${this.$urlLink.val()}`);
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

    hideTool() {
        setInterval(() => {
            if(document.activeElement === this.writeTitle)  {
                this.writeHeadTool.style.display = "block";
                this.writeContentTool.style.display = "none";
            } else if(document.activeElement === this.writeContent) {
                this.writeHeadTool.style.display = "none";
                this.writeContentTool.style.display = "block";
            }
        }, 100);
    }
}