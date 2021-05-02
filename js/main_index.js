$(document).ready(function(){

    $("a[href='#php']").hover(function(){
        $(this).attr("style", "background-color: black; color: #FCFF55");
    }, function(){
        $(this).removeAttr("style");
    });

    $("a[href='#js']").hover(function(){
        $(this).attr("style", "background-color: black; color: #82A673");
    }, function(){
        $(this).removeAttr("style");
    });

    $("a[href='#jq']").hover(function(){
        $(this).attr("style", "background-color: black; color: #7BB4DC");
    }, function(){
        $(this).removeAttr("style");
    });
});