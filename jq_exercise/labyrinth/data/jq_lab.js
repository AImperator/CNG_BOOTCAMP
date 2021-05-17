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
        let playground_size = $("#size").attr("data-size");
        $.post("./data/jq_lab.php", {
            a : "create_playground",
            b : playground_size }, function(data) {
            $("#playground").html(data);
        });
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
        let pos_id = ($(".player").attr("id").split("-"));
        let pos_x = parseInt(pos_id[0]);
        let pos_y = parseInt(pos_id[1]);
        let go_y = pos_y - 1;
        move(pos_x, pos_y, pos_x, go_y);
    });
    /**
     * Controls Mouse
     * gathering data and calls move function to move the player
     */
    $("#move_down").on("click", function (){
        let pos_id = ($(".player").attr("id").split("-"));
        let pos_x = parseInt(pos_id[0]);
        let pos_y = parseInt(pos_id[1]);
        let go_y = pos_y + 1;
        move(pos_x, pos_y, pos_x, go_y);
    });
    /**
     * Controls Mouse
     * gathering data and calls move function to move the player
     */
    $("#move_left").on("click", function (){
        let pos_id = ($(".player").attr("id").split("-"));
        let pos_x = parseInt(pos_id[0]);
        let pos_y = parseInt(pos_id[1]);
        let go_x = pos_x - 1;
        move(pos_x, pos_y, go_x, pos_y);
    });
    /**
     * Controls Mouse
     * gathering data and calls move function to move the player
     */
    $("#move_right").on("click", function (){
        let pos_id = ($(".player").attr("id").split("-"));
        let pos_x = parseInt(pos_id[0]);
        let pos_y = parseInt(pos_id[1]);
        let go_x = pos_x + 1;
        move(pos_x, pos_y, go_x, pos_y);
    });
    /**
     * autopilot
     */
    $("#btn_solve").on("click", function (){

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
function move(pos_x, pos_y, go_x, go_y){
    let pos_id = pos_x+" - "+pos_y;
    let go_id = go_x+" - "+go_y;
    let switch_input = $("#size").attr("data-size");
    let selected_size = 0;
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
    let start = (selected_size - 1)+" - "+selected_size;
    let finish = 2+" - "+1;
    if ($(go_id+".floor") || $(go_id+".start_finish")){
        $(pos_id).removeClass("player");
        if ($(pos_id) === $(start) || $(pos_id) === $(finish)){
            $(pos_id).addClass("start_finish");
        }
        else {
            $(pos_id).addClass("floor");
        }
        $(go_id).removeClass("floor").removeClass("start_finish").addClass("player");
        if ($(go_id) === $(finish)){
            $(this).toggle($("#win_modal"));
        }
    }
}
