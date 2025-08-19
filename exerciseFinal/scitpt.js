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

let foodImg = 1;
$(document).ready(function(){
    setInterval(() => {
        foodImg++;
        if(foodImg>4){
            foodImg = 1;
        }
        $('.foods .image > img').attr('src', `images/food${foodImg}.png`);
    }, 3000);
})

// activitiesセクション　可視領域に入ったらフェードイン
// geminiから。class名、調整値を変更
$(function() {
    $(window).on('scroll', function() {
      $('.activities .image li').each(function() {
        // 要素の上部がウィンドウの下部に入ったかを判定
        var elemPos = $(this).offset().top;     //要素のページ最上部からの位置
        var scrollPos = $(window).scrollTop();  //どれだけスクロールしたか
        var windowHeight = $(window).height();  //ビューポートの高さ
  
        if (scrollPos > elemPos - windowHeight + 200) {
          $(this).addClass('is-visible');
        }
      });
    });
    // ページロード時にも一度実行して、すでに表示領域内の要素があれば表示させる
  $(window).trigger('scroll');
  });