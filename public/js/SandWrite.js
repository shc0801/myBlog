class SandWrite {
    constructor(app, menu, write) {
        this.app = app;
        this.menu = menu;
        this.write = write;
        
        this.addEvent();
    }

    addEvent() {
        this.writeProcess();
    }

    writeProcess() {
        let form = $(`#write`).serialize();
        $.ajax({
            url: '/write',
            method:'post',
            data:form,
            success:(data)=>{
                console.log(data)
                this.menu.toastMsg(data);
            }
        })
    }
}