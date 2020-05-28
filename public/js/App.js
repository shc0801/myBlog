class App { 
    constructor() {
        this.$modalBackdrop = $(".modal-backdrop");

        this.$modalBackdrop.on("click", ()=>{
            $("#login").modal("hide");
            $("#join").modal("hide");
            alert("Asd")
        })

        $('#exampleModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) 
            var recipient = button.data('whatever') 
            var modal = $(this)
            modal.find('.modal-title').text('New message to ' + recipient)
            modal.find('.modal-body input').val(recipient)
        })
    }
}

window.addEventListener("load", ()=>{
    let app = new App();
}) 
// tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"