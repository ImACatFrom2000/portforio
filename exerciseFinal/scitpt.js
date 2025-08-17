'use strict';

//メインビジュアルの遷移

let mvNum = 1;                  //開始時のメインビジュアル番号
let copy3;                      //各mvに応じたコピー
const fadeInterval = 5000;      //フェードのインターバルのms
const fadeTime = 500;           //フェードイン、フェードアウトのms

$(document).ready(function(){
    fade();
    setInterval(fade, fadeInterval);
})

function fade(){        //4000msはfadeさせない。
    setTimeout(fadeOut, fadeInterval - fadeTime);
}
function fadeOut(){     //500ms  
    $('.mv').addClass('fadeOut');
    setTimeout(fadeIn, fadeTime)
}

function fadeIn(){      //500ms
    $('.mv').removeClass('fadeOut');
    switch(mvNum) {
        case 1:
            mvNum++;
            copy3 = '絶品郷土料理';
            break;
        case 2:
            mvNum++;
            copy3 = '異国のような宿';
            break;
        case 3:
            mvNum = 1;
            copy3 = '広がる青の世界';
            break;
    }
    $('.mv').attr('style', `background-image: url(images/mv${mvNum}.png), url(images/mv${mvNum}.png)`);
    $('.mv .copy3').text(copy3);
    $('.mv').addClass('fadeIn');
    setTimeout(() => {
        $('.mv').removeClass('fadeIn');
    }, fadeTime);
}

// ホテルセクションのスライダー
$(document).ready(function(){
    setInterval(() => {
        let overSlide = $('.hotels ul li:first-child img').attr('id');
        console.log(`overSlide=${overSlide}`);
        $('.hotels ul li:first-child').remove();
        $('.hotels ul').append(`<li><img src="images/${overSlide}.png" id="${overSlide}"></li>`);
    }, 5000);
})