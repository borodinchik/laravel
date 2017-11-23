$(document).ready(function() {
/*This event create input option answers in Admin panel */
$('#input').click(function() {
  var random = Math.floor(Math.random() * (9999 - 1000 + 1)) + 1000;
  var str = '<input class="form-control" type="text" name="answer[]-' +
        random + '" placeholder="Вариант ответа:"/><br> ';
    $('#sites').append(str);
});
/*On click frome links we are show modal and get attrebut 'data-question-id'
which is responsible for id questions modal*/
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
/*Close modal event */
$('.close').on('click', function(){
  $('.cartQuestions').hide();
    $('.modal-loader').hide();
});
/*Function getAjax generate Ajax requests*/
function getAjax(getMethod,getUrl,dataType,callback) {
  $.ajax({
    headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    method: getMethod,
    url: getUrl,
  }).
    done(function (data) {
      getData(data);//передаем данные в метод getData
      callback(data);

     }).fail(function (data) {

    callback(data);
  })

};

/*Ajax request from Charts date*/
function getDataCharts(dataQuestionId) {
  getAjax('GET','http://127.0.0.1:8000/admin/column/' + dataQuestionId,'json',function (result) {

  });

}

function getData(data) {
// console.log(data);
  var responseObjAnswer = data[0].answer.map(function (myArrayObjAnswer) {
        return myArrayObjAnswer.answer;
      });

      // console.log(responseObjAnswer);
      var responseObjData = data[1].map(function (myArrayObjData) {//count_user
            return myArrayObjData.count_all_user;
          });
          // console.log(data);
          //   var responseObjUserAge = data[2].map(function (myArrayObjUserAge) {
          //         return myArrayObjUserAge.count_age;
          //       });
          //
          // console.log(responseObjUserAge);
          //
          var responseObjBody = data[0].body;
drouCharts(responseObjAnswer,responseObjData,responseObjBody);
}

/*We hang an event for ajax request*/
$('.result').on('click', function () {
var dataQuestionId = $(this).attr('id');
// console.log(dataQuestionId);
    getDataCharts(dataQuestionId);
  $('.my_result_modal').show();
  });
$('.close').on('click', function () {
   $('.my_result_modal').hide();
 });

/*This function gets questions list by id*/
function getUserAnswerId(dataQuestionId,data) {
  if (dataQuestionId) {
    getAjax('POST',window.location.href + '/' + dataQuestionId,data,function (result) {
     });
   }
 }

//Дописать Acssess после отправки формы
// $('.save-answer').on('click', function () {
//   $('.cartQuestions').hide();
//     $('.alert-success').show(function () {
//       setTimeout(function () {
//
//       }, 3000);
//     });
//   });
/*Added data in charts*/
// function parseResponse(responseRet) {
//
//   // console.log(responseRet);
//
//   var responseObj = responseRet.map(function (responseData) {
//
//         return responseData;
//
//       });
//
//   alert(responseObj);
// }
function drouCharts(lables,data,body) {


var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: lables,
        datasets: [{
            label: body,
            data: data,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
}

});
