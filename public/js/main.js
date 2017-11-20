
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
    // var random = Math.floor(Math.random() * (9999 - 1000 + 1)) + 1000;
    //
    // var inputAnswer = '<input type="radio" name="user_answer_id[]-' + random +  '"value="{{ $value->id }}" required>';
    // console.log(random);
    // $('.input-answer').append(inputAnswer);
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
//Скрываем опрос , на который был дан ответ
// $('.save').on('click',function () {
//   $('.answer-' + dataQuestionId).hide();
// });
//Это запрос достает опрос по id
function getUserAnswerId(dataQuestionId,data) {
    if (dataQuestionId) {
      getAjax('POST',window.location.href + '/' + dataQuestionId,data,function (result) {
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
//Логика Лоадера
// $('.result').on('click', function () {
//   $('.loader').show();
//   setTemeout(function(){
//     $('.loader').hide();
//},3000);
//
// });



// $('.question-id').click(function () {
//   $('.loader').show();
//   setTimeout(function () {
//     $('.loader').hide();
// }, 3000); // время в мс
//
// });
$(function () {
   $('.result').on('click', function () {
    $('.my_result_modal').show();
});
    $('.close').on('click', function () {
         $('.my_result_modal').hide();
       });
});
//Передача данных в график
// function parseResponse(responseRet) {
//   console.log(responseRet);
//   var responseObj = responseRet.map(function (myArrayObj) {
//         return myArrayObj.user_answers;
//       });
//   alert(responseObj);

// Лоика построенияграфика
  // var ctx = document.getElementById('myChart').getContext('2d');
  // var chart = new Chart(ctx, {
    // The type of chart we want to create
    // type: 'bar',

    // The data for our dataset
    // data: {
    //     labels: ["Variant1", "Variant2", "Variant3", "Variant4", "Variant5", "Variant6", "Variant7"],
    //     datasets: [{
    //         label: "Название опроса",
    //         backgroundColor: 'rgb(255, 99, 132)',
    //         borderColor: 'rgb(255, 99, 132)',
    //         data: [5,6,7,6,8,3,1,4]
    //     }]
    // },

    // Configuration options go here
    // options: {}
// });

// Достаемданные для построения графика
function getDataGraph(data){
  getAjax('GET','/admin/column',data, function(result){
    if (result != "error!" ){
        parseResponse(JSON.parse(result));
      }else{
      console.log(result,"Error json not found!");
    }
  });
 };

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
