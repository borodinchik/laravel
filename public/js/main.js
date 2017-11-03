//Adds new input in the form
$('#input').click(function(){
  var random = Math.floor(Math.random() * (9999 - 1000 + 1)) + 1000;
    var str = '<input class="form-control" type="text" name="answer[]-'
     +random+ '" placeholder="Вариант ответа:"/><br> ';
    $('#sites').append(str);
  });

$(function() {
  $('.result').click(function() {
    $('.my_result_modal').css('display','block');

  })
  $('.close').click(function(){
    $('.my_result_modal').hide();

  });
});

//С помощью ajax выводим мадалку и форму по id
$(document).ready(function () {
var http = "http://127.0.0.1:8000";
var csrf =  {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')};
$(".question-id").bind("click", function () {
      var questionId = $(this).attr("data-question-id");
$(function() {
  $('.question-id').click(function() {
    $('.myModal-' + questionId).css('display','block');

  })
  $('#close').click(function(){
    $('.myModal-' + questionId).hide();

  });
});
$.ajax({
      headers: csrf,
      type: "POST",
      url: http + "/user/" + questionId,
      dataType: 'html',
      success: function (data) {
            // alert(data);
          }
    });
  });
});
