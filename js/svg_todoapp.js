// SVG Part
$(function(){

    $("#stage").load("../img/interactive.svg",function(response){

        $(this).addClass("svgLoaded");

        if(!response){
            // Error loading SVG!
            // Make absolutely sure you are running this on a web server or localhost!
        }

    });
});



// To Do App Part
