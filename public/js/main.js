
$(document).ready(function() {
//Добавляем новый инпу варианта ответа вадминке
$('#input').click(function() {
  var random = Math.floor(Math.random() * (9999 - 1000 + 1)) + 1000;
  var str = '<input class="form-control" type="text" name="answer[]-' +
        random + '" placeholder="Вариант ответа:"/><br> ';
    $('#sites').append(str);
});
//С помощью ajax выводим мадалку и форму по id
$('.question-id').on('click', function(event) {
  $('.modal-loader').show(function () {
    $('.loader').show();

    var currentTarget = $(event.currentTarget);
    var dataQuestionId = currentTarget.attr('data-question-id');
    getUserAnswerId(dataQuestionId);
    setTimeout(function () {
     $('.loader').hide();
     currentTarget.parent().siblings('.myModal-' + dataQuestionId).show();
}, 3000);
  });
});
//Закрываем модалку
$('.close').on('click', function(){
  $('.cartQuestions').hide();
    $('.modal-loader').hide();
});
//Это запрос достает опрос по id
function getUserAnswerId(dataQuestionId,data) {
  if (dataQuestionId) {
    getAjax('POST',window.location.href + dataQuestionId,data,function (result) {
    });
  }
}
//Функция отвечающая за построение ajax Запросов
function getAjax(newMethod,paramUrl,data,callback) {
  $.ajax({
    headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    url: paramUrl,
    method: newMethod,
    data:data
  }).
    done(function (data) {
      callback(data);
    }).fail(function (data) {
    callback(data);
  })
};

$(function () {
  $('.result').on('click', function () {
    // Достаемданные для построения графика
    function getDataCharts(data){
      getAjax('GET','/admin/column',data, function(result){
        if (result != "error!" ){
          console.log(data);
          // parseResponse(JSON.parse(result));
        }else{
          console.log(result,"Error json not found!");
        }
      });
    };
    $('.my_result_modal').show();
  });
$('.close').on('click', function () {
   $('.my_result_modal').hide();
 });
});




// $('.result').on('click', function () {
//       getDataGraph();
//   });
  //Ajax Запрос на добовление варианта ответа юзера !
  // $('.form-save').on('submit', function (e) {
//     $('myModal-' + dataQuestionId).hide();
//       $('.modal-loader').hide();
//         setTimeout(function () {
// 		        $('.alert-success').show();
// }, 3000);
//   e.preventDefault();
//     var formValue = $(this).find('input:checked').val();
//       saveUserAnswer({'user_answer_id':formValue});
//     });
//
// function saveUserAnswer(data) {
//   getAjax('POST',"/user/store",data,function (result) {
//     if (result != "error!" ){
//       console.log(data);
//     }else{
//       console.log(result,"User answer not add");
//       }
//     });
//   }

});
