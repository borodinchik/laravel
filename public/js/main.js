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
  var currentTarget = $(event.currentTarget);
  var dataQuestionId = currentTarget.attr('data-question-id');
  getUserAnswerId(dataQuestionId);
  currentTarget.parent().siblings('.myModal-' + dataQuestionId).show();
});
//Закрываем модалку
$('.close').on('click', function(){
  $('.cartQuestions').hide();
});
//Это запрос достает опрос по id
function getUserAnswerId(dataQuestionId,data) {
    if (dataQuestionId) {
      getAjax('POST',window.location.href + '/' + dataQuestionId,data,function (result) {

      });
        // $.ajax({
        //     headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        //     method: "POST",
        //     url: window.location.href + '/' + dataQuestionId,
        //
        // });
    }
}
//Функция отвечающая за построение ajax Запросов
function getAjax(newMethod,paramUrl,data,callback) {
  // console.log(newMethod,paramUrl,data,callback,"+++++++++++==");
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
//Логика разкрытия и закрытия модалки с графиком
$(function () {
   $('.result').on('click', function () {
    $('.my_result_modal').show();
});
    $('.close').on('click', function () {
         $('.my_result_modal').hide();
       });
});
//Передача данных в график
function parseResponse(responseRet) {
  console.log(responseRet);
  var responseObj = responseRet.map(function (myArrayObj) {
        return myArrayObj.question_id;
      });
  alert(responseObj);
//Лоика построенияграфика
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
//Достаемданные для построения графика
function getDataGraph(data){
  getAjax('GET','http://127.0.0.1:8000/admin/column',data, function(result){
    if (result != "error!" ){
        parseResponse(JSON.parse(result));
      }else{
      console.log(result,"Error json not found!");
    }
  });
 };

$('.result').on('click', function () {
      getDataGraph();
  });
  //Ajax Запрос на добовление варианта ответа юзера !
  $('.form-save').on('submit', function (e) {
    e.preventDefault();
    var formValue = $(this).find('input:checked').val();
      saveUserAnswer(formValue);
    });

function saveUserAnswer(abc) {
  getAjax('POST',"http://127.0.0.1:8000/user/store",abc,function (result) {
    if (result != "error!" ){
        alert(abc);
    }else{
      console.log(result,"User answer not add");
    }
  });
}
});
