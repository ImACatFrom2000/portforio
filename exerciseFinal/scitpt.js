'use strict';

let mvNow = 1;
let mvNext;

$(document).ready(function(){
    setInterval(fadeIn, 4000);
})

function fadeIn(){
    $('.mv').addClass('fadeIn');
    if(mvNow <3) {
        mvNext = mvNow + 1;
    } else {
        mvNext = 1;
    }
    setTimeout(fadeReset, 3000);
    
}
function fadeReset(){
    mvNow = mvNext;    
    $('.mv').removeClass('fadeIn');
}