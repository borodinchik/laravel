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
//Функция отвечающая за построение ajax Запросов
function getAjax(getMethod,getUrl,dataType,callback) {
  $.ajax({

    headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    method: getMethod,
    url: getUrl,
  }).
    done(function (data) {
       callback(data);
    }).fail(function (data) {
        console.log("data fail");
    callback(data);
  })
};
function getDataCharts() {
  getAjax('GET','http://127.0.0.1:8000/admin/column','json',function (result) {
    console.log(result);
  });
}


$('.result').on('click', function () {
getDataCharts();
  $('.my_result_modal').show();
  });
$('.close').on('click', function () {
   $('.my_result_modal').hide();
 });


 //Это запрос достает опрос по id
 function getUserAnswerId(dataQuestionId,data) {
   if (dataQuestionId) {
     getAjax('POST',window.location.href + '/' + dataQuestionId,data,function (result) {
     });
   }
 }
  //Дописать Acssess после отправки формы
  // $('.save-answer').on('click', function () {
  //   $('.cartQuestions').hide();
  //
  //     $('.alert-success').show(function () {
  //       setTimeout(function () {
  //           }, 3000);
  //
  //     });
  //
  // });
});
