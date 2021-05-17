// Main
$(document).ready(function (){
    // Trigger enter save
    $("#new-todo").on("keypress",function(e) {
        let input = $(this).val();
        let number = $("#todo_list li").length + 1;
        if (e.which === 13 && input != null && input !== "") {
            $("#todo_list").create_todo(input, number);
            $(this).val("");
            counter();
        }
    });
    // Trigger click save
    $("#btn_save").on("click",function() {
        let input = $("#new-todo").val();
        let number = $("#todo_list li").length + 1;
        if (input != null && input !== "") {
            $("#todo_list").create_todo(input, number);
            $("#new-todo").val("");
        }
        counter();
    });
    // Mark all as complete
    $("#slide_mark").on("click", function (){
        if (!$("#slide_mark").hasClass("checked")){
            $("#slide_mark").addClass("checked");
            $("#todo_list li").each(function (){
                $(this).to_done();
            });
        }
        else if($("#slide_mark").hasClass("checked")){
            $("#slide_mark").removeClass("checked");
            $("#todo_list li").each(function (){
                $(this).to_open();
            });
        }
        counter();
    });
    // Delete completed tasks
    $("#btn_del").on("click", function (){
        $("li.completed_task").remove();
        counter();
    });
    // Filter ALL
    $("#filter_all").on("click", function (){
        $("#filter_all").addClass("jq_main");
        $("#filter_open").removeClass("jq_main");
        $("#filter_comp").removeClass("jq_main");
        $("li").fadeTo("slow", 1);
    });
    // Filter OPEN
    $("#filter_open").on("click", function (){
        $("#filter_open").addClass("jq_main");
        $("#filter_all").removeClass("jq_main");
        $("#filter_comp").removeClass("jq_main");
        $("li").fadeTo("slow", 0);
        $("li.open_task").fadeTo("slow", 1);
    });
    // Filter COMPLETED
    $("#filter_comp").on("click", function (){
        $("#filter_comp").addClass("jq_main");
        $("#filter_all").removeClass("jq_main");
        $("#filter_open").removeClass("jq_main");
        $("li").fadeTo("slow", 0);
        $("li.completed_task").fadeTo("slow", 1);
    });
    // Change marking in todotask
    $(document).on("click", "a[id^='btn_mark_']", function () {
        let number = $(this).attr("data-int");
        let task_id = "#no_"+number;
        if ($(task_id).hasClass("open_task") === true){
            $(task_id).to_done();
        }
        else if ($(task_id).hasClass("completed_task") === true){
            $(task_id).to_open();
        }
        counter();
    });
    // Delete task
    $(document).on("click", "a[id^='btn_del_']", function () {
        let number = $(this).attr("data-int");
        $("#no_"+number).remove();
        counter();
    });
});
// Separated functions
/**
 * Create new todotask as li for the list
 * @param {string} user_input
 * @param {int} number
 */
$.fn.create_todo = function (user_input, number){
    $(this).append('<li id="no_' + number + '" class="open_task justify-content-center">\n' +
            '                  <div class="row">\n' +
            '                    <div class="col-2">\n' +
            '                      <a id="btn_mark_' + number + '" class="btn btn-sm invisible" data-int="' + number + '">\n' +
            '                        <i id="icon_no_' + number + '" class="icon fas fa-3x fa-exclamation-circle text-danger visible"></i>\n' +
            '                      </a>\n' +
            '                    </div>\n' +
            '                    <div class="col-8 mt-2 text-center">\n' +
            '                      <h3 id="text_no_' + number + '">' + user_input + '</h3>\n' +
            '                    </div>\n' +
            '                    <div class="col-2">\n' +
            '                      <a id="btn_del_' + number + '" class="btn btn-sm invisible" data-int="' + number + '">\n' +
            '                        <i class="fas fa-3x fa-times text-danger visible"></i>\n' +
            '                      </a>\n' +
            '                    </div>\n' +
            '                  </div>\n' +
            '                </li>');
}
// Change marking of task to completed
$.fn.to_done = function (){
    let task_id = $(this).attr("id");
    $(this).removeClass("open_task").addClass("completed_task");
    $("#icon_"+task_id).removeClass("fa-exclamation-circle").removeClass("text-danger").addClass("fa-check-circle").addClass("text-success");
    $("#text_"+task_id).css("text-decoration-line", "line-through");
}
// Change marking of task to open
$.fn.to_open = function (){
    let task_id = $(this).attr("id");
    $(this).removeClass("completed_task").addClass("open_task");
    $("#icon_"+task_id).removeClass("fa-check-circle").removeClass("text-success").addClass("fa-exclamation-circle").addClass("text-danger");
    $("#text_"+task_id).css("text-decoration-line", "none");
}
// Actualize counter
function counter (){
    let number_open = $("li.open_task").length;
    let number_done = $("li.completed_task").length;
    if (number_open === 1) {
        $("#tasks_open").text(number_open + " task left");
    }
    else {
        $("#tasks_open").text(number_open + " tasks left");
    }
    if (number_done === 1) {
        $("#tasks_done").text(number_done + " task done");
    }
    else {
        $("#tasks_done").text(number_done + " tasks done");
    }
}
// Save task local
