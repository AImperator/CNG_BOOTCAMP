// SVG Part
$(document).ready(function(){
    $("#stage").load("./media/interactive.svg",function(response){
        $(this).addClass("svgLoaded");
        if(!response){
            // Error loading SVG!
            // Make absolutely sure you are running this on a web server or localhost!
        }
    });
});
