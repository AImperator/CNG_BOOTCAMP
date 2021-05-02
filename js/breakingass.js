$(document).ready(function(){
    // Selecting product
    $("#selector_component").on("change", function(){
        let sel = parseInt($(this).val());
        if (sel === 0){
            $("#progress").css("width", "0%").text("0%");
            $("img").attr("src", "").fadeTo("fast", 0);
            $("#lock_product").addClass("disabled");
        }
        else if (sel === 1){
            $("#progress").css("width", "20%").text("20%");
            $(".selected_product").attr("src", "./media/headset.png").fadeTo("fast", 1);
            $("#lock_product").removeClass("disabled");
        }
        else if (sel === 2){
            $("#progress").css("width", "20%").text("20%");
            $(".selected_product").attr("src", "./media/pc.png").fadeTo("fast", 1);
            $("#lock_product").removeClass("disabled");
        }
        else if (sel === 3){
            $("#progress").css("width", "20%").text("20%");
            $(".selected_product").attr("src", "./media/smartphone.png").fadeTo("fast", 1);
            $("#lock_product").removeClass("disabled");
        }
    });
    // Lock product
    $("#lock_product").on("click", function (){
        $("#spinner").removeClass("invisible").fadeTo("slow", 1, function (){
        $("#first_step").addClass("completed").removeClass("active");
        $("#second_step").addClass("active").removeClass("warning");
        $("#second_content").removeClass("invisible");
        $("#selector_component").addClass("disabled");
        $("#lock_product").addClass("disabled");
        $("#first_content").fadeTo("slow", 0.5);
        $("#progress").css("width", "40%").text("40%");
        }).fadeTo("slow", 0);
    });
    // Unlock
    $("#unlock_product").on("click", function (){
        location.reload();
    });
    // Start test
    $("#start_test").on("click", function (){
        let random_chance = Math.floor(Math.random() * 60) + 10;
        $("#spinner").fadeTo("slow", 1, function (){
            $("#second_step").addClass("completed").removeClass("active");
            $("#third_step").addClass("active").removeClass("warning");
            $("#third_content").removeClass("invisible");
            $("#unlock_product").addClass("disabled");
            $("#start_test").addClass("disabled");
            $("#second_content").fadeTo("slow", 0.5);
            $("#progress").css("width", "60%").text("60%").delay(300).css("width", "70%").text("70%").ready(function (){
                $("#chance").css("width", random_chance+"%").text(random_chance+"%").delay(300).ready(function (){
                    $("#progress").css("width", "80%").text("80%");
                });
            });
            $("#break_down").removeClass("disabled");
            $("#to_customer").removeClass("disabled");
        }).fadeTo("slow", 0);
    });
    // Break
    $("#break_down").on("click", function (){
        $("#spinner").fadeTo("slow", 1).ready(function (){
            $("#third_step").addClass("completed").removeClass("active");
            $("#break_down").addClass("disabled");
            $("#to_customer").addClass("disabled");
            $("#third_content").fadeTo("slow", 0.5);
            $("#progress").css("width", "100%").text("100%").ready(function (){
                $("#finish").fadeTo("slow", 1);
                $("#msg").text("The product is marked and will be further investigated");
            });
        }).fadeTo("slow", 0);
    });
    // Send to customer
    $("#to_customer").on("click", function (){
        $("#spinner").fadeTo("slow", 1).ready(function (){
            $("#third_step").addClass("completed").removeClass("active");
            $("#break_down").addClass("disabled");
            $("#to_customer").addClass("disabled");
            $("#third_content").fadeTo("slow", 0.5);
            $("#progress").css("width", "100%").text("100%").ready(function (){
                $("#finish").fadeTo("slow", 1);
                $("#msg").text("The product is marked and will be delivered to the customer");
            });
        }).fadeTo("slow", 0);
    });
    // Reset
    $("#reset").on("click", function (){
        location.reload();
    });
});