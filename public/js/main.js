$(document).ready(function() {
//Adds new input in the form
$('#input').click(function() {
    var random = Math.floor(Math.random() * (9999 - 1000 + 1)) + 1000;
    var str = '<input class="form-control" type="text" name="answer[]-' +
        random + '" placeholder="Вариант ответа:"/><br> ';
    $('#sites').append(str);
});
//С помощью ajax выводим мадалку и форму по id

    $('.question-id').on('click', function(event) {
        var currentTarget = $(event.currentTarget);
        var dataQuestionId = currentTarget.attr('data-question-id');
        getUserAttr(dataQuestionId);
        currentTarget.parent().siblings('.myModal-' + dataQuestionId).show();
      });
      $('.close').on('click', function(){
        $('.cartQuestions').hide();
        });


function getUserAttr(dataQuestionId) {
    if (dataQuestionId) {
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            method: "POST",
            url: window.location.href + '/' + dataQuestionId,
            dataType: 'html',
            success: function(data) {

            }
        });
    }
}
$(function () {
   $('.result').on('click', function () {
    $('.my_result_modal').show();
});
    $('.close').on('click', function () {
         $('.my_result_modal').hide();
       });
});


function getAjax(newMethod,paramUrl,callback) {
  $.ajax({
    url: paramUrl,
    method: newMethod,
  }).
    done(function (data) {
      callback(data);
    }).fail(function (data) {
    callback(data);
  })

};


function parseResponse(responseRet) {
  console.log(responseRet);
  var responseObj = responseRet.map(function (myArrayObj) {
        return myArrayObj.question_id;

  });
  alert(responseObj);
  var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [{
            label: "My First dataset",
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
          data: responseObj,
        }]
    },

    // Configuration options go here
    options: {}
});
}

function doSome(){
   getAjax('GET','http://127.0.0.1:8000/admin/column', function(result){
     if (result != "error!" )
        parseResponse(JSON.parse(result));
     else
        console.log(result,"lkl");
   });
 };


  $('.result').on('click', function () {
      doSome();
  });

});
//Ajax Запрос на добовление варианта ответа юзера !
function saveUserAnswer(methodPost, url, type, headers) {
  $('.form-save').on('click', function () {
    $.ajax({
      headers: headers,
      method: methodPost,
      url: url,
      dataType: type,
      success: function(data) {
      }
    });
    return false;
  });
};
saveUserAnswer("POST","http://127.0.0.1:8000/user/store",'html',{
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},);
