$(document).ready(function () {
    $("a").mouseover(function() {
        $(this).css("background-color", "#000000");
    });
    
    $("a").mouseleave(function() {
        $(this).css("background-color", "#282a35");
    });

    $(".hide").hover(function() {
        $(this).find($(".sub_menu")).show();
    },
    function() {
        $(this).find($(".sub_menu")).hide();
    });

    $(".animate").each(function() {
        var sub = $(this).find($(".sub_menu"));

        sub.css("display", "block");

        var h = sub.height();
        var w = sub.width();

        sub.css("display", "none");

        $(this).hover(function() {
            sub.stop();
            sub.css("display", "block");
            sub.css({"height":"0px"});
            sub.animate({height: h}, "fast");
        },
        function() {
            sub.stop();
            sub.animate({height:"0px"}, "fast",
                function() {
                    ($(this).css("display", "none"));
                });
        });
    });
});