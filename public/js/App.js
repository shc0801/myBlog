class App { 
    constructor() {
        this.searchInput = document.querySelector(".search");
        this.productArea = document.querySelector(".product-area");
        this.basket = document.querySelector(".basket");
        this.total = document.querySelector(".total");
        this.dropzone = document.querySelector(".drop");
        this.userFormBtn = document.querySelector("#user-form-btn");

        this.basketList = new Array;
        this.searchList = new Array;

        this.cho = ["ㄱ", "ㄲ", "ㄴ", "ㄷ", "ㄸ", "ㄹ", "ㅁ", "ㅂ", "ㅃ", "ㅅ", "ㅆ", "ㅇ", "ㅈ", "ㅉ", "ㅊ", "ㅋ", "ㅌ", "ㅍ", "ㅎ"];

        fetch("./js/store.json")
        .then(res => res.json())
        .then(data => this.init(data));
    }

    init(data) {
        this.data = data;
        this.data.forEach(item => {
            item.priceNum = parseInt(item.price.replace(/,/, '')); 
            item.cho_product_name = this.getChosung(item.product_name)
            item.cho_brand = this.getChosung(item.brand); 
        }); 
        console.log(this.data)
        this.data.forEach(item => this.addItem(item));

        this.addEvent();
    }

    getChosung(str){
        let result = "";

        for(let i = 0; i < str.length; i++){
            let tmp = str[i].charCodeAt() - 0xAC00; 
            let jong = tmp % 28;
            let jung =  (( tmp - jong) / 28)  % 21; 
            let cho = ((( tmp - jong ) / 28) - jung) / 21; 
            result += this.cho[cho];
        }
        return result;
    }
    
    addItem(item) {
        let html = document.createElement("div");
        html.innerHTML = `<div class="product pb-3" data-idx="${item.id}">
                            <div class="product-img pb-5">
                                <img src="./images/B/상품사진/${item.photo}" alt="">
                            </div>
                            <p class="pt-2"><span class="price pl-4">${item.price}</span>원 <span class="sale float-right pt-2 pr-4">68%</span></p> 
             
                            <p class="product-name pl-4">${item.product_name} </br> ${item.brand}</p>
                          </div>`;

        html.querySelector("img").addEventListener("dragstart", this.dragstart);
        this.productArea.appendChild(html);
    }

    addEvent() {
        this.dropzone.addEventListener("drop", this.drop);
        this.dropzone.addEventListener("dragover", this.dropover);
        this.searchInput.addEventListener('input', this.search);
        this.userFormBtn.addEventListener("click", this.buy);
    }

    dragstart = e => { 
        let idx = e.target.parentElement.parentElement.dataset.idx;
        e.dataTransfer.setData("idx", idx);
    }

    drop = e => {
        e.preventDefault();

        let idx = e.dataTransfer.getData("idx")
        this.addBasket(idx);
    }
    
    dropover = e => {
        e.preventDefault();
    }

    // 기능

    search = e => {
        let keyword = e.target.value;
        this.searchList = new Array;
        
        if(keyword.trim() == "") {
            this.searchList = this.data
        } else {
            if(this.cho.includes(keyword[0])) {
                this.data.forEach(data=>{
                    let { id, photo, product_name, cho_product_name, brand, cho_brand, price } = data;
                    let flag = false;

                    if(cho_product_name.includes(keyword)) {
                        let idx = cho_product_name.indexOf(keyword);
                        product_name = `${product_name.substring(0, idx)}<mark>${product_name.substring(idx, idx + keyword.length)}</mark>${product_name.substring(idx + keyword.length, product_name.length)}`;
                        flag = true;
                    } 

                    if(cho_brand.includes(keyword)) {
                        let idx = cho_brand.indexOf(keyword);
                        brand = `${brand.substring(0, idx)}<mark>${brand.substring(idx, idx + keyword.length)}</mark>${brand.substring(idx + keyword.length, brand.length)}`;
                        flag = true;
                    }

                    if(flag) {
                        this.searchList.push({id, photo, product_name, brand, price});
                    }
                })
            } else {
                this.data.forEach(data=>{
                    let { id, photo, product_name, brand, price } = data;        
                    let flag = false;
                    if( product_name.includes(keyword) ) {
                        let idx = product_name.indexOf(keyword);
                        product_name = `${product_name.substring(0, idx)}<mark>${product_name.substring(idx, idx + keyword.length)}</mark>${product_name.substring(idx + keyword.length, product_name.length)}`;
                        flag = true;
                    }
                    if( brand.includes(keyword) ) {
                        let idx = brand.indexOf(keyword);
                        brand = `${brand.substring(0, idx)}<mark>${brand.substring(idx, idx + keyword.length)}</mark>${brand.substring(idx + keyword.length, brand.length)}`;
                        flag = true;
                    }
    
                    if(flag){
                        console.log(product_name, brand)
                        this.searchList.push({id, photo, product_name, brand, price});
                    }
                })
            }
        }

        this.productArea.innerHTML = "";
        this.searchList.forEach(item => this.addItem(item));
    }

    addBasket(idx) {
        if(this.basketList.indexOf(idx) != -1) {
            alert("이미 장바구니에 등록된 상품입니다!"); 
            return;
        }
        if(idx != undefined)
            this.basketList.push(idx);

        this.basket.innerHTML = "";

        this.basketList.forEach(list=>{
            let html = document.createElement("div");
            html.innerHTML =   `<div class="basket-body pt-4 pl-4 d-flex" data-idx="${this.data[list - 1].id}">
                                    <div class="basket-body-left">
                                        <img class="basket-image pl-4" src="./images/B/상품사진/${this.data[list - 1].photo}" alt="">
                                    </div>
                                    <div class="basket-body-center w-60 pl-4 d-flex">
                                        <p class="w-30">${this.data[list - 1].product_name}</p>
                                        <div class="volume">
                                            <i class="fa fa-minus ${this.data[list - 1].id}"></i>
                                            <input class="input-${this.data[list - 1].id} input-price" type="text" value="1">
                                            <i class="fa fa-plus ${this.data[list - 1].id}"></i>
                                        </div>
                                    </div>
                                    <div class="basket-body-right w-20 pl-5 float-right">
                                        <p class="float-left pl-4">${this.data[list - 1].price}원</p>
                                    </div>
                                    <i class="fa fa-times pl-3 pt-4"></i>
                                </div>`;
            this.basket.appendChild(html);
        })
        this.addTotal();
        this.btn = document.querySelectorAll("i");
        this.btn.forEach(btn=>{
            btn.addEventListener("click", e=>{
                this.btnEvent(e);
            })
        })
        
        this.inputPrice = document.querySelector(".input-price");
        this.inputPrice.addEventListener('input', ()=>{
            this.addTotal();
        });
    }

    addTotal() {
        let commodityTotal = 0;

        this.total.innerHTML = "";

        this.basketList.forEach(list=>{
            let value = document.querySelector(`.input-${this.data[list - 1].id}`).value;
            commodityTotal += (this.data[list - 1].priceNum * value);
        })

        let html = document.createElement("div");
        html.innerHTML =   `<p>총상품금액 <span>${commodityTotal}</span>원</p>
                            <span class="icon"> + </span>
                            <p>배송비 <span>0</span>원</p>
                            <span class="icon"> = </span>
                            <p>총주문금액 <span>${commodityTotal}</span>원</p>`;
        this.total.appendChild(html);
    }

    btnEvent(e) {
        if(e.target.classList[1] == 'fa-times') {
            let idx = e.target.parentElement.dataset.idx;
            this.basketList.splice(this.basketList.indexOf(idx), 1);
            this.addBasket();
            this.addTotal();
        } else if(e.target.classList[1] == 'fa-minus') {
            let value = document.querySelector(`.input-${e.target.classList[2]}`).value -= 1;
            if( value < 1 ) {
                alert("수량은 1개 이상이여야 합니다!");
                document.querySelector(".fa-minus + input").value = 1;
            }
            this.addTotal();
        } else if(e.target.classList[1] == 'fa-plus') {
            let value = Number(document.querySelector(`.input-${e.target.classList[2]}`).value)
            document.querySelector(`.input-${e.target.classList[2]}`).value = value + 1;
            this.addTotal();
        }
    }

    buy = e => {
        let name = document.querySelector("#address").value;
        let address = document.querySelector("#name").value;

        if(name.trim() == '') {
            alert("이름을 입력하세요!");
            return;
        }

        if(address.trim() == '') {
            alert("주소를 입력하세요!");
            return;
        }
        $('#user-form').modal('hide');
        $('#result').modal('show');

        const canvas = document.querySelector("#modal-canvas");
        const ctx = canvas.getContext("2d");
        let fontSize = 25;
        ctx.fontSize = fontSize + "px";
        
        let length = "";
        let list = new Array;

        this.basketList.forEach(item=>{
            let name, price, cnt, sum; 
            name = this.data[item - 1].product_name;
            price = this.data[item - 1].priceNum;
            cnt = Number(document.querySelector(`.input-${item}`).value);
            sum = price * cnt;
            if(length.length < name.length)
                length = name;

            list.push({name, price, cnt, sum});
        })

        let maxText = ctx.measureText(length); 
        let width = maxText.width;
        
        canvas.height = fontSize * (list.length + 5); 
        canvas.width = width + 200; 
        
        ctx.clearRect(0,0, canvas.width, canvas.height); 
        
        let offset = 10;
        let totalSum = 0;
        list.forEach((item, i)=>{
            ctx.fillText(item.name, offset, (i+1) * fontSize + offset*i );  
            let remainText = `${item.price},  ${item.cnt},  ${item.sum}`;
            ctx.fillText(remainText, 2*offset + width, (i+1) * fontSize + offset*i );

            totalSum += item.sum;
        })
        let nowDate = new Date();
        let lastString = `총합계 : ${totalSum}, 구매일시 : ${nowDate.getFullYear()}-${nowDate.getMonth()}-${nowDate.getDate()} ${nowDate.toLocaleTimeString().substring(3)}`;
        ctx.fillText(lastString, offset, (list.length + 1) * fontSize + offset * list.length );

        this.basketList = new Array;
        this.addBasket();
        this.addTotal();
    }
}

window.addEventListener("load", ()=>{
    let app = new App();
}) 