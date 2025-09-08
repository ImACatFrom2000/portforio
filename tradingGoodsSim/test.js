'use strict';

let purchaseMode = "any";           //購入モード デフォルトはany(任意の個数買う)

let getTarget=0; let getOthers=0;   //お目当てとそれ以外の獲得個数
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
                input.displayPurchase();
            } else {
                input.displayPurchaseUntilGet();
            }
        } else {
            messages.push("未入力の項目があります");
        }
        input.outputMessage();
    })
    function reset(){
        getTarget=0; getOthers=0;
        result=[];
        totalAmount=0;
        messages=[];
    }
    class Input {
        constructor(a,b,c) {
            this.amount=a;
            this.types=b;
            this.count=c;
        }
        outputMessage(){
            for(let item of messages) {
                $('#message').append(`<p>${item}</p>`);
            }
        }
        
    }
});