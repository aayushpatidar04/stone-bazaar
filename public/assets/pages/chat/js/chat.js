"use strict";
$(document).ready(function() {
    var chatbg = $(window).height()-57;
    $('.chat-bg').css('min-height', chatbg);
    var a = $(window).height() - 70;
    $(".user-box").slimScroll({
        height: a,
        allowPageScroll: false,
        color: '#000'
    });

    // search
    // Bootstrap 5: .media-body replaced with .flex-grow-1
    $(".search-text").on("keyup", function() {

        var g = $(this).val().toLowerCase();
        $(".userlist-box .flex-grow-1 .chat-header").each(function() {

            var s = $(this).text().toLowerCase();
            $(this).closest('.userlist-box')[s.indexOf(g) !== -1 ? 'show' : 'hide']();
        });
    });


});
