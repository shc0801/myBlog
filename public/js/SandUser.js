class SandUser {
    constructor(app, menu, form, id) {
        this.app = app;
        this.menu = menu;
        this.form = form;
        this.id = id;

        this.addEvent();
    }

    addEvent() {
        if(this.id === 'login' || this.id === 'join') {
            this.userProcess();
        }
    }

    userProcess() {
        let $form = $(`#${this.id}`).serialize();
        $.ajax({
            url: `/${this.id}`,
            method:'post',
            data:$form,
            success:(data)=>{
                this.menu.toastMsg(data);
                this.menu.closeMenu();

                this.app.$menuIcon.prop("checked", false);
                
                if(this.id === 'login') {
                    setTimeout(() => {
                        this.app.$initForm.load("/ .init-form");
                    }, 200);
                }
            }
        })
    }
}