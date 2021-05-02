// Main
$(document).ready(function (){
    // Trigger enter save
    //$("#new-todo").onkeypress(function (e) {
    //    let user_input = this.text;
    //    if (e.which === 13 && user_input != null && user_input !== "") {
    //        new_todo(user_input);
    //    }
    //    this.text = null;
    //});
    // Trigger click save
    $("#btn_save").on("click", function (){
        let user_input = $("#new-todo").text;
        if (user_input != null && user_input !== "") {
            new_todo(user_input);
        }
        this.text = null;
    });
    // Mark all as complete
    $("#slide_mark").on("change", function (){
        if (this.hasAttribute("checked") === false){
            this.attr("checked");
            $("li").addClass("complete").removeClass("open");
        }
        if (this.hasAttribute("checked") === true){
            this.removeAttr("checked");
            $("li").addClass("open").removeClass("complete");
        }
    });
    // Delete completed tasks
    $("#btn_del").on("click", function (){
        $("#todo_list").removeChild($("li.complete"));
    });
    // Filter ALL
    $("#filter_all").on("click", function (){
        this.addClass("jq_main");
        $("#filter_open").removeClass("jq_main");
        $("#filter_comp").removeClass("jq_main");
        $("li").fadeTo("slow", 1);
    });
    // Filter OPEN
    $("#filter_open").on("click", function (){
        this.addClass("jq_main");
        $("#filter_all").removeClass("jq_main");
        $("#filter_comp").removeClass("jq_main");
        $("li").fadeTo("slow", 0, function (){
            $("li.open").fadeTo("slow", 1);
        });
    });
    // Filter COMPLETED
    $("#filter_comp").on("click", function (){
        this.addClass("jq_main");
        $("#filter_all").removeClass("jq_main");
        $("#filter_open").removeClass("jq_main");
        $("li").fadeTo("slow", 0, function (){
            $("li.comp").fadeTo("slow", 1);
        });
    });
    // Automated task visuals
    $("li").on("change", function (){
        let id_number = $(this).id;
        if ($(id_number).hasClass("open")){
            $("#icon_"+id_number).removeClass("fa-check-circle", "text-success").addClass("fa-exclamation-circle", "text-danger");
            $("#text"+id_number).css("text-decoration-line", "none");
        }
        if ($(id_number).hasClass("complete")){
            $("#icon_"+id_number).removeClass("fa-exclamation-circle", "text-danger").addClass("fa-check-circle", "text-success");
            $("#text"+id_number).css("text-decoration-line", "line-through");
        }
    });
    // Automated counter
    $("#todo_list > li").on("change", function (){
        let number_open = $("#todolist > li.open").length;
        let number_done = $("#todolist > li.complete").length;
        $("#tasks_open").text(number_open + " tasks left");
        $("#tasks_done").text(number_done + " tasks done");
    });
});
// Create new todotask
function new_todo (user_input){
    let number = $("#todo_list li").length + 1;
        $("#todo_list").append('<li id="no_' + number + '" class="open justify-content-center">\n' +
            '                  <div class="row">\n' +
            '                    <div class="col-2">\n' +
            '                      <a onclick="change_marking(' + number + ')" class="btn btn-sm invisible">\n' +
            '                        <i id="icon_no_' + number + '" class="icon fas fa-3x fa-exclamation-circle text-danger visible"></i>\n' +
            '                      </a>\n' +
            '                    </div>\n' +
            '                    <div class="col-8 mt-2 text-center">\n' +
            '                      <h3 id="text_no_' + number + '">' + user_input + '</h3>\n' +
            '                    </div>\n' +
            '                    <div class="col-2">\n' +
            '                      <a onclick="delete_task(' + number + ')" class="btn btn-sm invisible">\n' +
            '                        <i id="icon_del_no_' + number + '" class="fas fa-3x fa-times text-danger visible"></i>\n' +
            '                      </a>\n' +
            '                    </div>\n' +
            '                  </div>\n' +
            '                </li>');
}
// Mark task as complete
function change_marking (number){
    let li_id = "#no_"+number;
    if ($(li_id).hasClass("open")){
        $("#no_"+number).removeClass("open").addClass("complete");
    }
    if ($(li_id).hasClass("complete")){
        $("#no_"+number).removeClass("complete").addClass("open");
    }
}
// Delete task
function delete_task (number){
    $("#todo_list").removeChild($("#no_"+number));
}
// Save task local
