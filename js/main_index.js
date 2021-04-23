$(document).ready(function(){

    $("a[href='#php']").hover(function(){
        $(this).attr("style", "background-color: #FCFF55; color: black");
    }, function(){
        $(this).attr("style", "color: white");
    });

    $("a[href='#js']").hover(function(){
        $(this).attr("style", "background-color: #82A673; color: black");
    }, function(){
        $(this).attr("style", "color: white");
    });

    $("a[href='#jq']").hover(function(){
        $(this).attr("style", "background-color: #7BB4DC; color: black");
    }, function(){
        $(this).attr("style", "color: white");
    });
});