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
        if(this.id === 'login') {
            let $form = $(`#login`).serialize();

            $.ajax({
                url: `/login`,
                method:'post',
                data:$form,
                success:(data)=>{
                    this.menu.toastMsg(data);
                    this.menu.closeMenu();
    
                    this.app.$menuIcon.prop("checked", false);
                    
                    setTimeout(() => {
                        this.app.$initForm.load("/ .init-form");
                        this.app.$boardNavPic.load("/ #board-nav-pic");
                    }, 200);
                }
            });
        }
        
        else if(this.id === 'join') {
            let imageForm = $("#join")[0];
            let formData = new FormData(imageForm)
            formData.append("fileobj", $("#Profile-picture")[0].files[0]);
            $.ajax({
                url: `/join`,
                processData: false,
                contentType: false,
                method: 'post',
                data: formData,
                success:(data)=>{
                    this.menu.toastMsg(data);
                }
            })
        }
    }
}