

      const main_list = document.getElementById("card_list");
      let list = [];
      class flashcard
      {
        constructor(question, answer)
        {
          this.question = question;
          this.answer = answer;
        }

      }

      function add_flashcard()
      {
        list.push(create_flashcard());
        add_card(list.length - 1);
        fill_card(list.length - 1);
        clear_input();
      }

      function create_flashcard()
      {
        let question = document.getElementById("user_input_question").value;
        let answer = document.getElementById("user_input_answer").value;

        return new flashcard(question, answer);
      }

      function add_card(n)
      {
        let new_card = document.createElement("div");
        new_card.setAttribute("class", "card");
        new_card.setAttribute("id", "card_" + n);
        main_list.appendChild(new_card);
      }

      function fill_card(n)
      {
        let card = document.getElementById("card_" + n);
        card.innerHTML = '<div class="card-body">\n'+
            '<h5 class="card-title" id="display_'+ n +'_question">'+ list[n].question +'</h5>\n'+
            '<button class="btn btn-sm btn-outline-default" type="button" '+
                'data-toggle="collapse" data-target="#answer_'+ n +'" aria-expanded="false" '+
                'aria-controls="collapseExample">show / hide</button>\n'+
            '<div class="collapse" id="answer_'+ n +'">\n'+
              '<div class="mt-3">\n'+
                '<h6 class="card-subtitle mb-2 text-muted" id="display_'+ n +'_answer">'+ list[n].answer +'</h6>\n'+
              '</div>\n'+
            '</div>\n'+
            '<p class="card-text"></p>\n'+
            '<button type="button" class="btn btn-sm js_main btn-rounded" data-toggle="modal" '+
                'data-target="#editModalCenter'+ n +'">edit</button>\n' +
            '<div class="modal fade" id="editModalCenter'+ n +'" tabindex="-1" role="dialog" aria-hidden="true">\n'+
            '<div class="modal-dialog modal-dialog-centered" role="document">\n'+
            '<div class="modal-content">\n'+
              '<div class="modal-header js_main">\n'+
                '<h4 class="modal-title">Edit flashcard</h4>\n'+
                '<button type="button" class="close" data-dismiss="modal" aria-label="Close">\n'+
                  '<span aria-hidden="true">&times;</span>\n'+
                '</button>\n'+
              '</div>\n'+
              '<div class="modal-body js_background">\n'+
                '<div class="form-group green-border-focus">\n' +
                  '<label for="user_input_edit'+ n +'">Enter the new text and select what you want to change</label>\n'+
                  '<textarea class="form-control" id="user_input_edit'+ n +'" rows="3"></textarea>\n'+
                '</div>\n'+
                '<div class="row text-center">\n'+
                  '<div class="col-sm">\n'+
                    '<p>Question</p>\n'+
                  '</div>\n'+
                  '<div class="col-sm">\n'+
                    '<input type="range" class="custom-range" min="0" max="1" step="1" id="editSlide'+ n +'">\n'+
                  '</div>\n'+
                  '<div class="col-sm">\n'+
                    '<p>Answer</p>\n'+
                  '</div>\n'+
                '</div>\n'+
              '</div>\n'+
              '<div class="modal-footer js_main d-flex justify-content-between">\n'+
                '<button type="button" class="btn  btn-sm js_secondary btn-rounded" onclick="edit_card('+ n +')" data-dismiss="modal">save</button>\n'+
                '<button type="button" class="btn  btn-sm js_secondary btn-rounded" data-dismiss="modal">cancel</button>\n' +
              '</div>\n'+
            '</div>\n'+
          '</div>\n'+
        '</div>\n'+
        '<button type="button" class="btn btn-sm js_main btn-rounded" onclick="delete_card('+ n +')">delete</button>\n'+
      '</div>';
      }

      function edit_card(n)
      {
        let question_to_edit = document.getElementById("display_"+n+"_question");
        let answer_to_edit = document.getElementById("display_"+n+"_answer");
        let user_input = document.getElementById("user_input_edit"+n).value;
        let what_to_edit = document.getElementById("editSlide"+n).value;

        if (what_to_edit === 0)
        {
          list[n].question = user_input;
          question_to_edit.innerText = list[n].question;
        }
        if (what_to_edit === 1)
        {
          list[n].answer = user_input;
          answer_to_edit.innerText = list[n].answer;
        }
          document.getElementById("user_input_edit"+n).value = "";
      }

      function clear_input()
      {
        document.getElementById("user_input_question").value = "";
        document.getElementById("user_input_answer").value = "";
      }

      function delete_card(n)
      {
        let card_to_delete = document.getElementById("card_" + n);
        card_to_delete.parentElement.removeChild(card_to_delete);
        list[n].delete();
      }
