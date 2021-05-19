$.game = {
    // for later on
};

// Main
$(document).ready(function (){
    /**
     * calls function in php file and insert data into html file
     */
    $("#btn_generate").on("click", function(){
        let playground_size = $("#size").attr("data-size");
        $.post("./data/jq_lab.php", {
            a : "create_playground",
            b : playground_size }, function(data) {
            $("#playground").html(data);
        });
    });
    /**
     * from modal - calls function in php file and insert data into html file
     */
    $("#btn_new_game").on("click", function() {
        $("#btn_generate").click();
        $("#btn_close").click();
    });
    /**
     * selecting bord size small
     */
    $("#btn_small").on("click", function (){
        $(this).removeClass("jq_main").addClass("selected").addClass("jq_secondary");
        $("#btn_medium").removeClass("selected").removeClass("jq_secondary").addClass("jq_main");
        $("#btn_large").removeClass("selected").removeClass("jq_secondary").addClass("jq_main");
        $("#size").attr("data-size", "small");
    });
    /**
     * selecting bord size medium
     */
    $("#btn_medium").on("click", function (){
        $(this).removeClass("jq_main").addClass("selected").addClass("jq_secondary");
        $("#btn_small").removeClass("selected").removeClass("jq_secondary").addClass("jq_main");
        $("#btn_large").removeClass("selected").removeClass("jq_secondary").addClass("jq_main");
        $("#size").attr("data-size", "medium");
    });
    /**
     * selecting bord size large
     */
    $("#btn_large").on("click", function (){
        $(this).removeClass("jq_main").addClass("selected").addClass("jq_secondary");
        $("#btn_medium").removeClass("selected").removeClass("jq_secondary").addClass("jq_main");
        $("#btn_small").removeClass("selected").removeClass("jq_secondary").addClass("jq_main");
        $("#size").attr("data-size", "large");
    });
    /**
     * Controls Mouse
     * gathering data and calls move function to move the player
     */
    $("#move_up").on("click", function (){
        let pos_id = ($(".player").attr("id").split("_"));
        let pos_x = parseInt(pos_id[0]);
        let pos_y = parseInt(pos_id[1]);
        let go_y = pos_y - 1;
        $.game.move(pos_x, pos_y, pos_x, go_y);
    });
    /**
     * Controls Mouse
     * gathering data and calls move function to move the player
     */
    $("#move_down").on("click", function (){
        let pos_id = ($(".player").attr("id").split("_"));
        let pos_x = parseInt(pos_id[0]);
        let pos_y = parseInt(pos_id[1]);
        let go_y = pos_y + 1;
        $.game.move(pos_x, pos_y, pos_x, go_y);
    });
    /**
     * Controls Mouse
     * gathering data and calls move function to move the player
     */
    $("#move_left").on("click", function (){
        let pos_id = ($(".player").attr("id").split("_"));
        let pos_x = parseInt(pos_id[0]);
        let pos_y = parseInt(pos_id[1]);
        let go_x = pos_x - 1;
        $.game.move(pos_x, pos_y, go_x, pos_y);
    });
    /**
     * Controls Mouse
     * gathering data and calls move function to move the player
     */
    $("#move_right").on("click", function (){
        let pos_id = ($(".player").attr("id").split("_"));
        let pos_x = parseInt(pos_id[0]);
        let pos_y = parseInt(pos_id[1]);
        let go_x = pos_x + 1;
        $.game.move(pos_x, pos_y, go_x, pos_y);
    });
    /**
     * autopilot
     */
    $("#btn_solve").on("click", function (){

    });
    /**
     * Debug mode
     */
    $("#btn_debug").on("click", function (){
        if ($("#btn_debug").hasClass("btn-primary")){
            $(this).removeClass("btn-primary").fadeTo("fast", 0.2);
            $("#btn_modal").attr("hidden", true);
            $("#btn_new_game").fadeTo("fast", 1).removeAttr("disabled");
            $("#playground").html("");
        }
        else {
            $(this).addClass("btn-primary").fadeTo("fast", 1);
            $("#btn_modal").removeAttr("hidden");
            $("#btn_new_game").fadeTo("fast", 0.5).attr("disabled", true);
            $.post("./data/jq_lab.php", {
                    a : "create_debug",
                    b : 18 },
                function(data){
                $("#playground").html(data);
            });
        }
    });
});

// Functions
/**
 * moving player
 * @param pos_x
 * @param pos_y
 * @param go_x
 * @param go_y
 */
$.game.move = function (pos_x, pos_y, go_x, go_y){
    let pos_id = pos_x+"_"+pos_y;
    let go_id = go_x+"_"+go_y;

    if ($("#btn_debug").hasClass("btn-primary")){
        switch_input = "medium";
    } else {
        switch_input = $("#size").attr("data-size");
    }
    switch (switch_input){
        case "small":
            selected_size = 12;
            break;
        case "medium":
            selected_size = 18;
            break;
        case "large":
            selected_size = 24;
            break;
    }
    let startCell =  $("#"+(selected_size - 1)+"_"+selected_size);
    let finishCell =  $("#2_1");
    let positionCell =  $("#"+pos_id);
    let goToCell =  $("#"+go_id);

    if (goToCell.hasClass("floor") || goToCell.hasClass("start_finish")){
        positionCell.removeClass("player");
        if (positionCell.attr("id") === startCell.attr("id") || positionCell.attr("id") === finishCell.attr("id")){
            positionCell.addClass("start_finish");
        }
        else {
            positionCell.addClass("floor");
        }
        goToCell.removeClass("floor").removeClass("start_finish").addClass("player");
        if (goToCell.attr("id") === finishCell.attr("id")){
            $("#btn_modal").click();
        }
    }
}