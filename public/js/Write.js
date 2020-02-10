class Write {
    constructor(app, menu) {
        this.app = app;
        this.menu = menu;

        this.writeSelect = document.querySelectorAll(".write-select");
        this.writeHeadTool = document.querySelector("#title-tool");
        this.writeContentTool = document.querySelector("#content-tool");
        this.writeToolBtn = document.querySelectorAll(".tool-btn");
        this.writeArea = document.querySelector("#write-area");

        this.closeIcon = document.querySelector("#write-back-btn");
        this.linkBtn = document.querySelector(".CreateLink");

        // jqurey
        this.$urlLink = $("#url-link");

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

        this.linkBtn.addEventListener("click", this.createLink);

        this.closeIcon.addEventListener("click", this.closeWrite);

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
            btn.style.color = "";

        document.execCommand(`${btn.id}`);
    }

    setFocus(e) {
        if(e.target.classList[0] === 'linkForm' || e.target.parentNode.classList[0] === 'linkForm'|| e.target.classList[2] === 'linkForm-icon') return;
        if(e.target.id === 'url-link') return;
        if(e.clientY < 213 && e.clientY > 122) {
            this.app.$writeTitle.focus();
        } else if(e.clientY > 213) {
            this.app.$writeContent.focus();
        }
    }

    createLink = () => {
        this.app.$writeContent.focus();
        document.execCommand('CreateLink', false, `${this.$urlLink.val()}`);
    }

    hideTool() {
        setInterval(() => {
            if(document.activeElement === this.app.$writeTitle[0])  {
                this.writeHeadTool.style.display = "block";
                this.writeContentTool.style.display = "none";
            } else if(document.activeElement === this.app.$writeContent[0]) {
                this.writeHeadTool.style.display = "none";
                this.writeContentTool.style.display = "block";
            }
        }, 100);
    }
}