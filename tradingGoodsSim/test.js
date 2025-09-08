'use strict';

let purchaseMode = "any";           //購入モード デフォルトはany(任意の個数買う)

let getTarget=0;                    //推しの獲得個数
let result=[];                      //結果（配列、T/F）
let totalAmount=0;                  //かかった金額

let messages=[];

$(document).ready(function(){

    $('form input[name="purchase"]').on('click', function(){
        if($(this).attr('value') === "purchaseAny") {
            purchaseMode = "any";
            $('form .count').attr('style', 'opacity: 1.0');
        } else if($(this).attr('value') === "purchaseUntilGet") {
            purchaseMode = "untilGet";
            $('form .count').attr('style', 'opacity: 0');
        } else {
            console.log("エラー: purchaseModeの切り替え");
        }
    })
    $('form button').on('click', function(event){
        event.preventDefault();
        reset();

        const inputAmont = $('form .amount input').val();
        const inputTypes = $('form .types input').val();
        const inputCount = $('form .count input').val();
        
        const input = new Input(inputAmont, inputTypes, inputCount);
        if(input.checkData()) {
            input.changeSTR_NUM();
            if(purchaseMode==="any") {
                input.purchase();
            } else {
                input.purchaseUntilGet();
            }
        } else {
            messages.push("未入力の項目があります");
        }
        input.displayResult();
    })

    function reset(){
        getTarget=0;
        result=[];
        totalAmount=0;
        messages=[];
        $('#message p').remove();
        $('#result li').remove();
    }

    class Input {
        constructor(a,b,c) {
            this.amount=a;
            this.types=b;
            this.count=c;
        }
        checkData(){
            let noInput=0;
            for(let p in this) {
                if(!(purchaseMode==="untilGet" && p==="count")) {
                    if(this[p].length===0) {
                        $(`form input[name="${p}"]`).addClass('noInput');
                        noInput++;
                    } else {
                        $(`form input[name="${p}"]`).removeClass('noInput');
                    }
                }
            }
            if(noInput>0) {
                return false;
            } else {
                return true;
            }
        }
        changeSTR_NUM(){
            for(let p in this) {
                this[p] = Number(this[p]);
            }
        }
        roll(){
            const num = Math.floor(Math.random()*this.types)+1;
            if(num===1) {
                getTarget++;
                result.push(true);
            } else {
                result.push(false);
            }
            totalAmount+=this.amount;
        }
        purchase() {
            for(let i=0; i<this.count; i++) {
                this.roll();
            }
            messages.push(`${this.count}個購入中、あなたの推しは...${getTarget}個でした`);
            messages.push(`1個${this.amount}円 × ${result.length}個 = ${totalAmount}円`);
            messages.push(`全${this.types}種の商品を${result.length}個購入であなたの推しが出る確率は...約${Math.floor((1-((this.types-1)/this.types)**result.length)*100)}%`);
        }
        purchaseUntilGet(){
            while(getTarget===0) {
                this.roll();
            }
            messages.push(`${result.length}個目で出ました`);
            messages.push(`1個${this.amount}円 × ${result.length}個 = ${totalAmount}円`);
            messages.push(`全${this.types}種の商品を${result.length}個購入であなたの推しが出る確率は...約${Math.floor((1-((this.types-1)/this.types)**result.length)*100)}%`);

        }
        displayResult(){
            let repeat = 0;
            const intervalId = setInterval(() => {
                    $('#result').append(`<li class="${result[repeat]}"></li>`);
                    repeat++;
                    const element = document.getElementById('result');
                    element.scrollTop = element.scrollHeight;
                if(repeat===result.length) {
                    clearInterval(intervalId);
                }
            }, 300);
            if(result.length!==0) {
                setTimeout(this.displayMessage, 300*result.length+1000);
            } else {
                this.displayMessage();
            }
        }
        displayMessage(){
            for(let item of messages) {
                $('#message').append(`<p>${item}</p>`);
            }
        }
        
    }
});