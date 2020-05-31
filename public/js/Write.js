class Write { 
    constructor() {        
        this.writeBtn = document.querySelector("#write-form-btn");
        this.ratingBtn = document.querySelector("#rating-form-btn");
        this.reviewBtn = document.querySelector("#review-form-btn");

        this.init();
    }

    init() {
        this.addEvent();
    }
    addEvent() {
        this.writeBtn.addEventListener("click", this.write);
        this.ratingBtn.addEventListener("click", this.rating);
        this.reviewBtn.addEventListener("click", this.review);
    }

    write = e => {
        if(document.write.content.value == '') {
            alert("내용를 입력해주세요"); 
            return;
        } else if(document.write.before.value == '') {
            alert("before사진을 선택해주세요"); 
            return;
        } else if(document.write.after.value == '') {
            alert("after사진을 선택해주세요"); 
            return;
        }

        let form = new FormData($(`#write`)[0]);
        $.ajax({
            url: `/write`,
            method:'post',
            data:form,
            contentType:false,
            processData:false,
            success:(data)=>{
                $('#write').modal('hide');
                alert("글이 등록되었습니다");
                location.href='/party';
            }
        })
    }

    rating = e => {
        document.querySelector("#w_id").value = document.querySelector("#u_id").value;
        let form = $(`#rating`).serialize();
        $.ajax({
            url: `/rating`,
            method:'post',
            data:form,
            success:(data)=>{
                $('#rating').modal('hide');
                alert("평점이 등록되었습니다");
                location.href='/party';
            }
        })
    }

    review = e => {
        console.log(document.review.specialist_id);
        document.querySelector("#specialist_id").value = document.review.specialist_id.value;
        let form = $("#review-form").serialize();
        $.ajax({
            url: `/review`,
            method: `post`,
            data: form,
            success:(data)=>{
                console.log(data);
                
                // $('#review-form').modal('hide');
                // alert("글이 등록되었습니다");
                // location.href='/specialist';
            }
        })
    }
}

window.addEventListener("load", ()=>{
    let app = new Write();
}) 