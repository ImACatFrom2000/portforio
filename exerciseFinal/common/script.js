'use strict';

$(document).ready(function(){
    $('.header .drawerBtn').on('click', function(){
        $(this).next().toggleClass('show');
    })
})