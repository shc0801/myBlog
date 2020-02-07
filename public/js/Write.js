class Write {
    constructor(app) {
        this.app = app;

        this.writeTitle = document.querySelector(".write-title");
        this.writeContent = document.querySelector(".write-content");
        this.writeHeadTool = document.querySelector("#title-tool");
        this.writeContentTool = document.querySelector("#content-tool");
        this.writeToolBtn = document.querySelectorAll(".tool-btn");
        this.writeArea = document.querySelector("#write-area");

        this.addEvent();
    }

    addEvent() {
        this.writeToolBtn.forEach(btn=>{
            btn.addEventListener("click", e=>{
                this.toolEvent(btn, e);
            });
        });

        this.writeArea.addEventListener("click", e=>{
            this.setFocus(e);
        });

        this.hideTool();
    }

    toolEvent(btn, e) {
        console.log(btn.parentNode)
        if(btn.parentNode.id === 'content-tool') 
            this.writeContent.focus();
        else
            this.writeTitle.focus();

        if(btn.style.color === '') 
            btn.style.color = "rgb(252, 34, 70)";
        else 
            btn.style.color = "";

        document.execCommand(`${btn.id}`);

        // console.log(window.getSelection().getRangeAt(0))

        // var EdRange = Editor.document.body.createTextRange();
        // EdRange.execCommand('CreateLink');

        // if (EdRange.parentElement().tagName=='A') {
        // var href = EdRange.parentElement().href;
        //     var data = EdRange.text;
        //     EdRange.execCommand('UnLink');
        //     EdRange.pasteHTML(''+data+'');
        // }
    }

    setFocus(e) {
        if(e.clientY < 213 && e.clientY > 122) {
            this.writeTitle.focus();
        } else if(e.clientY > 213) {
            this.writeContent.focus();
        }
    }

    hideTool() {
        setInterval(() => {
            if(document.activeElement === this.writeTitle)  {
                this.writeHeadTool.style.display = "block";
                this.writeContentTool.style.display = "none";
            } else {
                this.writeHeadTool.style.display = "none";
                this.writeContentTool.style.display = "block";
            }
        }, 100);
    }
}