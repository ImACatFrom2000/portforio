'use strict';

$(document).ready(function(){
    let img;
    let lead;
    let detail;
    let marketPrice;

    $('.contents li').on('click', function(){
        if(!$(this).hasClass('selected')) {
            $('.contents nav li').removeClass('selected');
            const tab = $(this).attr('class');
            $(this).addClass('selected');
            switch (tab) {
                case 'diving':
                    img = "ダイビングの画像";
                    lead = "水中の世界"
                    detail = "沖縄の海と言えば「ダイビング」。透き通った海水から織り成す青色はまさに幻想的。水に包まれながら癒される空間を味わえます。";
                    marketPrice = "￥13,200～￥26,400";
                    break;
                case 'seakayak':
                    img = "シーカヤックの画像";
                    lead = "水上リフレッシュ";
                    detail = "水上でのアクティビティはサーフィンやバナナボートだけでなく、シーカヤック人気です。潮騒を聞きながら適度な運動で心地いい体験ができます。";
                    marketPrice = "￥1,500～￥3,500";
                    break;
                case 'parasailing':
                    img = "パラセーリングの画像";
                    lead = "空中散歩";
                    detail = "沖縄は海だけじゃない！空もある！上を見れば青い空、下を見れば青い海。青に包まれる沖縄のパラセーリングで絶景体験ができます。";
                    marketPrice = "￥6,000～￥15,000"
                    break;
            }
            $('.contents > div img').attr('src', `images/${tab}.png`)
            $('.contents > div img').attr('alt', img);
            $('.contents .lead b').text(lead);
            $('.contents .detail').text(detail);
            $('.contents .marketPrice span').text(marketPrice);

        }
    })
})