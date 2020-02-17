class SandComment {
    constructor(app, menu, board) {
        this.app = app;
        this.menu = menu;
        this.board = board;

        this.init();
    }

    init() {
        this.sandComment();
    }

    sandComment() {
        let $comment = $("#comment-form").serialize();
        $.ajax({
            url: '/comment',
            method: 'post',
            data: $comment,
            success: (data)=>{
                this.menu.toastMsg(data);
                
                document.querySelector("#comment").value='';
            }
        })
    }
}